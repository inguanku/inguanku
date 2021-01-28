<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['name', 'email', 'passwd', 'phone', 'address', 'city', 'avatar'];

    // public function editProfil($data, $userId)
    // {
    //     return $this->db->update($data, $userId);
    // }
}
