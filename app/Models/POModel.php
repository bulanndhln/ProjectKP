<?php  
namespace App\Models;

use CodeIgniter\Model;

class POModel extends Model{
    protected $table='reportPO';
    protected $primaryKey ='id';
    protected $allowedFields = [
        'noPO', 'tglPO','tglTOC', 'segmen',
        'namaPkj', 'statusPkj', 'ppn', 'noSP', 
        'tglSP','tgtBAST', 'status', 'waktu'];

    public function getDataPO ()
    {
        return $this->findAll();
    }

    public function getId($id){
        return $this->where(['id'=>$id])->first();
    }
}