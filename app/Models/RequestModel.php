<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class RequestModel extends Model
{
    protected $table = 'tbl_request';
    protected $primaryKey = 'requset_id';
    protected $allowedFields = ['user_id', 'post_id', 'status'];

    public function checkRequest($data)
    {
        $userId = $data['user_id'];
        $postId = $data['post_id'];
        // return $this->db->table('tbl_request')
        //                 ->where('user_id', $userId)
        //                 ->where('post_id', $postId)->getRow();
        $db = \Config\Database::connect();
        $query = $db->query("SELECT request_id FROM tbl_request WHERE user_id = $userId AND post_id = $postId");
        return $row = $query->getRow();
    }
}