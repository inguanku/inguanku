<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class RequestModel extends Model
{
    protected $table = 'tbl_request';
    protected $primaryKey = 'request_id';
    protected $allowedFields = ['user_id', 'post_id', 'status'];

    public function checkRequest($data)
    {
        $filterData = [
            'user_id' => $data['user_id'],
            'post_id' =>  $data['post_id'],
            'status' => 'Pending'
        ];
        return $this->where($filterData)->findAll();
    }

    public function getMyRequest($userId) {
        return $this->select('tbl_request.status, tbl_request.user_id, tbl_picture.file_name, tbl_post.pet_name')
                    ->join('tbl_user', 'tbl_request.user_id = tbl_user.user_id')
                    ->join('tbl_post', 'tbl_request.post_id = tbl_post.post_id')
                    ->join('tbl_picture', 'tbl_picture.post_id = tbl_post.post_id')
                    ->groupBy('tbl_picture.picture_id')
                    ->where(['tbl_request.user_id' => $userId])->get()->getResult();
    }

    public function requestList($data)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tbl_request WHERE user_id = $data");
        return $query->getResult();
    }
}