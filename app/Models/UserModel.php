<?php  
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table='user';
    protected $primaryKey ='id';
    protected $allowedFields = ['id','nama','tglLahir', 'gender','noHP','email', 'nik','password_hash','password'];
    //protected $useTimestamps = true;

    public function getDataStaff ()
    {
        return $this->findAll();
    }
    public function getId($id){
        return $this->where(['id'=>$id])->first();
    }
}

