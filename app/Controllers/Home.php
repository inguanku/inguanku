<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
	public function index()
	{
		$session = session();
		$userId = $session->get('id');
		$name = null;
		if ($userId) {
			$model = new UserModel();
			$data =  $model->where('user_id', $userId)->first();
			$name = $data['name'];
			return view('index', ['name' => $name]);
		} else {
			return view('index', ['name' => $name]);
		}
	}

	//--------------------------------------------------------------------

}
