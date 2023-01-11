<?php
namespace App\Controllers;
use App\Models\RevModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
class RevController extends BaseController
{
    protected $revModel;
    public function __construct()
    {
        $this->revModel = new RevModel();
    }
    public function index(){
        $data =[
            'title'=>'Target Revenue',
            'rev' => $this->revModel->findAll(),
        ];
        return view('revenue/index',$data);
    }
    public function tambahData(){
        session();
        $validasi=\Config\Services::validation();
        $data = [
            'title' => 'Tambah Target Revenue',
            'validasi' => $validasi
           // 'segmen' => $this->request->getPost('segmen')
        ];
        return view('/revenue/tambahRevenue', $data);
    }
    public function dataRevenue(){
        if(!$this->validate([
            'type'=>[
                'rules'=>'required',
                'errors'=> [
                    'required'=> 'Select revenue type'
                ]
            ],
            'jan'=>[
                'rules'=>'required|numeric',
                'errors'=> [
                    'required'=> 'Please fill!',
                    'numeric' => 'Must be a number'
                ]
                ],
            'feb'=>[
            'rules'=>'required|numeric',
            'errors'=> [
                'required'=> 'Please fill!',
                'numeric' => 'Must be a number'
            ]
            ],
            'mar'=>[
            'rules'=>'required|numeric',
            'errors'=> [
                'required'=> 'Please fill!',
                'numeric' => 'Must be a number'
            ]
            ],
            'apr'=>[
            'rules'=>'required|numeric',
            'errors'=> [
                'required'=> 'Please fill!',
                'numeric' => 'Must be a number'
            ]
            ],
            'mei'=>[
            'rules'=>'required|numeric',
            'errors'=> [
                'required'=> 'Please fill!',
                'numeric' => 'Must be a number'
            ]
            ],
            'jun'=>[
            'rules'=>'required|numeric',
            'errors'=> [
                'required'=> 'Please fill!',
                'numeric' => 'Must be a number'
            ]
            ],
            'jul'=>[
            'rules'=>'required|numeric',
            'errors'=> [
                'required'=> 'Please fill!',
                'numeric' => 'Must be a number'
            ]
            ],
            'agus'=>[
            'rules'=>'required|numeric',
            'errors'=> [
                'required'=> 'Please fill!',
                'numeric' => 'Must be a number'
            ]
            ],
            'sept'=>[
            'rules'=>'required|numeric',
            'errors'=> [
                'required'=> 'Please fill!',
                'numeric' => 'Must be a number'
            ]
            ],
            'okt'=>[
            'rules'=>'required|numeric',
            'errors'=> [
                'required'=> 'Please fill!',
                'numeric' => 'Must be a number'
            ]
            ],
            'nov'=>[
            'rules'=>'required|numeric',
            'errors'=> [
                'required'=> 'Please fill!',
                'numeric' => 'Must be a number'
            ]
            ],
            'des'=>[
            'rules'=>'required|numeric',
            'errors'=> [
                'required'=> 'Please fill!',
                'numeric' => 'Must be a number'
            ]
            ],
            'mtd'=>[
            'rules'=>'required|numeric',
            'errors'=> [
                'required'=> 'Please fill!',
                'numeric' => 'Must be a number'
            ]
            ],
            'ytd'=>[
            'rules'=>'required|numeric',
            'errors'=> [
                'required'=> 'Please fill!',
                'numeric' => 'Must be a number'
            ]
            ],
        ])){
            return redirect()-> to('/RevController/tambahData')->withInput();
        }    
                $id    = $this->request->getVar('id');
                $type  = $this->request->getVar('type');
                $jan   = $this->request->getVar('jan');
                $feb   = $this->request->getVar('feb');
                $mar   = $this->request->getVar('mar');
                $apr   = $this->request->getVar('apr');
                $mei   = $this->request->getVar('mei');
                $jun   = $this->request->getVar('jun');
                $jul   = $this->request->getVar('jul');
                $agus  = $this->request->getVar('agus');
                $sept  = $this->request->getVar('sept');
                $okt   = $this->request->getVar('okt');
                $nov   = $this->request->getVar('nov');
                $des   = $this->request->getVar('des');
                $mtd   = $this->request->getVar('mtd');
                $ytd   = $this->request->getVar('ytd');
                
                $rkap=$jan+$feb+$mar+$apr+$mei+$jun+$jul+$agus+$sept+$okt+$nov+$des;
            $data = [
                'id'=>$id,
                'type' => $type,
                'jan' => $jan,
                'feb' => $feb,
                'mar' => $mar,
                'apr' => $apr,
                'mei' => $mei,
                'jun' => $jun,
                'jul' => $jul,
                'agus' => $agus,
                'sept' => $sept,
                'okt' => $okt,
                'nov' => $nov,
                'des' => $des,
                'mtd' => $mtd,
                'ytd' => $ytd,
                'rkap' =>$rkap
            ];
            $this->revModel->save($data);
            session()-> setFlashdata('pesan','Data Berhasil Ditambahkan');
            return redirect()->to('/revenue');
    }
    public function editData($id){
        session();
        $validasi = \Config\Services::validation();
        $rev= $this->revModel->getId($id);
        $data = [
            'title' => 'Edit Data',
            'validasi'=>$validasi,
            'rev'=>$rev
        ];
        return view('revenue/editRev', $data);
    }

