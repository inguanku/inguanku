<?php

namespace App\Models;

use CodeIgniter\Model;

class PictureModel extends Model
{
    protected $table = 'tbl_picture';
    protected $allowedFields = ['post_id', 'file_name'];

    public function insert_picture($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
}
