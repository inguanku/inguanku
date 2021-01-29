<?php

namespace App\Controllers;

use \CodeIgniter\I18n\Time;
use App\Models\PostModel;
use App\Models\PictureModel;

class Adopt extends BaseController
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

    public function add()
    {
        $data = [
            'title' => 'Add Adoption | Inguanku',
            'name' => $this->session->get('name'),
            'date' => Time::now(),
            'id' => $this->session->get('id')
        ];
        return view('post/adopt/add', $data);
    }

    public function detail()
    {
        $postId = $this->request->uri->getSegment(3);
        $dataDetail = $this->postModel->getDetail($postId);
        $data = [
            'title' => 'Detail | Inguanku',
            'name' => $this->session->get('name'),
            'user_id' => $this->session->get('id'),
            'dataDetail' => $dataDetail,
            'segment' => $postId
        ];
        return view('post/detail', $data);
    }

    public function process()
    {
        $data = [
            'title' => 'Add Adoption | Inguanku',
            'name' => $this->session->get('name')
        ];
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
            return redirect()->to('./post/adopt');
        }
    }

    public function delete($id = null)
    {
        $idPic = $this->pictureModel->where('post_id', $id)->findAll();
        foreach ($idPic as $pic) {
            unlink('images/post/' . $pic['file_name']);
        }
        $data['user'] = $this->postModel->where('post_id', $id)->delete();
        $data['pictures'] = $this->pictureModel->where('post_id', $id)->delete();
        return redirect()->to('./post/adopt');
    }
}
