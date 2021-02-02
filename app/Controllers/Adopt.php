<?php

namespace App\Controllers;

use App\Models\UserModel;
use \CodeIgniter\I18n\Time;
use App\Models\PostModel;
use App\Models\PictureModel;

class Adopt extends BaseController
{
    protected $postModel;
    protected $pictureModel;
    protected $userModel;
    protected $session;
    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->pictureModel = new PictureModel();
        $this->userModel = new UserModel();
        $this->session = session();
    }

    public function add()
    {
        $data = [
            'title' => 'Add Adoption | Inguanku',
            'user' => $this->userModel->where('user_id', $this->session->get('id'))->first(),
            'heading' => 'Adoption',
            'category' => 'adopt',
            'date' => Time::now(),
            'id' => $this->session->get('id')
        ];
        return view('post/add', $data);
    }

    public function process()
    {
        if ($imagefile = $this->request->getFiles()) {
            $data = [
                'user_id' => $this->request->getVar('idHidden'),
                'pet_name' => $this->request->getVar('petName'),
                'date' => Time::now(),
                'description' => $this->request->getVar('description'),
                'sex' => $this->request->getVar('sex'),
                'category' => 'Adopt',
                'type' => $this->request->getVar('type'),
                'breed' => $this->request->getVar('breed'),
            ];

            $this->postModel->insert_post($data);

            $postid = $this->postModel->getid();
            $id = $postid[0]->post_id;
            foreach ($imagefile['pictures'] as $img) {
                $newName = $img->getRandomName();
                $data_picture = [
                    'post_id' => (int)$id,
                    'file_name' => $newName
                ];
                $img->move('images/post', $newName);
                $this->pictureModel->insert_picture($data_picture);
            }
        }
        return redirect()->to('./post/adopt');
    }
}
