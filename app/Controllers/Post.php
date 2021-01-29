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
        $postData = $this->postModel->getPostData('adopt');
        $data = [
            'title' => 'Adoption | Inguanku',
            'heading' => 'Adoption',
            'category' => 'adopt',
            'name' => $this->session->get('name'),
            'post' => $postData
        ];
        return view('post/index', $data);
    }

    public function breed()
    {
        $postData = $this->postModel->getPostData('breed');
        $data = [
            'title' => 'Breeding | Inguanku',
            'heading' => 'Breeding',
            'category' => 'breed',
            'name' => $this->session->get('name'),
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
                break;
            case 'Breed':
                return redirect()->to('./post/breed');
                break;
        }
    }
}