    public function saveEdit(){
        $id = $this->request->getVar('id');
        $type = $this->request->getvar('type');
        if($this->request->getVar('type') == "")
            $type = $this->request->getVar('type1');
        $rules = [
            
            'jan'=> 'required',         
            'feb' => 'required',
            'mar'=>'required',
            'apr' => 'required',
            'mei' => 'required',
            'jun' => 'required',
            'jul' => 'required',
            'agus'=> 'required',
            'sept'=> 'required',
            'okt'=> 'required',
            'nov'=> 'required',
            'des'=> 'required',
        ];
        date_default_timezone_set('asia/jakarta');
        $tanggal = date('Y-m-d h:i:s');
        $rev='rev';
        if ($this->validate($rules)) {
            $data = [
                'id'=>$this->request->getVar('id'),
                'type' => $type,
                'jan' => $this->request->getPost('jan'),
                'feb' => $this->request->getPost('feb'),
                'mar' => $this->request->getPost('mar'),
                'apr' => $this->request->getPost('apr'),
                'mei' => $this->request->getPost('mei'),
                'jun' => $this->request->getPost('jun'),
                'jul' => $this->request->getPost('jul'),
                'agus' => $this->request->getPost('agus'),
                'sept' => $this->request->getPost('sept'),
                'okt' => $this->request->getPost('okt'),
                'nov' => $this->request->getPost('nov'),
                'des' => $this->request->getPost('des'),
                'waktu' => $tanggal
            ];
            $this->revModel->replace($data);
            return redirect()->to('/revenue', $id);
        }else{
            return redirect()->back()->withInput()->with('validation',$this->validator);
        }
    }
    public function excel2(){
        $dataRev = [
            'rev'=>$this->revModel->getDataRev()
        ];
        return view('/revenue/excelRev', $dataRev);
    }
    public function deleteData($id){
        date_default_timezone_set('asia/jakarta');
        $tanggal = date('Y-m-d h:i:s');
       // $this->revModel->delete($id);
        $this->revModel->save([
            'id' => $id,
            'jan' => 0,
            'feb' => 0,
            'mar'=> 0,
            'apr'=> 0,
            'mei'=> 0,
            'jun'=> 0,
            'jul'=> 0,
            'agus'=> 0,
            'sept'=> 0,
            'okt'=> 0,
            'nov'=> 0,
            'des'=> 0,
            'waktu' => $tanggal
        ]);
        return redirect()->to('/RevController/index');
    }
    public function deleteAll(){
        date_default_timezone_set('asia/jakarta');
        $tanggal = date('Y-m-d h:i:s');
       for($i = 11; $i <= 19; $i++) { 
        $this->revModel->save([
                'id' => $i,
                'jan' => 0,
                'feb' => 0,
                'mar'=> 0,
                'apr'=> 0,
                'mei'=> 0,
                'jun'=> 0,
                'jul'=> 0,
                'agus'=> 0,
                'sept'=> 0,
                'okt'=> 0,
                'nov'=> 0,
                'des'=> 0,
                'waktu' => $tanggal
            ]);
        }
        return redirect()->to('/RevController/index');
    }
}