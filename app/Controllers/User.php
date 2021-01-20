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
            'passwd'    => 'required|min_length[3]|max_length[40]',
            'passConf'  => 'matches[passwd]',
            'phone'     => 'required',
            'address'   => 'required'
        ];

        if($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'passwd' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'phone' => $this->request->getVar('phone'),
                'address' => $this->request->getVar('address')
            ];

            $model->insert($data);
            return redirect()->to('./login');
        }else {
            $data['validation'] = $this->validator;
            echo view('user/register', $data);
        }
    }


}
