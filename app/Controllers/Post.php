<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\UserModel;
use App\Models\PostModel;
use App\Models\PictureModel;
use App\Models\RequestModel;

class Post extends BaseController
{
    protected $postModel;
    protected $userModel;
    protected $pictureModel;
    protected $requestModel;
    protected $session;
    protected $transactionModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->pictureModel = new PictureModel();
        $this->userModel = new UserModel();
        $this->requestModel = new RequestModel;
        $this->transactionModel = new TransactionModel();
        $this->session = session();
        
    }

    public function adopt()
    {

        $location = $this->request->getVar('location');
        $postData = $this->postModel->getPostData('adopt', $location);
        $userId = $this->session->get('id');
        $postRequest = $this->postModel->postRequest($userId);
        $transactions = $this->transactionModel->getTransactions($userId);

        $data = [
            'title' => 'Adoption | Inguanku',
            'heading' => 'Adoption',
            'category' => 'adopt',
            'user' => $this->userModel->where('user_id', $this->session->get('id'))->first(),
            'userData' => $this->userModel->findAll(),
            'selectedLocation' => $location,
            'post' => $postData,
            'postRequest' => $postRequest,
            'transactions' => $transactions
        ];
        return view('post/index', $data);
    }

    public function breed()
    {

        $location = $this->request->getVar('location');
        $postData = $this->postModel->getPostData('breed', $location);
        $userId = $this->session->get('id');
        $postRequest = $this->postModel->postRequest($userId);
        $transactions = $this->transactionModel->getTransactions($userId);

        $data = [
            'title' => 'Breeding | Inguanku',
            'heading' => 'Breeding',
            'category' => 'breed',
            'user' => $this->userModel->where('user_id', $this->session->get('id'))->first(),
            'userData' => $this->userModel->findAll(),
            'selectedLocation' => $location,
            'post' => $postData,
            'postRequest' => $postRequest,
            'transactions' => $transactions
        ];
        return view('post/index', $data);
    }

    public function detail()
    {
        $postModel = new PostModel();
        $postId = $this->request->uri->getSegment(3);
        $dataDetail = $this->postModel->getDetail($postId);
        $userId = $this->session->get('id');
        $transactions = $this->transactionModel->getTransactions($userId);

        $userId = $this->session->get('id');
        if(($userId))
        {
            $userId = $this->session->get('id');
            $dataRequest = [
                'user_id' => $this->session->get('id'),
                'post_id' => $this->request->uri->getSegment(3),
            ];
            $checkRequest = $this->requestModel->checkRequest($dataRequest);

            $data = [
                'title' => 'Detail | Inguanku',
                'name' => $this->session->get('name'),
                'user' => $this->userModel->where('user_id', $this->session->get('id'))->first(),
                'user_id' => $this->session->get('id'),
                'dataDetail' => $dataDetail,
                'segment' => $postId,
                'postRequest' => $postRequest = $postModel->postRequest($userId),
                'checkRequest' => $checkRequest,
                'transactions' => $transactions
            ];
            return view('post/detail', $data);
        }
        

        $data = [
            'title' => 'Detail | Inguanku',
            'name' => $this->session->get('name'),
            'user' => $this->userModel->where('user_id', $this->session->get('id'))->first(),
            'user_id' => $this->session->get('id'),
            'dataDetail' => $dataDetail,
            'segment' => $postId,
            'postRequest' => $postRequest = $postModel->postRequest($userId),
            'checkRequest' => false,
            'transactions' => $transactions
        ];
        return view('post/detail', $data);
    }

    public function delete($id = null)
    {
        $idPic = $this->pictureModel->where('post_id', $id)->findAll();
        $postData = $this->postModel->where('post_id', $id)->findAll();
        $category = $postData[0]['category'];
        foreach ($idPic as $pic) {
            unlink('images/post/' . $pic['file_name']);
        }
        $data['user'] = $this->postModel->where('post_id', $id)->delete();
        $data['pictures'] = $this->pictureModel->where('post_id', $id)->delete();

        switch ($category) {
            case 'Adopt':
                return redirect()->to('./post/adopt');
            case 'Breed':
                return redirect()->to('./post/breed');
        }
        return redirect()->to('./');
    }

    public function request($id){
        $data = [
            'user_id' => $this->session->get('id'),
            'post_id' => (int)$this->request->uri->getSegment(3),
            'status' => "Pending"
        ];

        $this->requestModel->insert($data);
        return redirect()->to('./post/detail/'.$id);
    }

    public function requestList()
    {
        $userId = $this->session->get('id');
        if($userId)
        {
<<<<<<< HEAD
            
            $user_id = $this->session->get('id');
            
            $listRequest = $this->requestModel->requestList($user_id);
            var_dump($listRequest);

            $data = [
            'title' => "Confirm",
            'user' => $this->userModel->where('user_id', $this->session->get('id'))->first(),
            'postRequest' => $postRequest = $postModel->postRequest($userId),
            'listRequest' => $listRequest,
            ];
            return view('post/request', $data);
        }
        
        $data = [
            'title' => "confirm request",
            'user' => $this->userModel->where('user_id', $this->session->get('id'))->first(),
        ];
        return redirect()->to('./user/auth');
=======
            $postRequest = $this->postModel->postRequest($userId);
            $transactions = $this->transactionModel->getTransactions($userId);
            $myRequests = $this->requestModel->getMyRequest($userId);

            $data = [
                'title' => "Request List | Inguanku",
                'user' => $this->userModel->where('user_id', $userId)->first(),
                'postRequest' => $postRequest,
                'transactions' => $transactions,
                'myRequests' => $myRequests
            ];
            return view('post/request', $data);
        } else {
            return redirect()->to("/login");
        }
>>>>>>> develop
    }
}
