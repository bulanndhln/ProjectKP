<?= $this->extend('template/layouts'); ?>
<?= $this->section('container'); ?>    
    
<?php 
    $temp = []; $perulangan = 0;
    foreach($staff as $lahir)
        $temp[$perulangan++] = $lahir['tglLahir'];

    $tgl1 = $temp[0]; $tgl2 = $temp[1]; $tgl3 = $temp[2];
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
    $hasil1 = ubahTanggal($tgl1); $hasil2 = ubahTanggal($tgl2); $hasil3 = ubahTanggal($tgl3);
?>

<div class="row ">
    <?php 
    $j=0;
    foreach($staff as $s){?>
    <div class="col m-4">
        <div class="card " id="card-staff">
            <div class="card-body">
                <table>
                    <tr>
                        <td class="staff">Name</td>
                        <td class="staff">:</td>
                        <td class="staff"><p class="card-text" id="cardtext"><?php echo $s['nama'] ?></p></td>
                    </tr>
                    <tr>
                        <td class="staff">Email</td>
                        <td class="staff">:</td>
                        <td class="staff"><p class="card-text" id="cardtext"><?php echo $s['email'] ?></p></td>
                    </tr>
                    <tr>
                        <td class="staff">Date of Birth</td>
                        <td class="staff">:</td>
                        <td class="staff"><p class="card-text" id="cardtext">
                            <?php 
                                if($j == 0) echo $hasil1; else if($j == 1) echo $hasil2; else if($j == 2) echo $hasil3; $j++;
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="staff">Gender</td>
                        <td class="staff">:</td>
                        <td class="staff"><p class="card-text" id="cardtext"><?php echo $s['gender'] ?></p></td>
                    </tr>
                    <tr>
                        <td class="staff">Phone Number</td>
                        <td class="staff">:</td>
                        <td class="staff"><p class="card-text" id="cardtext"><?php echo $s['noHP'] ?></p></td>
                    </tr>
                    <tr>
                        <td class="staff">NIK</td>
                        <td class="staff">:</td>
                        <td class="staff"><p class="card-text" id="cardtext"><?php echo $s['nik'] ?></p></td>
                    </tr>
                    <tr>
                        <td class="staff">Password</td>
                        <td class="staff">:</td>
                        <td class="staff"><p class="card-text" id="cardtext">
                            <?php 
                            $length = strlen($s['password']);
                            for($i = 0; $i < $length; $i++) 
                            echo '•';
                            ?>
                            </p>
                        </td>
                    </tr>
                </table>
                <form action="/Auth/editStaff/<?= $s['id']; ?>" method="post" >
                <?= csrf_field(); ?>
                    <input type="hidden" name="editMethode" value="EDIT">
                    <button type="submit" class="btn" id="btnEdit" onclick="return konfirmsi()"><i class="bi bi-pen"></i> Edit</button>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<?= $this->endSection(); ?>