<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PostModel;
use App\Models\PictureModel;

class Post extends BaseController
{
    protected $postModel;
    protected $userModel;
    protected $pictureModel;
    protected $session;
    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->pictureModel = new PictureModel();
        $this->userModel = new UserModel();
        $this->session = session();
    }

    public function adopt()
    {
        $location = $this->request->getVar('location');
        $postData = $this->postModel->getPostData('adopt', $location);
        $data = [
            'title' => 'Adoption | Inguanku',
            'heading' => 'Adoption',
            'category' => 'adopt',
            'user' => $this->userModel->where('user_id', $this->session->get('id'))->first(),
            'userData' => $this->userModel->findAll(),
            'selectedLocation' => $location,
            'post' => $postData
        ];
        return view('post/index', $data);
    }

    public function breed()
    {
        $location = $this->request->getVar('location');
        $postData = $this->postModel->getPostData('breed', $location);
        $data = [
            'title' => 'Breeding | Inguanku',
            'heading' => 'Breeding',
            'category' => 'breed',
            'user' => $this->userModel->where('user_id', $this->session->get('id'))->first(),
            'userData' => $this->userModel->findAll(),
            'selectedLocation' => $location,
            'post' => $postData
        ];
        return view('post/index', $data);
    }

    public function detail()
    {
        $postId = $this->request->uri->getSegment(3);
        $dataDetail = $this->postModel->getDetail($postId);
        $data = [
            'title' => 'Detail | Inguanku',
            'name' => $this->session->get('name'),
            'user' => $this->userModel->where('user_id', $this->session->get('id'))->first(),
            'user_id' => $this->session->get('id'),
            'dataDetail' => $dataDetail,
            'segment' => $postId
        ];
        return view('post/detail', $data);
    }

    public function delete($id = null)
    {
        $idPic = $this->pictureModel->where('post_id', $id)->findAll();
        $postData = $this->postModel->where('post_id', $id)->findAll();
        $category = $postData[0]['category'];
        foreach ($idPic as $pic) {
            unlink('images/post/' . $pic['file_name']);
        }
        $data['user'] = $this->postModel->where('post_id', $id)->delete();
        $data['pictures'] = $this->pictureModel->where('post_id', $id)->delete();

        switch ($category) {
            case 'Adopt':
                return redirect()->to('./post/adopt');
            case 'Breed':
                return redirect()->to('./post/breed');
        }
        return redirect()->to('./');
    }
}
