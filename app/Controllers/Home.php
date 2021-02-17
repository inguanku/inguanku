<?php

namespace App\Controllers;

use App\Models\PictureModel;
use App\Models\TransactionModel;
use App\Models\UserModel;
use App\Models\PostModel;

class Home extends BaseController
{
    protected $postModel;
    protected $pictureModel;
    protected $userModel;
    protected $session;
    protected $transactionModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->pictureModel = new PictureModel();
        $this->userModel = new UserModel();
        $this->transactionModel = new TransactionModel();
        $this->session = session();
    }
	public function index()
	{
		$userId = $this->session->get('id');
		$name = null;

		if ($userId) {

			$postRequest = $this->postModel->postRequest($userId);
            $transactions = $this->transactionModel->getTransactions($userId);

            $data = [
				'user' => $this->userModel->where('user_id', $userId)->first(),
				'post' => $this->postModel->getRecent(),
				'postRequest' => $postRequest,
                'transactions' => $transactions
            ];
			return view('index', $data);
		} else {
			$data = [
				'post' => $post = $this->postModel->getRecent(),
				'user' => $name
			];
			return view('index', $data);
		}
	}


}
