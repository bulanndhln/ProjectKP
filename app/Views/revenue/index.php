<?= $this->extend('template/layouts'); ?>
<?= $this->section('container'); ?>
    
    <?php  if(session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?= session()->getFlashdata('pesan'); ?></strong>
        <button type="button" class="btn-class" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif ?>
    <div class="card" id="card-rev">
        
            <div class="table-responsive">
                <table class="table table-striped table-sm table-hover">
                    <thead>
                        <tr class="target">
                            <th style="background-color:  #A90000; color: white;" scope="col">Witel Palembang</th>
                            <th style="background-color:  #A90000; color: white;" scope="col">RKAP</th>
                            <th style="background-color:  #A90000; color: white;" scope="col">January</th>
                            <th style="background-color:  #A90000; color: white;" scope="col">February</th>
                            <th style="background-color:  #A90000; color: white;" scope="col">March</th>
                            <th style="background-color:  #A90000; color: white;" scope="col">April</th>
                            <th style="background-color:  #A90000; color: white;" scope="col">Mei</th>
                            <th style="background-color:  #A90000; color: white;" scope="col">June</th>
                            <th style="background-color:  #A90000; color: white;" scope="col">July</th>
                            <th style="background-color:  #A90000; color: white;" scope="col">August</th>
                            <th style="background-color:  #A90000; color: white;" scope="col">September</th>
                            <th style="background-color:  #A90000; color: white;" scope="col">October</th>
                            <th style="background-color:  #A90000; color: white;" scope="col">November</th>
                            <th style="background-color:  #A90000; color: white;" scope="col">December</th>
                            <th style="background-color:  #A90000; color: white;" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $tempSum = 0; 
                    foreach($rev as $p){
                        if($p['type'] != 'MTD') {
                        ?>
                    <tr>
                            <td style="background-color:  #FFA2A2; color: black; font-weight:bold;"><?php echo $p['type'] ?></td>
                            <td>
                                <?php 
                                if($p['type'] != 'MTD') {
                                    $sum = $p['jan'] + $p['feb'] + $p['mar']+ $p['apr']+ $p['mei']+ $p['jun']+ $p['jul']+ $p['agus']+ $p['sept']+ $p['okt']+ $p['nov']+ $p['des'];
                                    echo "Rp" . number_format($sum,2,',','.');
                                    $tempSum += $sum;
                                }
                                ?>
                            </td>
                            <td><?php echo "Rp" .number_format($p['jan'] ,2,',','.')?></td>
                            <td><?php echo "Rp" .number_format($p['feb'] ,2,',','.')?></td>
                            <td><?php echo "Rp" .number_format($p['mar'] ,2,',','.')?></td>
                            <td><?php echo "Rp" .number_format($p['apr'] ,2,',','.')?></td>
                            <td><?php echo "Rp" .number_format($p['mei'] ,2,',','.')?></td>
                            <td><?php echo "Rp" .number_format($p['jun'] ,2,',','.')?></td>
                            <td><?php echo "Rp" .number_format($p['jul'] ,2,',','.')?></td>
                            <td><?php echo "Rp" .number_format($p['agus'],2,',','.') ?></td>
                            <td><?php echo "Rp" .number_format($p['sept'],2,',','.') ?></td>
                            <td><?php echo "Rp" .number_format($p['okt'] ,2,',','.')?></td>
                            <td><?php echo "Rp" .number_format($p['nov'] ,2,',','.')?></td>
                            <td><?php echo "Rp" .number_format($p['des'] ,2,',','.')?></td>
                            
                            <td>
                                <div class="rata">
                                    <form action="/RevController/editData/<?= $p['id']; ?>" method="post" >
                                    <?= csrf_field(); ?>
                                        <input type="hidden" name="editMethode" value="EDIT">
                                        <button type="submit" class="btn btn-outline-secondary" onclick="return konfirmsi()"><i class="bi bi-pen"></i></button>
                                    </form>
                                    <form action="/RevController/deleteData/<?= $p['id']; ?>" method="post" >
                                    <?= csrf_field(); ?>
                                        <input type="hidden" name="_methode" value="DELETE">
                                        <button type="submit" class="btn btn-outline-danger " onclick="return konfirmasi()"><i class="bi bi-trash3-fill"></i></button>
                                    </form>
                                    </div>
                            </td>
                            
                        </tr>
                    <?php } }?>

                    <?php 
                        function duit($tempSum, $rev, $bulan) {
                            $temp = 0;
                            if($tempSum==0)
                                $tempSum= 1;
                            foreach($rev as $sum) {
                                if($sum['type'] != 'MTD')
                                    $temp+=$sum["$bulan"];
                            }
                            echo "Rp" . number_format($temp,2,',','.');
                        }
                    ?>
                    <tr>
                        <td style="background-color:  #FFA2A2; color: black; font-weight:bold;">Grand Total</td>
                        <td>
                            <?= "Rp" . number_format($tempSum,2,',','.'); ?>
                        </td>
                        <td><?php duit($tempSum, $rev, 'jan'); ?></td>
                        <td><?php duit($tempSum, $rev, 'feb'); ?></td>
                        <td><?php duit($tempSum, $rev, 'mar'); ?></td>
                        <td><?php duit($tempSum, $rev, 'apr'); ?></td>
                        <td><?php duit($tempSum, $rev, 'mei'); ?></td>
                        <td><?php duit($tempSum, $rev, 'jun'); ?></td>
                        <td><?php duit($tempSum, $rev, 'jul'); ?></td>
                        <td><?php duit($tempSum, $rev, 'agus'); ?></td>
                        <td><?php duit($tempSum, $rev, 'sept'); ?></td>
                        <td><?php duit($tempSum, $rev, 'okt'); ?></td>
                        <td><?php duit($tempSum, $rev, 'nov'); ?></td>
                        <td><?php duit($tempSum, $rev, 'des'); ?></td>
                        
                        <td></td>
                    </tr>

                    <tr><td rowspan="4" style="text-align:center; vertical-align: middle; background-color:  #A90000; color: white; font-weight:bold; "><h6>REVENUE</h6></td>
                        <?php foreach($rev as $mtd) {
                            if($mtd['type'] == 'MTD') {    
                        ?>
                        <td style="background-color:  #FFA2A2; color: black; font-weight:bold;"><?php echo $p['type'] ?></td>
                        <td><?php echo "Rp" . number_format($p['jan'],2,',','.')  ?></td>
                        <td><?php echo "Rp" . number_format($p['feb'],2,',','.')  ?></td>
                        <td><?php echo "Rp" . number_format($p['mar'],2,',','.')  ?></td>
                        <td><?php echo "Rp" . number_format($p['apr'],2,',','.')  ?></td>
                        <td><?php echo "Rp" . number_format($p['mei'],2,',','.' ) ?></td>
                        <td><?php echo "Rp" . number_format($p['jun'],2,',','.')  ?></td>
                        <td><?php echo "Rp" . number_format($p['jul'],2,',','.')  ?></td>
                        <td><?php echo "Rp" . number_format($p['agus'],2,',','.')  ?></td>
                        <td><?php echo "Rp" . number_format($p['sept'],2,',','.')  ?></td>
                        <td><?php echo "Rp" . number_format($p['okt'],2,',','.')  ?></td>
                        <td><?php echo "Rp" . number_format($p['nov'],2,',','.')  ?></td>
                        <td><?php echo "Rp" . number_format($p['des'],2,',','.')  ?></td>
        
                        <?php } }?>
                        
                        <td>
                            <div class="rata">
                                <form action="/RevController/editData/<?= $p['id']; ?>" method="post" >
                                <?= csrf_field(); ?>
                                    <input type="hidden" name="editMethode" value="EDIT">
                                    <button type="submit" class="btn btn-outline-secondary" onclick="return konfirmsi()"><i class="bi bi-pen"></i></button>
                                </form>
                                <form action="/RevController/deleteData/<?= $p['id']; ?>" method="post" >
                                <?= csrf_field(); ?>
                                    <input type="hidden" name="_methode" value="DELETE">
                                    <button type="submit" class="btn btn-outline-danger" onclick="return konfirmasi()"><i class="bi bi-trash3-fill"></i></button>
                                </form>
                            </div>
                            </td>
                    </tr>
                    <?php function persenMtd($rev,$bulan){
                        $temp = 0;
                        $temp2=0;
                        $persen =0;
                            foreach($rev as $sum) {
                                if($sum['type'] != 'MTD')
                                $temp+=$sum["$bulan"];
                                $temp2=$sum["$bulan"];
                                if($temp==0)
                                    $temp =1;
                                $persen=($temp2/$temp)*100;
                            }
                            echo round($persen,2)."%";
                    }
                                
                            ?>
                    <tr>
                        <td style="background-color:  #FFA2A2; color: black; font-weight:bold;">%MTD</td>
                        <td><?php persenMtd($rev, 'jan'); ?></td>
                        <td><?php persenMtd($rev, 'feb'); ?></td>
                        <td><?php persenMtd($rev, 'mar'); ?></td>
                        <td><?php persenMtd($rev, 'apr'); ?></td>
                        <td><?php persenMtd($rev, 'mei'); ?></td>
                        <td><?php persenMtd($rev, 'jun'); ?></td>
                        <td><?php persenMtd($rev, 'jul'); ?></td>
                        <td><?php persenMtd($rev, 'agus');?></td>
                        <td><?php persenMtd($rev, 'sept');?></td>
                        <td><?php persenMtd($rev, 'okt'); ?></td>
                        <td><?php persenMtd($rev, 'nov'); ?></td>
                        <td><?php persenMtd($rev, 'des'); ?></td>
                        <td></td>
                    </tr>

                        <?php
                            function ytd($rev, $tempBulan, $bulan) {
                                $tempAwal = 0;
                                foreach($rev as $sum) { 
                                    if($sum['type'] == 'MTD')
                                        $tempAwal= $tempBulan + $sum[$bulan];
                                }
                                return $tempAwal;
                            }

                            function cetak($hasil) {
                                echo "Rp" . number_format($hasil,2,',','.') ;
                            }
                        ?>

                    <tr>
                        <td style="background-color:  #FFA2A2; color: black; font-weight:bold;">YTD</td>
                        <td><?php $hasilJan = ytd($rev, 0, 'jan'); cetak($hasilJan);?></td>
                        <td><?php $hasilFeb = ytd($rev, $hasilJan, 'feb'); cetak($hasilFeb);    ?></td>
                        <td><?php $hasilMar = ytd($rev, $hasilFeb, 'mar'); cetak($hasilMar);    ?></td>
                        <td><?php $hasilApr = ytd($rev, $hasilMar, 'apr'); cetak($hasilApr);    ?></td>
                        <td><?php $hasilMei = ytd($rev, $hasilApr, 'mei'); cetak($hasilMei);    ?></td>
                        <td><?php $hasilJun = ytd($rev, $hasilMei, 'jun'); cetak($hasilJun);    ?></td>
                        <td><?php $hasilJul = ytd($rev, $hasilJun, 'jul'); cetak($hasilJul);    ?></td>
                        <td><?php $hasilAgus = ytd($rev, $hasilJul, 'agus'); cetak($hasilAgus); ?></td>
                        <td><?php $hasilSept = ytd($rev, $hasilAgus, 'sept'); cetak($hasilSept);?></td>
                        <td><?php $hasilOkt = ytd($rev, $hasilSept, 'okt'); cetak($hasilOkt);   ?></td>
                        <td><?php $hasilNov = ytd($rev, $hasilOkt, 'nov'); cetak($hasilNov);    ?></td>
                        <td><?php $hasilDes = ytd($rev, $hasilNov, 'des'); cetak($hasilDes);    ?></td>
                        <td></td>
                    </tr>

                    <?php 
                        function persenYTD($rev, $hasilBulan, $tempSum) {
                            $persenYtd=0;
                            if($tempSum==0)
                                $tempSum= 1;
                            foreach($rev as $sum) { 
                                if($sum['type'] == 'MTD')
                                    $persenYtd=($hasilBulan/$tempSum)*100;
                            }                                    
                            echo round($persenYtd,2)."%";
                        }
                    ?>

                    <tr>
                        <td style="background-color:  #FFA2A2; color: black; font-weight:bold;">%YTD</td>
                        <td><?php persenYTD($rev, $hasilJan, $tempSum) ;?></td>
                        <td><?php persenYTD($rev, $hasilFeb, $tempSum); ?></td>
                        <td><?php persenYTD($rev, $hasilMar, $tempSum); ?></td>
                        <td><?php persenYTD($rev, $hasilApr, $tempSum); ?></td>
                        <td><?php persenYTD($rev, $hasilMei, $tempSum); ?></td>
                        <td><?php persenYTD($rev, $hasilJun, $tempSum); ?></td>
                        <td><?php persenYTD($rev, $hasilJul, $tempSum); ?></td>
                        <td><?php persenYTD($rev, $hasilAgus, $tempSum);?></td>
                        <td><?php persenYTD($rev, $hasilSept, $tempSum);?></td>
                        <td><?php persenYTD($rev, $hasilOkt, $tempSum) ;?></td>
                        <td><?php persenYTD($rev, $hasilNov, $tempSum); ?></td>
                        <td><?php persenYTD($rev, $hasilDes, $tempSum); ?></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    
    <div class="rata">
        <a href="/RevController/excel2"><button type="button" class="btn  " id="btnExport"><i class="bi bi-box-arrow-down"></i> Export</button></a>
        <a href="/RevController/deleteAll"><button type="button" class="btn  " id="btndelete" onclick="return konfirmasi2()"><i class="bi bi-trash3-fill"></i> Delete All</button></a>
    </div>
    <script type="text/javascript">
        function konfirmasi() {
            let conf = confirm('Warning!\nDo you want to delete this data?')

            if (conf === true) {
                return true;
            } else {
                return false;
            }
        }
        function konfirmasi2() {
            let conf = confirm('Warning!\nDo you want to delete all data?')

            if (conf === true) {
                return true;
            } else {
                return false;
            }
        }
        
        </script>
        
    
<?= $this->endSection(); ?>