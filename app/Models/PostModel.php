<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class PostModel extends Model
{

    protected $table = 'tbl_post';
    protected $primaryKey = 'post_id';
    protected $allowedFields = ['user_id', 'pet_name', 'date', 'description', 'sex', 'category', 'status', 'type', 'breed', 'picture_id'];

    public function insert_post($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function getid()
    {
        $db = Database::connect();
        $query = $db->query('SELECT post_id FROM tbl_post ORDER BY post_id DESC LIMIT 1');
        return $query->getResult();
    }

    public function getPostData($category, $city)
    {
        if ($city){
            return $this->db->table('tbl_post')
                ->join('tbl_user', 'tbl_user.user_id=tbl_post.user_id')
                ->join('tbl_picture', 'tbl_picture.post_id=tbl_post.post_id')
                ->groupBy('tbl_post.post_id')
                ->where(['tbl_post.status' => 'available', 'tbl_post.category' => $category, 'tbl_user.city' => $city])
                ->get()->getResultArray();
        } else {
            return $this->db->table('tbl_post')
                ->join('tbl_user', 'tbl_user.user_id=tbl_post.user_id')
                ->join('tbl_picture', 'tbl_picture.post_id=tbl_post.post_id')
                ->groupBy('tbl_post.post_id')
                ->where(['tbl_post.status' => 'available', 'tbl_post.category' => $category])
                ->get()->getResultArray();
        }
    }

    public function getDetail($postId)
    {
        return $this->db->table('tbl_post')
            ->join('tbl_user', 'tbl_user.user_id=tbl_post.user_id')
            ->join('tbl_picture', 'tbl_picture.post_id=tbl_post.post_id')
            ->where('tbl_post.post_id', $postId)
            ->get()->getResultArray();
    }

    public function getRecent()
    {
        return $this->db
                    ->table('tbl_post')
                    ->LIMIT(4)
                    ->join('tbl_picture', 'tbl_picture.post_id=tbl_post.post_id')
                    ->groupBy('tbl_post.post_id')->orderBy('tbl_post.post_id','DESC')
                    ->get()->getResult();
    }

    public function postRequest($userId)
    {
        return $this->db->table('tbl_post')
                        ->join('tbl_request', 'tbl_request.post_id = tbl_post.post_id')
                        ->join('tbl_user', 'tbl_request.user_id = tbl_user.user_id')
                        ->join('tbl_picture', 'tbl_post.post_id = tbl_picture.post_id')
                        ->where(['tbl_post.user_id'=> $userId, 'tbl_post.status' => 'Available', 'tbl_request.status' => 'Pending'])
                        ->get()->getResult();
    }
}
