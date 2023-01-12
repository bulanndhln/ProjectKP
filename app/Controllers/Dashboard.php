<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RevModel;
use App\Controllers\BaseController;
use App\Models\POModel;

class Dashboard extends BaseController
{
    protected $poModel;
    protected $revModel;

    public function __construct()
    {
        $this->poModel = new POModel();
        $this->revModel = new RevModel();
    }

    public function index(){
        $this->poModel->orderBy('waktu', 'DESC');
        $this->revModel->orderBy('waktu', 'DESC');
        $data = [
            'title' => 'Welcome | Dashboard',
            'po' => $this->poModel->findAll(),
            'rkap' => $this->revModel->findAll(),
        ]; 
    
        return view('/dashboard/index', $data);
    }

    public function bot() {
        
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m-d');
        
        function bulan_indo($tanggal) {
            $bulan = array(1=>'Januari', 
            'Februari', 
            'Maret', 
            'April', 
            'Mei', 
            'Juni', 
            'Juli', 
            'Agustus', 
            'September', 
            'Oktober', 
            'November', 
            'Desember'
            );
            return $bulan[$tanggal];
        }    
            
        $tampH="" ;
        $tampB=0;
        $tampT=0;
            
        $format_indo = date('d-m-Y', strtotime($tanggal));
                                                
        $pecah = explode('-', $format_indo);
                                            
        $hari = date('D', strtotime($format_indo));
        $tgl = $pecah[0];
        $bulan = $pecah[1];
        $tahun = $pecah[2];
                                                
        $tampH=$tgl;
        $tampB=bulan_indo((int)$bulan);
        $tampT=$tahun;
            
        $tanggalSekarang =  $tampH . " " . $tampB . " " . $tampT;
        
        $this->poModel->orderBy('waktu', 'DESC'); $this->revModel->orderBy('waktu', 'DESC');
        $po = $this->poModel->findAll();
        $rkap = $this->revModel->findAll();
        
        $hitungOpen = 0; $hitungJumlahOpen = 0; $hitungBast = 0; $hitungJumlahBast = 0; $sumRKAP = 0; $hitungTargetRKAP = 0; $sumMTD = 0;
        $isiTabel = '';
        foreach($po as $hitung) {
            if($hitung['status'] == 'OPEN') {
                $hitungOpen++;
                $hitungJumlahOpen+= $hitung['ppn'];   
            } else if($hitung['status'] == 'BAST') {
                $hitungBast++; 
                $hitungJumlahBast+= $hitung['ppn'];   
            }
        }
        
        $i = 0;
        foreach($po as $hitung) {
            $isiTabel = $isiTabel . $hitung['noPO'] . " | " . $hitung['segmen'] . " | " . $hitung['statusPkj'] . " | " .  "Rp" . number_format($hitung['ppn'],2,',','.')."%0A";
            $i++;

            if($i == 10)
                break;
        }

        foreach($rkap as $count)
        if($count['type'] != 'MTD') {
            $hitungTargetRKAP = $count['jan'] + $count['feb'] + $count['mar'] + $count['apr'] + $count['mei'] + $count['jun'] + $count['jul'] + $count['agus'] + $count['sept'] + $count['okt'] + $count['nov'] + $count['des'];
            $sumRKAP += $hitungTargetRKAP;
            if($sumRKAP==0)
            $sumRKAP= 1;
            
        } else 
            $sumMTD = $count['jan'] + $count['feb'] + $count['mar'] + $count['apr'] + $count['mei'] + $count['jun'] + $count['jul'] + $count['agus'] + $count['sept'] + $count['okt'] + $count['nov'] + $count['des'];
        
        $perbandingan1 = ''; $perbandingan2 = '';
        $perulangan = 1;
        foreach($po as $poModel) {
            $perbandingan1 = $poModel['waktu'];
            if($perulangan == 1) 
                break;
        }
        foreach($rkap as $revModel) {
            $perbandingan2 = $revModel['waktu'];
            if($perulangan == 1) 
                break;
        }
        

        $waktuSekarang = max($perbandingan1, $perbandingan2);
        $tanggalUpdate = explode(" ", $waktuSekarang);
        
        $update=explode('-',$tanggalUpdate[0]);
        
        $updatenew=$update[2] . '-'. $update[1] . '-' . $update[0];

        $pesan = 
        "Monitoring Comemerce SMS " . "%0A" . 
        "%0A".
        "Tanggal $tanggalSekarang" . "%0A" .
        "PO BAST = $hitungBast  PO" . "%0A" .
        "Total = Rp" . number_format($hitungJumlahBast,2,',','.')   . "%0A" .
        "PO OPEN = $hitungOpen" . "%0A" .
        "Total = Rp" . number_format($hitungJumlahOpen,2,',','.')  . "%0A" .
        "%0A".
        "==============================================" . "%0A" .
        $isiTabel .
        "==============================================" . "%0A" .
        "%0A".
        "Target RKAP Rp" . number_format($sumRKAP,2,',','.') . "" . "%0A" .
        "Revenue YTD : Rp" . number_format( $sumMTD,2,',','.')  . "%0A" .
        
        "%YTD : " . round(($sumMTD/$sumRKAP) * 100, 2) . "%" . "%0A" .
        "===Update : " . $updatenew ."==="
        ;

        $token = getenv('TELEGRAM_TOKEN');
        $url = "https://api.telegram.org/bot$token/sendMessage?chat_id=-740727515&parse_mode=html&text=$pesan";
                
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_close($curlHandle);

        $results = curl_exec($curlHandle);
        curl_close($curlHandle);
        return redirect()->to('/dashboard');
    }

    

}
