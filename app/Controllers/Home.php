<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PostModel;

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
			$data = [
				'user' => $modelUser->where('user_id', $userId)->first(),
				'post' => $modelPost->getRecent(),
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
