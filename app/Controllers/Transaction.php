<?php


namespace App\Controllers;


use App\Models\PictureModel;
use App\Models\PostModel;
use App\Models\RequestModel;
use App\Models\TransactionModel;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class Transaction extends BaseController
{
    protected $postModel;
    protected $userModel;
    protected $pictureModel;
    protected $requestModel;
    protected $transactionModel;
    protected $session;

    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->pictureModel = new PictureModel();
        $this->userModel = new UserModel();
        $this->requestModel = new RequestModel;
        $this->transactionModel = new TransactionModel();
        $this->session = session();
    }

    public function index(){
        $userId = $this->session->get('id');
        $name = $this->session->get('name');

        if($userId)
        {
            $postRequest = $this->postModel->postRequest($userId);
            $transactions = $this->transactionModel->getTransactions($userId);
            $histories = $this->transactionModel->getTransactionHistory($userId);

            $data = [
                'title' => "Transaction List | Inguanku",
                'user' => $this->userModel->where('user_id', $userId)->first(),
                'postRequest' => $postRequest,
                'transactions' => $transactions,
                'histories' => $histories,
                'name' => $name
            ];
            return view('post/transaction', $data);
        } else {
            return redirect()->to("/login");
        }
    }

    public function confirm($choice, $requestId){
        $userId = $this->session->get('id');
        if ($userId){
            $data = [
                'request_id' => $requestId,
                'date' => Time::now()
            ];
            $this->transactionModel->insertTransaction($data);

            $dataRequest = $this->requestModel->where(["request_id" => $requestId])->findAll();
            $postId = (int)$dataRequest[0]['post_id'];

            $dataRequests = $this->requestModel->where(['post_id' => $postId])->findAll();
            switch ($choice){
                case 'accept':
                    $this->postModel->update($postId, ['status' => 'Unavailable']);
                    foreach ($dataRequests as $req){
                        $this->requestModel->update([$req['request_id']], ['status' => 'Declined']);
                    }
                    $this->requestModel->update($requestId, ['status' => 'Accepted']);
                    break;
                case 'decline':
                    $this->requestModel->update($requestId, ['status' => 'Declined']);
                    break;
            }

            return redirect()->to('/post/requestList');
        } else {
            return redirect()->to("/login");
        }
    }

    public function process($choice, $transactionId){
       $status = ($choice == 'complete')? 'Success': 'Failed';
       $this->transactionModel->updateStatus($transactionId, $status);
       return redirect()->to('/transaction');
    }
}