<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class PostModel extends Model
{

    protected $table = 'tbl_post';
    protected $allowedFields = ['user_id', 'pet_name', 'date', 'description', 'sex', 'category', 'status', 'type', 'breed', 'picture_id'];

    public function insert_post($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function getid()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT post_id FROM tbl_post ORDER BY post_id DESC LIMIT 1');
        return $query->getResult();
    }

    public function getPostData()
    {
        // $db      = \Config\Database::connect();
        // $builder = $db->table('tbl_post');
        // $builder->db->table('blog');
        // $builder->select('*');
        // $builder->join('comments', 'comments.id = blogs.id');
        // $query = $builder->get();
        return $this->db->table('tbl_post')
            ->join('tbl_user', 'tbl_user.user_id=tbl_post.user_id')
            ->join('tbl_picture', 'tbl_picture.post_id=tbl_post.post_id')
            ->get()->getResultArray();
    }
}