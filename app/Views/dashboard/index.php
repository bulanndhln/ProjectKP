<?= $this->extend('template/layouts'); ?>

<?= $this->section('container'); ?>

    <?php 
        $hitungOpen = 0; $hitungJumlahOpen = 0;
        $hitungBast = 0; $hitungJumlahBast = 0;
        
        foreach($po as $hitung) {
            if($hitung['status'] == 'OPEN') {
                $hitungOpen++;
                $hitungJumlahOpen+= $hitung['ppn'];   
            }
            else if($hitung['status'] == 'BAST') {
                $hitungBast++; 
                $hitungJumlahBast+= $hitung['ppn'];   
            }
        }

        $sumRKAP = 0;
        $sumMTD = 0;
        foreach($rkap as $count) {
            if($count['type'] != 'MTD') {
                $hitungTargetRKAP = $count['jan'] + $count['feb'] + $count['mar'] + $count['apr'] + $count['mei'] + $count['jun'] + $count['jul'] + $count['agus'] + $count['sept'] + $count['okt'] + $count['nov'] + $count['des'];
                $sumRKAP += $hitungTargetRKAP;
                
            } else 
                $sumMTD = $count['jan'] + $count['feb'] + $count['mar'] + $count['apr'] + $count['mei'] + $count['jun'] + $count['jul'] + $count['agus'] + $count['sept'] + $count['okt'] + $count['nov'] + $count['des'];
        
            }
    ?>
    

    <?php 
    $hitungApWifi=0; $hitungNB=0; $hitungPT2S=0; $hitungHEM=0; 
    $hitungOLO=0; $hitungQER=0; $hitungQEA=0; $hitungQEU=0; 
    $hitungPSB=0; $hitungPT2NS=0; $hitungSTTF=0; $hitungPT2Sim=0;

    $hitungJumlahAW =0; $hitungJumlahNB=0; $hitungJumlahPT2S=0;
    $hitungJumblahHEM=0; $hitungJumlahOLO=0; $hitungJumlahQER=0;
    $hitungJumlahQEA=0; $hitungJumlahQEU=0; $hitungJumlahPSB=0;
    $hitungJumlahPT2NS=0; $hitungJumlahSTTF=0; $hitungJUmlahPT2Simp=0;

    foreach($po as $hitung){
        if($hitung['segmen'] == 'AP WIFI'){
            if($hitung['status'] == 'OPEN') {
                $hitungApWifi++;
                $hitungJumlahAW+= $hitung['ppn'];   
            }
        }
        if($hitung['segmen'] == 'NODE B'){
            if($hitung['status'] == 'OPEN') {
                $hitungNB++;
                $hitungJumlahNB+= $hitung['ppn'];   
            }
        }
        if($hitung['segmen'] == 'PT2S'){
            if($hitung['status'] == 'OPEN') {
                $hitungPT2S++;
                $hitungJumlahPT2S+= $hitung['ppn'];   
            }
        }
        if($hitung['segmen'] == 'HEM'){
            if($hitung['status'] == 'OPEN') {
                $hitungHEM++;
                $hitungJumblahHEM+= $hitung['ppn'];   
            }
        }
        if($hitung['segmen'] == 'OLO'){
            if($hitung['status'] == 'OPEN') {
                $hitungOLO++;
                $hitungJumlahOLO+= $hitung['ppn'];   
            }
        }
        if($hitung['segmen'] == 'QE RECOVERY'){
            if($hitung['status'] == 'OPEN') {
                $hitungQER++;
                $hitungJumlahQER+= $hitung['ppn'];   
            }
        }
        if($hitung['segmen'] == 'QE AKSES'){
            if($hitung['status'] == 'OPEN') {
                $hitungQEA++;
                $hitungJumlahQEA+= $hitung['ppn'];   
            }
        }
        if($hitung['segmen'] == 'QE UTILITAS'){
            if($hitung['status'] == 'OPEN') {
                $hitungQEU++;
                $hitungJumlahQEU+= $hitung['ppn'];   
            }
        }
        if($hitung['segmen'] == 'PSB WIFI'){
            if($hitung['status'] == 'OPEN') {
                $hitungPSB++;
                $hitungJumlahPSB+= $hitung['ppn'];   
            }
        }

        if($hitung['segmen'] == 'PT2NS'){
            if($hitung['status'] == 'OPEN') {
                $hitungPT2NS++;
                $hitungJumlahPT2NS+= $hitung['ppn'];   
            }
        }
        if($hitung['segmen'] == 'STTF'){
            if($hitung['status'] == 'OPEN') {
                $hitungSTTF++;
                $hitungJumlahSTTF+= $hitung['ppn'];   
            }
        }
        if($hitung['segmen'] == 'PT2 SIMPLE'){
            if($hitung['status'] == 'OPEN') {
                $hitungPT2Sim++;
                $hitungJUmlahPT2Simp+= $hitung['ppn'];   
            }
        }
    }
    ?>
    <?php  
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
        
    function ubahTanggal($date) {
        $tampH="" ;
        $tampB=0;
        $tampT=0;
            
        $format_indo = date('d-m-Y', strtotime($date));
                                                
        $pecah = explode('-', $format_indo);
                                            
        $hari = date('D', strtotime($format_indo));
        $tgl = $pecah[0];
        $bulan = $pecah[1];
        $tahun = $pecah[2];
                                                
        $tampH=$tgl;
        $tampB=bulan_indo((int)$bulan);
        $tampT=$tahun;
            
        return $tanggalSekarang =  $tampH . " " . $tampB . " " . $tampT;
    }
    ?>
    <h6 style="color:black; font-weight:bold; margin:5px;">Update: 
        <?php 
            $perbandingan1 = '';
            $perbandingan2 = '';
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
            echo ubahTanggal($waktuSekarang);
            

        ?>
    </h6>
    <div class="row">
        <div class="col" >
            <div class="card"  id="card-dash">
                <div class="card-body">
                <h5 class="card-title">PO BAST = <?= $hitungBast; ?> PO</h5>
                <p class="card-text">Total = <?= "Rp" . number_format($hitungJumlahBast,2,',','.') ; ?> </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card"  id="card-dash">
                <div class="card-body">
                <h5 class="card-title">PO OPEN = <?= $hitungOpen; ?> PO</h5>
                <p class="card-text">Total = <?= "Rp" . number_format($hitungJumlahOpen,2,',','.')  ; ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card"  id="card-dash">
                <div class="card-body">
                <h5 class="card-title">Target RKAP = <?= "Rp" . number_format($sumRKAP,2,',','.'); ?></h5>
                <p class="card-text" id="cardtext" >Revenue YTD : <?= "Rp" . number_format($sumMTD,2,',','.'); ?> </p>
                <p class="card-text" id="cardtext">%YTD : 
                    <?php if($sumRKAP==0)
                            $sumRKAP= 1; ?> 
                    <?=round(($sumMTD/$sumRKAP) * 100 , 2) . "%"; ?>
                </p>
                </div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col">
            <hr size="4" color="#4D4D4D">
        </div>
    </div>
    <div class="row">
        <div class="col">
           <h5 style="color: #A90000; font-weight:bold;">Open Segmen</h5>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card"  id="card-dash">
                <div class="card-body">
                <h6 class="card-title">AP WIFI OPEN = <?= $hitungApWifi; ?> PO</h6>
                <p class="card-text">Total = <?= "Rp" . number_format($hitungJumlahAW,2,',','.')  ; ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card"  id="card-dash">
                <div class="card-body">
                <h6 class="card-title">NODE B OPEN = <?= $hitungNB; ?> PO</h6>
                <p class="card-text">Total = <?= "Rp" . number_format($hitungJumlahNB,2,',','.')  ; ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card"  id="card-dash">
                <div class="card-body">
                <h6 class="card-title">PT2S OPEN = <?= $hitungPT2S; ?> PO</h6>
                <p class="card-text">Total = <?= "Rp" . number_format($hitungJumlahPT2S,2,',','.')  ; ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card"  id="card-dash">
                <div class="card-body">
                <h6 class="card-title">HEM OPEN = <?= $hitungHEM; ?> PO</h6>
                <p class="card-text">Total = <?= "Rp" . number_format($hitungJumblahHEM,2,',','.')  ; ?></p>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col">
                <div class="card"  id="card-dash">
                    <div class="card-body">
                    <h6 class="card-title">OLO OPEN = <?= $hitungOLO; ?> PO</h6>
                    <p class="card-text">Total = <?= "Rp" . number_format($hitungJumlahOLO,2,',','.')  ; ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card"  id="card-dash">
                    <div class="card-body">
                    <h6 class="card-title">QE RECOVERY OPEN = <?= $hitungQER; ?> PO</h6>
                    <p class="card-text">Total = <?= "Rp" . number_format($hitungJumlahQER,2,',','.')  ; ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card"  id="card-dash">
                    <div class="card-body">
                    <h6 class="card-title">QE AKSES OPEN = <?= $hitungQEA; ?> PO</h6>
                    <p class="card-text">Total = <?= "Rp" . number_format($hitungJumlahQEA,2,',','.')  ; ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card"  id="card-dash">
                    <div class="card-body">
                    <h6 class="card-title">QE UTILITAS OPEN = <?= $hitungQEU; ?> PO</h6>
                    <p class="card-text">Total = <?= "Rp" . number_format($hitungJumlahQEU,2,',','.')  ; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col">
            <div class="card"  id="card-dash">
                <div class="card-body">
                <h6 class="card-title">PSB WIFI OPEN = <?= $hitungPSB; ?> PO</h6>
                <p class="card-text">Total = <?= "Rp" . number_format($hitungJumlahPSB,2,',','.')  ; ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card"  id="card-dash">
                <div class="card-body">
                <h6 class="card-title">PT2NS OPEN = <?= $hitungPT2NS; ?> PO</h6>
                <p class="card-text">Total = <?= "Rp" . number_format($hitungJumlahPT2NS,2,',','.')  ; ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card"  id="card-dash">
                <div class="card-body">
                <h6 class="card-title">STTF OPEN = <?= $hitungSTTF; ?> PO</h6>
                <p class="card-text">Total = <?= "Rp" . number_format($hitungJumlahSTTF,2,',','.')  ; ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card"  id="card-dash">
                <div class="card-body">
                <h6 class="card-title">PT2 SIMPLE OPEN = <?= $hitungPT2Sim; ?> PO</h6>
                <p class="card-text">Total = <?= "Rp" . number_format($hitungJUmlahPT2Simp,2,',','.')  ; ?></p>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>