<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['name', 'email', 'passwd', 'phone', 'address', 'city', 'avatar'];

    public function getProfile($userId)
    {
        return $this->where(['user_id' => $userId])->first();
    }
}
