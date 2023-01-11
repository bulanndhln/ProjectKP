<?php
namespace App\Controllers;
use App\Models\POModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
class POController extends BaseController
{
    protected $poModel;
    public function __construct()
    {
        $this->poModel = new POModel();
    }
    public function index(){
        $data =[
            'title'=>'Report PO',
            'po' => $this->poModel->findAll()
        ];
        return view('report/index',$data);
    }
    public function tambahData(){
        $data = [
            'title' => 'Add PO',
            'segmen' => $this->request->getPost('segmen')
        ];
        return view('/report/tambahPO', $data);
    }
    public function dataPO(){
        $rules = [
            'noPO' => 'required|numeric|is_unique[reportpo.noPO]',
            'tglPO'=> 'required',
            'tglTOC'=> 'required',
            'segmen' => 'required',             
            'namaPkj' => 'required',
            'statusPkj'=>'required',
            'ppn' => 'required|numeric',
            'noSP' => 'required',
            'tglSP' => 'required',
            'tgtBAST' => 'required',
            'status'=> 'required'
        ];   
        date_default_timezone_set('asia/jakarta');
        $tanggal = date('Y-m-d h:i:s');
        if ($this->validate($rules)) {
            $data = [
                'id'=>$this->request->getVar('id'),
                'noPO' => $this->request->getPost('noPO'),
                'tglPO' => $this->request->getPost('tglPO'),
                'tglTOC' => $this->request->getPost('tglTOC'),
                'segmen' => $this->request->getPost('segmen'),
                'namaPkj' => $this->request->getPost('namaPkj'),
                'statusPkj' => $this->request->getPost('statusPkj'),
                'ppn' => $this->request->getPost('ppn'),
                'noSP' => $this->request->getPost('noSP'),
                'tglSP' => $this->request->getPost('tglSP'),
                'tgtBAST' => $this->request->getPost('tgtBAST'),
                'status' => $this->request->getPost('status'),
                'waktu' => $tanggal
            ];
            $this->poModel->save($data);
            return redirect()->to('/report');
        }else{
            return redirect()->back()->withInput()->with('validation',$this->validator);
        }
    }
    public function editData($id){
        session();
        $validasi = \Config\Services::validation();
        $po = $this->poModel->getId($id);        
        $data = [
            'title' => 'Edit Data PO',
            'validasi'=>$validasi,
            'po'=>$po
        ];
        return view('report/edit_data', $data);
    }
    public function saveEdit(){
        $id = $this->request->getVar('id');    
        $segmen = $this->request->getvar('segmen');
        if($this->request->getVar('segmen') == "")
            $segmen = $this->request->getVar('segmen1');            
        $status = $this->request->getvar('status');
        if($this->request->getVar('status') == "")
            $status = $this->request->getVar('status1');
        $rules = [
            'tglPO'=> 'required',
            'tglTOC'=> 'required',         
            'namaPkj' => 'required',
            'statusPkj'=>'required',
            'ppn' => 'required|numeric',
            'noSP' => 'required',
            'tglSP' => 'required',
            'tgtBAST' => 'required',
        ];
        date_default_timezone_set('asia/jakarta');
        $tanggal = date('Y-m-d h:i:s');
        if ($this->validate($rules)) {
            $data = [
                'id'=>$this->request->getVar('id'),
                'noPO' => $this->request->getPost('noPO'),
                'tglPO' => $this->request->getPost('tglPO'),
                'tglTOC' => $this->request->getPost('tglTOC'),
                'segmen' => $segmen,
                'namaPkj' => $this->request->getPost('namaPkj'),
                'statusPkj' => $this->request->getPost('statusPkj'),
                'ppn' => $this->request->getPost('ppn'),
                'noSP' => $this->request->getPost('noSP'),
                'tglSP' => $this->request->getPost('tglSP'),
                'tgtBAST' => $this->request->getPost('tgtBAST'),
                'status' =>$status,
                'waktu' => $tanggal
            ];
            $this->poModel->replace($data);
            return redirect()->to('/report');            
        }else{            
            return redirect()->back()->withInput()->with('validation',$this->validator);
        }
    }
    public function excel2(){
        $dataPO = [
            'po'=>$this->poModel->getDataPO()
        ];
        return view('/report/excelPO', $dataPO);
    }
    public function deleteData($id){
        $this->poModel->delete($id);
        date_default_timezone_set('asia/jakarta');
        $tanggal = date('Y-m-d h:i:s');
        $this->poModel->save([
            'id' => $id + 1,
            'waktu' => $tanggal
        ]);
        return redirect()->to('/POController/index');
    }
    public function deleteAll(){
        date_default_timezone_set('asia/jakarta');
        $tanggal = date('Y-m-d h:i:s');
       // $this->revModel->delete($id);
        for($i = 11; $i <= 19; $i++) { 
        $this->poModel->save([
                'waktu' => $tanggal
            ]);
        }
        $this->poModel->query('TRUNCATE TABLE reportPO');
        return redirect()->to('/POController/index');
        
    }
}