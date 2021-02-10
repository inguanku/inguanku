<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\TransactionModel;
use App\Models\UserModel;

class User extends BaseController
{
    protected $postModel;
    protected $userModel;
    protected $session;
    protected $transactionModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->postModel = new PostModel();
        $this->transactionModel = new TransactionModel();
        $this->session = session();
    }

    public function auth()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('passwd');
        $data = $this->userModel->where('email', $email)->first();
        if ($data) {
            $id = $data['user_id'];
            $pass = $data['passwd'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id' => $id,
                    'name' => $data['name'],
                    'avatar' => $data['avatar'],
                    'logged_in'     => TRUE
                ];
                $this->session->set($ses_data);
                return redirect()->to('/home');
            } else {
                $this->session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        } else {
            $this->session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/login');
        }
    }

    public function profile()
    {
        if($this->session)
        {
            $userId = $this->session->get('id');
            $postRequest = $this->postModel->postRequest($userId);
            $transactions = $this->transactionModel->getTransactions($userId);
        }

        $id = $this->session->get('id');
        $dataProfil = $this->userModel->getProfile($id);
        $data = [
            'title' => 'Profile | Inguanku',
            'user' => $this->userModel->where('user_id', $this->session->get('id'))->first(),
            'profile' => $dataProfil,
            'postRequest' => $postRequest,
            'transactions' => $transactions
        ];
        return view('user/profile', $data);
    }

    public function register()
    {
        return view('user/register');
    }

    public function save()
    {
        helper(['form']);

        $rules = [
            'name'      => 'required|min_length[3]|max_length[50]',
            'email'     => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tbl_user.email]',
            'passwd'    => 'required|min_length[3]|max_length[100]',
            'passConf'  => 'matches[passwd]',
            'phone'     => 'required',
            'city'      => 'required'
        ];

        if ($this->validate($rules)) {
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'passwd' => password_hash($this->request->getVar('passwd'), PASSWORD_DEFAULT),
                'phone' => $this->request->getVar('phone'),
                'city' => $this->request->getVar('city')
            ];

            $this->userModel->save($data);
            return redirect()->to('./login');
        } else {
            $data['validation'] = $this->validator;
            return view('user/register', $data);
        }
    }


    public function login()
    {
        return view('user/login');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/home');
    }


    public function edit()
    {
        $fileAvatar = $this->request->getFile('avatar');
        if ($fileAvatar->getError() == 4) {
            $avatar = $this->request->getVar('oldpic');
        } else {
            $avatar = $fileAvatar->getRandomName();
            $fileAvatar->move('images/avatar', $avatar);
            if ($this->request->getVar('oldpic') != null) {
                unlink('images/avatar/' . $this->request->getVar('oldpic'));
            }
        }
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'city' => $this->request->getVar('city'),
            'address' => $this->request->getVar('address'),
            'avatar' => $avatar,
        ];
        $userId = $this->request->getVar('idHidden');
        $this->userModel->update($userId, $data);
        return redirect()->to('/user/profile');
    }
}
