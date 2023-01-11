<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;

class Auth extends BaseController
{   protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function login()
    {   
        if($this->request->getMethod()=='post'){
            //return ('berhasil');
            $rules =[
                'email' => 'required',
                'password' => 'required'
            ];
            $validate=$this->validate($rules);
            if($validate){
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                $userModel = new UserModel;
                $eml = $userModel->asObject()->where('email', $email)->first();

                if($eml){
                    //$mail=$eml[];
                    if(password_verify($password,$eml->password_hash)){
                        session()->set([
                            'nama' => $eml->nama,
                            'nik' => $eml->nik,
                            'email' => $eml->email,
                            'logged_in' => true

                        ]);
                        return redirect()->to('/Dashboard');
                    }
                }
                return redirect()->back()->withInput()->with('error', 'Your email or password is wrong!');
            }else{
                return redirect()->back()->withInput()->with('validation',$this->validator);
            }
        }
        return view('auth/login');
    }

    public function tampilStaff(){
        $data =[
            'title'=>'Data Staff',
            'staff' => $this->userModel->findAll()
        ];
        return view('staff/index',$data);
    }
    
    public function editStaff($id){
        session();
        $validasi = \Config\Services::validation();
        $staff = $this->userModel->getId($id);        
        $data = [
            'title' => 'Edit Data Staff',
            'validasi'=>$validasi,
            'staff'=>$staff
        ];
        return view('staff/editStaff', $data);
    }

    public function saveEdit(){    
        $id = $this->request->getVar('id');
        $gender = $this->request->getVar('gender');
        $type = $this->request->getvar('type');
        if($this->request->getVar('type') == "")
            $type = $this->request->getVar('type1');
        $rules = [
            'id'=> 'required',         
            'nama' => 'required',
            'tglLahir'=>'required',
            'noHP' => 'required',
            'email' => 'required',
            'nik' => 'required',
            'password'=> 'required',
        ];
        if($gender == null) {
            $gender = $this->request->getVar('gender1');
        }
        date_default_timezone_set('asia/jakarta');
        $tanggal = date('Y-m-d h:i:s');

        if ($this->validate($rules)) {

            $data = [
                'id'=> $id,
                'nama' => $this->request->getPost('nama'),
                'tglLahir' => $this->request->getPost('tglLahir'),
                'gender' => $gender,
                'noHP' => $this->request->getPost('noHP'),
                'email' => $this->request->getPost('email'),
                'nik' => $this->request->getPost('nik'),
                'password' => $this->request->getPost('password'),
                'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];

            $this->userModel->replace($data);
            return redirect()->to('/staff', $id);
            
        }else{
            return redirect()->back()->withInput()->with('validation',$this->validator);
        }
    }

    public function logout(): RedirectResponse
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
