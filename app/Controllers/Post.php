<?php

namespace App\Controllers;

use \CodeIgniter\I18n\Time;

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

    public function add()
    {
        $session = session();
        $data = [
            'title' => 'Add Adoption | Inguanku',
            'user' => $session->get('name'),
            'date' => Time::now()
        ];
        return view('post/adopt/add', $data);
    }
    public function process()
    {
        $pictures = $this->request->getFileMultiple('pictures');
        $name = $this->request->getVar('petName');
        dd($pictures);
    }
}
