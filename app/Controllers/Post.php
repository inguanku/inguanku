<?php

namespace App\Controllers;

use \CodeIgniter\I18n\Time;
use App\Models\PostModel;
use App\Models\PictureModel;
use CodeIgniter\Model;

class Post extends BaseController
{
    public function adopt()
    {
        $session = session();
        $model = new PostModel();
        $postData = $model->getPostData();
        // dd($postData);
        $data = [
            'title' => 'Adoption | Inguanku',
            'user' => $session->get('name'),
            'post' => $postData
        ];
        return view('post/adopt', $data);
    }
    public function breed()
    {
        $session = session();
        $data = [
            'title' => 'Breeding | Inguanku',
            'user' => $session->get('name'),
        ];
        return view('post/breed', $data);
    }
    public function detail()
    {
        $session = session();
        $model = new PostModel();
        $postId = $this->request->uri->getSegment(3);
        $dataDetail = $model->getDetail($postId);
        // $data = $dataDetail[0]['pet_name'];
        // dd($data);
        $data = [
            'title' => 'Detail | Inguanku',
            'user' => $session->get('name'),
            'dataDetail' => $dataDetail

        ];
        return view('post/detail', $data);
    }

    public function add()
    {
        $session = session();
        $data = [
            'title' => 'Add Adoption | Inguanku',
            'user' => $session->get('name'),
            'date' => Time::now(),
            'id' => $session->get('id')
        ];
        return view('post/adopt/add', $data);
    }

    public function process()
    {
        $session = session();
        $data = [
            'title' => 'Add Adoption | Inguanku',
            'user' => $session->get('name')
        ];

        // $rules = [
        //     'avatar'      => 'required|max_size[avatar,1024]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]',
        //     'pet_name'    => 'required|min_length[1]|max_length[50]',
        //     'sex'         => 'required',
        //     'type'        => 'required',
        //     'breed'       => 'required',
        //     'description' => 'required'
        // ];

        // if ($this->validate($rules)) {
        if ($imagefile = $this->request->getFiles()) {
            $data = [
                'user_id' => $this->request->getVar('idHidden'),
                'pet_name' => $this->request->getVar('petName'),
                'date' => Time::now(),
                'description' => $this->request->getVar('description'),
                'sex' => $this->request->getVar('sex'),
                'category' => 'adopt',
                'type' => $this->request->getVar('type'),
                'breed' => $this->request->getVar('breed'),
            ];
            $postModel = new PostModel();
            $postModel->insert_post($data);

            $postid = $postModel->getid();
            $id = $postid[0]->post_id;
            $pictureModel = new PictureModel();
            foreach ($imagefile['pictures'] as $img) {
                $newName = $img->getRandomName();
                $data_picture = [
                    'post_id' => (int)$id,
                    'file_name' => $newName
                ];

                // if ($img->isValid() && !$img->hasMoved()) {
                $img->move('images/post', $newName);
                // }
                $pictureModel->insert_picture($data_picture);
            }
            return redirect()->to('./post/adopt');
        }
        //     $imagefile = $this->request->getFiles();
        //     $model = new PostModel();
        //     $model->save($data);
        //     return redirect()->to('./post/add');
        // } else {
        //     $data['validation'] = $this->validator;
        //     echo view('post/adopt/add', $data);
        // }
    }
}
