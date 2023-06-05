<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Admin extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'useradmin';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
     protected $allowedFields    = ['id','username','email','phoneNo','password','profilePic','created_at','updated_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['beforeInsert'];
    protected $afterInsert    = ['afterInsert'];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function beforeInsert(array $data){
        $data = $this->PasswordHash($data);
        return $data;
    }
    protected function afterInsert(array $data){
        $data = $this->PasswordHash($data);
        return $data;
    }
    protected function PasswordHash(array $data){
       if (isset($data['data']['password'])) {
        $data['data']['password'] = password_hash($data['data']['password'],PASSWORD_DEFAULT);
        return $data;
       }
    }

}
