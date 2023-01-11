<?php  
namespace App\Models;

use CodeIgniter\Model;

class RevModel extends Model{
    protected $table='revenue';
    protected $primaryKey ='id';
    protected $allowedFields = [
        'id', 'type','jan', 'feb','mar', 'apr', 'mei', 'jun', 
        'jul','agus', 'sept', 'okt', 'nov', 'des',
        'grand','rkap','mtd', 'ytd', 'waktu'
    ];

    public function getDataRev ()
    {
        return $this->findAll();
    }

    public function getId($id){
        return $this->where(['id'=>$id])->first();
    }
}