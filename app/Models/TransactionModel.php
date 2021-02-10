<?php


namespace App\Models;


use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = "tbl_transaction";
    protected $primaryKey = "trans_id";
    protected $allowedFields = ["request_id", "date", "status"];

    public function insertTransaction($data){
        return $this->db->table($this->table)->insert($data);
    }

    public function getTransactions($userId)
    {
        $where = "tbl_post.status='Unavailable' AND tbl_request.status='Accepted' AND tbl_transaction.status = 'Process' AND tbl_post.user_id='". $userId ."' OR tbl_request.user_id='". $userId ."' AND tbl_transaction.status = 'Process'";
        return $this->db->table('tbl_post')
            ->join('tbl_request', 'tbl_request.post_id = tbl_post.post_id')
            ->join('tbl_user', 'tbl_request.user_id = tbl_user.user_id')
            ->join('tbl_picture', 'tbl_post.post_id = tbl_picture.post_id')
            ->join('tbl_transaction', 'tbl_transaction.request_id = tbl_request.request_id')
            ->where($where)
            ->get()->getResult();
    }

    public function getTransactionHistory($userId)
    {
        $where = "tbl_post.status='Unavailable' AND tbl_request.status='Accepted' AND tbl_post.user_id='". $userId ."' OR tbl_request.user_id='". $userId ."'";
        return $this->db->table('tbl_post')
            ->join('tbl_request', 'tbl_request.post_id = tbl_post.post_id')
            ->join('tbl_user', 'tbl_request.user_id = tbl_user.user_id')
            ->join('tbl_picture', 'tbl_post.post_id = tbl_picture.post_id')
            ->join('tbl_transaction', 'tbl_transaction.request_id = tbl_request.request_id')
            ->where($where)
            ->get()->getResult();
    }

    public function updateStatus($transactionId, $status){
        return $this->update($transactionId, ['status' => $status]);
    }
}