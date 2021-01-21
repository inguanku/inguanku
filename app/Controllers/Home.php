<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$session = session();
		$data = $session->get('name');
		return view('landing', ['data' => $data]);
	}

	//--------------------------------------------------------------------

}
