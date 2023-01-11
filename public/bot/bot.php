<?php 
    $servername = "localhost";
    $database = "cta";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } 

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

    $query1 = 'SELECT * FROM reportpo ORDER BY waktu DESC';
    $query2 = 'SELECT * FROM revenue ORDER BY waktu DESC';

    $hasil1 = mysqli_query($conn, $query1);
    $hasil2 = mysqli_query($conn, $query2);
    
    $perbandingan1 = ''; $perbandingan2 = ''; $perulangan = 1;
    $hitungOpen = 0; $hitungJumlahOpen = 0; $hitungBast = 0; $hitungJumlahBast = 0; $sumRKAP = 0; $hitungTargetRKAP = 0; $sumMTD = 0;
    $isiTabel = '';
    while($hitung = mysqli_fetch_array($hasil1)) {
        if($hitung['status'] == 'OPEN') {
            $hitungOpen++;
            $hitungJumlahOpen+= $hitung['ppn'];   
        } else if($hitung['status'] == 'BAST') {
            $hitungBast++; 
            $hitungJumlahBast+= $hitung['ppn'];   
        }
        $isiTabel = $isiTabel . $hitung['noPO'] . " | " . $hitung['segmen'] . " | " . $hitung['statusPkj'] . " | " .  "Rp" . number_format($hitung['ppn'],2,',','.')."%0A";
        $perbandingan1 = $perbandingan1 . $hitung['waktu'];
    }

    $pisah = explode('%0A', $isiTabel);
    $gabungPisah = '';
    for($i = 0; $i < 4; $i++)
        $gabungPisah = "$gabungPisah $pisah[$i] %0A";

    while($count = mysqli_fetch_array($hasil2)) {
        if($count['type'] != 'MTD') {
            $hitungTargetRKAP = $count['jan'] + $count['feb'] + $count['mar'] + $count['apr'] + $count['mei'] + $count['jun'] + $count['jul'] + $count['agus'] + $count['sept'] + $count['okt'] + $count['nov'] + $count['des'];
            $sumRKAP += $hitungTargetRKAP;
            if($sumRKAP==0)
            $sumRKAP= 1;
        } else {
            $sumMTD = $count['jan'] + $count['feb'] + $count['mar'] + $count['apr'] + $count['mei'] + $count['jun'] + $count['jul'] + $count['agus'] + $count['sept'] + $count['okt'] + $count['nov'] + $count['des'];
        }
        $perbandingan2 = $perbandingan2 . $count['waktu'];
    }

    $hasilPerbandingan1 = substr($perbandingan1,0, 10);
    $hasilPerbandingan2 = substr($perbandingan2,0, 10);

    $time1 = date('Y-m-d',strtotime($hasilPerbandingan1));
    $time2 = date('Y-m-d',strtotime($hasilPerbandingan2));

    $waktuSekarang = max($time1, $time2);
    $update=explode('-',$waktuSekarang);
    
    $updatenew= $update[2] . '-'. $update[1] . '-' . $update[0];

    $pesan = 
    "Monitoring Comemerce SMS " . "%0A" . 
    "%0A".
    "Tanggal $tanggalSekarang" . "%0A" .
    "PO BAST = $hitungBast PO" . "%0A" .
    "Total =  Rp" . number_format($hitungJumlahBast,2,',','.')  . "%0A" .
    "PO OPEN = $hitungOpen " . "%0A" .
    "Total = Rp" . number_format($hitungJumlahOpen,2,',','.') . "%0A" .
    "%0A".
    "==============================================" . "%0A" .
    $gabungPisah .
    "==============================================" . "%0A" .
    "%0A".
    "Target Rp" . number_format($sumRKAP,2,',','.') . "%0A" .
    "Revenue YTD : Rp" . number_format( $sumMTD,2,',','.') . "%0A".
    
    "%YTD : " . round(($sumMTD/$sumRKAP) * 100, 2) . "%" . "%0A" .
    "===Update : " . $updatenew ."===" 
    ;

    // Operasi pada bot telegram
    $content = file_get_contents("php://input");
    if($content) {
        $token = "5474958866:AAGUdcJ3O_pnoIBzEdds-p-XdaBwVDVMyAk";
        $apiLink = "https://api.telegram.org/bot$token/";

        $update = json_decode($content, true);
        $chat_id = $update['message']['chat']['id'];
        $message = $update["message"]["text"];
        
        if (strpos($message, "/data") === 0)
            file_get_contents($apiLink . "sendMessage?chat_id=$chat_id&parse_mode=html&text=$pesan");
        
    } else 
        echo "Hanya Telegram yang dapat mengakses URL ini";

?>