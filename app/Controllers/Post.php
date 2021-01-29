<?php

namespace App\Controllers;

use \CodeIgniter\I18n\Time;
use App\Models\PostModel;
use App\Models\PictureModel;

class Post extends BaseController
{
    protected $postModel;
    protected $pictureModel;
    protected $session;
    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->pictureModel = new PictureModel();
        $this->session = session();
    }

    public function adopt()
    {
        $postData = $this->postModel->getPostData();
        $data = [
            'title' => 'Adoption | Inguanku',
            'name' => $this->session->get('name'),
            'post' => $postData
        ];
        return view('post/adopt', $data);
    }

    public function breed()
    {
        $data = [
            'title' => 'Breeding | Inguanku',
            'name' => $this->session->get('name'),
        ];
        return view('post/breed', $data);
    }
}
