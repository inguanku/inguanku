<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'tbl_post';
    protected $allowedFields = ['user_id', 'pet_name', 'date', 'description', 'sex', 'category', 'status', 'type', 'breed', 'picture_id'];

    public function insert_post($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
}
