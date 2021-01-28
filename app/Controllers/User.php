<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
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
            $model = new UserModel();
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'passwd' => password_hash($this->request->getVar('passwd'), PASSWORD_DEFAULT),
                'phone' => $this->request->getVar('phone'),
                'city' => $this->request->getVar('city')
            ];

            $model->save($data);
            return redirect()->to('./login');
        } else {
            $data['validation'] = $this->validator;
            echo view('user/register', $data);
        }
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('passwd');
        $data = $model->where('email', $email)->first();
        if ($data) {
            $pass = $data['passwd'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id' => $data['user_id'],
                    'name'       => $data['name'],
                    'email'     => $data['email'],
                    'city'    => $data['city'],
                    'phone' => $data['phone'],
                    'address' => $data['address'],
                    'avatar' => $data['avatar'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/home');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/login');
        }
    }

    public function login()
    {
        return view('user/login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/home');
    }

    public function profile()
    {
        $session = session();
        $data = [
            'title' => 'Profile | Inguanku',
            'user' => $session->get('name'),
            'email' => $session->get('email'),
            'city' => $session->get('city'),
            'phone' => $session->get('phone'),
            'address' => $session->get('address'),
            'avatar' => $session->get('avatar'),
            'id' => $session->get('id')
        ];
        return view('user/profile', $data);
    }

    public function edit()
    {
        $fileAvatar = $this->request->getFile('avatar');
        $avatar = $fileAvatar->getRandomName();
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'city' => $this->request->getVar('city'),
            'address' => $this->request->getVar('address'),
            'avatar' => $avatar,
        ];
        $userId = $this->request->getVar('idHidden');
        $userModel = new UserModel();
        $userModel->update($userId, $data);
        $fileAvatar->move('images/avatar', $avatar);
    }
}
