<?php

namespace App\Controllers;

class Post extends BaseController
{
    public function adopt()
    {
        $session = session();
        $data = [
            'title' => 'Adoption | Inguanku',
            'user' => $session->get('name')
        ];
        return view('post/adopt', $data);
    }
    public function breed()
    {
        $session = session();
        $data = [
            'title' => 'Breeding | Inguanku',
            'user' => $session->get('name')
        ];
        return view('post/breed', $data);
    }
    public function detail()
    {
        $session = session();
        $data = [
            'title' => 'Detail | Inguanku',
            'user' => $session->get('name')
        ];
        return view('post/detail', $data);
    }
}
