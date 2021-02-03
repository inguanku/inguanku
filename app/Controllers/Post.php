<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PostModel;
use App\Models\PictureModel;
use App\Models\RequestModel;

class Post extends BaseController
{
    protected $postModel;
    protected $userModel;
    protected $pictureModel;
    protected $requestModel;
    protected $session;
    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->pictureModel = new PictureModel();
        $this->userModel = new UserModel();
        $this->requestModel = new RequestModel;
        $this->session = session();
        
    }

    public function adopt()
    {

        $location = $this->request->getVar('location');
        $postData = $this->postModel->getPostData('adopt', $location);

        $session = session();
        $postData = $this->postModel->getPostData('adopt');
        $postModel = new PostModel();
        if($session)
        {
            $userId = $session->get('id');
            $postRequest = $postModel->postRequest($userId);
        }

        $data = [
            'title' => 'Adoption | Inguanku',
            'heading' => 'Adoption',
            'category' => 'adopt',
            'user' => $this->userModel->where('user_id', $this->session->get('id'))->first(),
            'userData' => $this->userModel->findAll(),
            'selectedLocation' => $location,
            'post' => $postData,
            'postRequest' => $postRequest
        ];
        return view('post/index', $data);
    }

    public function breed()
    {

        $location = $this->request->getVar('location');
        $postData = $this->postModel->getPostData('breed', $location);

        $session = session();
        $postModel = new PostModel();
        $postData = $this->postModel->getPostData('breed');
        if($session)
        {
            $userId = $session->get('id');
            $postRequest = $postModel->postRequest($userId);
        }

        $data = [
            'title' => 'Breeding | Inguanku',
            'heading' => 'Breeding',
            'category' => 'breed',
            'user' => $this->userModel->where('user_id', $this->session->get('id'))->first(),
            'userData' => $this->userModel->findAll(),
            'selectedLocation' => $location,
            'post' => $postData,
            'postRequest' => $postRequest
        ];
        return view('post/index', $data);
    }

    public function detail()
    {
        $postModel = new PostModel();
        $postId = $this->request->uri->getSegment(3);
        $dataDetail = $this->postModel->getDetail($postId);
        
        $session = session();
        $userId = $session->get('id');
        if(($userId))
        {
            $userId = $session->get('id');
            $dataRequest = [
                'user_id' => $this->session->get('id'),
                'post_id' => $this->request->uri->getSegment(3),
            ];
            $checkRequest = $this->requestModel->checkRequest($dataRequest);

            $data = [
                'title' => 'Detail | Inguanku',
                'name' => $this->session->get('name'),
                'user' => $this->userModel->where('user_id', $this->session->get('id'))->first(),
                'user_id' => $this->session->get('id'),
                'dataDetail' => $dataDetail,
                'segment' => $postId,
                'postRequest' => $postRequest = $postModel->postRequest($userId),
                'checkRequest' => $checkRequest
            ];
            return view('post/detail', $data);
        }
        

        $data = [
            'title' => 'Detail | Inguanku',
            'name' => $this->session->get('name'),
            'user' => $this->userModel->where('user_id', $this->session->get('id'))->first(),
            'user_id' => $this->session->get('id'),
            'dataDetail' => $dataDetail,
            'segment' => $postId,
            'postRequest' => $postRequest = $postModel->postRequest($userId),
            'checkRequest' => false
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

    public function request($id){
        // $postId = ;
        // (int)$postId;
        // dd($postId);
        $data = [
            'user_id' => $this->session->get('id'),
            'post_id' => (int)$this->request->uri->getSegment(3),
            'status' => "Pending"
        ];

        // dd($data);
        $this->requestModel->insert($data);
        return redirect()->to('./post/detail/'.$id);
    }

    public function confirm()
    {

        $session = session();
        $userId = $session->get('id');
        $postModel = new PostModel();

        if($userId)
        {
            $data = [
            'title' => "Confirm",
            'user' => $this->userModel->where('user_id', $this->session->get('id'))->first(),
            'postRequest' => $postRequest = $postModel->postRequest($userId),
            ];
        }
        
        return view('post/request', $data);
    }
}
