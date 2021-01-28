<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;
    protected $session;
    protected $userData;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = session();
        $user_id = $this->session->get('id');
        $this->userData = $this->userModel->where(['user_id' => $user_id])->first();
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
            echo view('user/register', $data);
        }
    }

    public function auth()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('passwd');
        $data = $this->userModel->where('email', $email)->first();
        if ($data) {
            $pass = $data['passwd'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id' => $data['user_id'],
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

    public function login()
    {
        return view('user/login');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/home');
    }

    public function profile()
    {
        $id = $this->session->get('id');
        $dataProfil = $this->userModel->getProfile($id);
        $data = [
            'title' => 'Profile | Inguanku',
            'user' => $this->userData,
            'profile' => $dataProfil
        ];
        return view('user/profile', $data);
    }

    public function edit()
    {
        $id = $this->session->get('id');
        $dataProfil = $this->userModel->getProfile($id);
        $fileAvatar = $this->request->getFile('avatar');
        if ($fileAvatar->getError() == 4) {
            $avatar = $this->request->getVar('oldpic');
        } else {
            $avatar = $fileAvatar->getRandomName();
            $fileAvatar->move('images/avatar', $avatar);
        }
        $data = ['profile' => $dataProfil, 'title' => 'Profile | Inguanku', 'user' => $this->userData];
        $dataedit = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'city' => $this->request->getVar('city'),
            'address' => $this->request->getVar('address'),
            'avatar' => $avatar,
        ];
        $userId = $this->request->getVar('idHidden');
        $this->userModel->update($userId, $dataedit);
        return view('user/edit', $data);
    }
}
