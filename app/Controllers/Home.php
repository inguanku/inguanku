<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PostModel;
use App\Models\RequestModel;

class Home extends BaseController
{
	public function index()
	{
		$session = session();
		$userId = $session->get('id');
		$name = null;
		$modelPost = new PostModel();

		if ($userId) {
			$modelUser = new UserModel();
			$postModel = new PostModel();

			$postRequest = $postModel->postRequest($userId);
			// echo count($postRequest);
			// die;
			// die;
			$data = [
				'user' => $modelUser->where('user_id', $userId)->first(),
				'post' => $modelPost->getRecent(),
				'postRequest' => $postRequest,
			];
			return view('index', $data);
		} else {
			$data = [
				'post' => $post = $modelPost->getRecent(),
				'user' => $name
			];
			return view('index', $data);
		}
	}


}
