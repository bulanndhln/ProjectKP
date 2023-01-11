<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename= Target Revenue.xls")
?>
<html>
    <head>
    <style type="text/css">
        table tr th.satu .dua .tiga .empat .lima .enam .tujuh .delapan .sembilan .sepuluh .sebelas .duabelas .tigabelas .empatbelas{
            text-align: center;
            vertical-align: middle;
            
        } 
        table td.isi {
            text-align: center;
            vertical-align: middle;
        }
    </style>
    </head>
    <body>
        <div class="table-responsive ">
                <table border="1" class="table table-striped table-sm">
                    <thead>
                        <br><br>
                <h1 style="text-align: center" >TARGET REVENUE</h1> 
                <br><br><br>
                        <tr>
                            <th class="satu" style="background-color:  #A90000; color: white;" scope="col">Witel Palembang</th>
                            <th class="dua" style="background-color:  #A90000; color: white;" scope="col">RKAP</th>
                            <th class="tiga" style="background-color:  #A90000; color: white;" scope="col">January</th>
                            <th class="empat" style="background-color:  #A90000; color: white;" scope="col">February</th>
                            <th class="lima" style="background-color:  #A90000; color: white;" scope="col">March</th>
                            <th class="enam" style="background-color:  #A90000; color: white;" scope="col">April</th>
                            <th class="tujuh" style="background-color:  #A90000; color: white;" scope="col">Mei</th>
                            <th class="delapan" style="background-color:  #A90000; color: white;" scope="col">June</th>
                            <th class="sembilan" style="background-color:  #A90000; color: white;" scope="col">July</th>
                            <th class="sepuluh" style="background-color:  #A90000; color: white;" scope="col">August</th>
                            <th class="sebelas" style="background-color:  #A90000; color: white;" scope="col">September</th>
                            <th class="duabelas" style="background-color:  #A90000; color: white;" scope="col">October</th>
                            <th class="tigabelas" style="background-color:  #A90000; color: white;" scope="col">November</th>
                            <th class="empatbelas" style="background-color:  #A90000; color: white;" scope="col">December</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $tempSum = 0; 
                    foreach($rev as $p){
                        if($p['type'] != 'MTD') {
                        ?>
                    <tr class="isi">
                            <td style="background-color:  #FFA2A2; color: black;"><?php echo $p['type'] ?></td>
                            <td>
                                <?php 
                                if($p['type'] != 'MTD') {
                                    $sum = $p['jan'] + $p['feb'] + $p['mar']+ $p['apr']+ $p['mei']+ $p['jun']+ $p['jul']+ $p['agus']+ $p['sept']+ $p['okt']+ $p['nov']+ $p['des'];
                                    echo "Rp" . number_format($sum,2,',','.');
                                    $tempSum += $sum;
                                }
                                ?>
                            </td>
                            <td class="isi"><?php echo "Rp" .number_format($p['jan'] ,2,',','.')?></td>
                            <td class="isi"><?php echo "Rp" .number_format($p['feb'] ,2,',','.')?></td>
                            <td class="isi"><?php echo "Rp" .number_format($p['mar'] ,2,',','.')?></td>
                            <td class="isi"><?php echo "Rp" .number_format($p['apr'] ,2,',','.')?></td>
                            <td class="isi"><?php echo "Rp" .number_format($p['mei'] ,2,',','.')?></td>
                            <td class="isi"><?php echo "Rp" .number_format($p['jun'] ,2,',','.')?></td>
                            <td class="isi"><?php echo "Rp" .number_format($p['jul'] ,2,',','.')?></td>
                            <td class="isi"><?php echo "Rp" .number_format($p['agus'],2,',','.') ?></td>
                            <td class="isi"><?php echo "Rp" .number_format($p['sept'],2,',','.') ?></td>
                            <td class="isi"><?php echo "Rp" .number_format($p['okt'] ,2,',','.')?></td>
                            <td class="isi"><?php echo "Rp" .number_format($p['nov'] ,2,',','.')?></td>
                            <td class="isi"><?php echo "Rp" .number_format($p['des'] ,2,',','.')?></td>
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

                    
                    <tr >
                        <td style="background-color:  #FFA2A2; color: black;">Grand Total</td>
                        <td class="isi">
                            <?= "Rp" . number_format($tempSum,2,',','.'); ?>
                        </td>
                        <td class="isi"><?php duit($tempSum, $rev, 'jan'); ?></td>
                        <td class="isi"><?php duit($tempSum, $rev, 'feb'); ?></td>
                        <td class="isi"><?php duit($tempSum, $rev, 'mar'); ?></td>
                        <td class="isi"><?php duit($tempSum, $rev, 'apr'); ?></td>
                        <td class="isi"><?php duit($tempSum, $rev, 'mei'); ?></td>
                        <td class="isi"><?php duit($tempSum, $rev, 'jun'); ?></td>
                        <td class="isi"><?php duit($tempSum, $rev, 'jul'); ?></td>
                        <td class="isi"><?php duit($tempSum, $rev, 'agus'); ?></td>
                        <td class="isi"><?php duit($tempSum, $rev, 'sept'); ?></td>
                        <td class="isi"><?php duit($tempSum, $rev, 'okt'); ?></td>
                        <td class="isi"><?php duit($tempSum, $rev, 'nov'); ?></td>
                        <td class="isi"><?php duit($tempSum, $rev, 'des'); ?></td>
                        
                    </tr>

                    <tr><td rowspan="4" style="text-align:center; vertical-align: middle; background-color:  #A90000; color: white; ">REVENUE</td>
                        <?php foreach($rev as $mtd) {
                            if($mtd['type'] == 'MTD') {    
                        ?>
                        <td style="background-color:  #FFA2A2; color: black;"><?php echo $p['type'] ?></td>
                        <td class="isi"><?php echo "Rp" . number_format($p['jan'],2,',','.')  ?></td>
                        <td class="isi"><?php echo "Rp" . number_format($p['feb'],2,',','.')  ?></td>
                        <td class="isi"><?php echo "Rp" . number_format($p['mar'],2,',','.')  ?></td>
                        <td class="isi"><?php echo "Rp" . number_format($p['apr'],2,',','.')  ?></td>
                        <td class="isi"><?php echo "Rp" . number_format($p['mei'],2,',','.' ) ?></td>
                        <td class="isi"><?php echo "Rp" . number_format($p['jun'],2,',','.')  ?></td>
                        <td class="isi"><?php echo "Rp" . number_format($p['jul'],2,',','.')  ?></td>
                        <td class="isi"><?php echo "Rp" . number_format($p['agus'],2,',','.')  ?></td>
                        <td class="isi"><?php echo "Rp" . number_format($p['sept'],2,',','.')  ?></td>
                        <td class="isi"><?php echo "Rp" . number_format($p['okt'],2,',','.')  ?></td>
                        <td class="isi"><?php echo "Rp" . number_format($p['nov'],2,',','.')  ?></td>
                        <td class="isi"><?php echo "Rp" . number_format($p['des'],2,',','.')  ?></td>
        
                        <?php } }?>
                        
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
                        <td style="background-color:  #FFA2A2; color: black;">%MTD</td>
                        <td class="isi"><?php persenMtd($rev, 'jan'); ?></td>
                        <td class="isi"><?php persenMtd($rev, 'feb'); ?></td>
                        <td class="isi"><?php persenMtd($rev, 'mar'); ?></td>
                        <td class="isi"><?php persenMtd($rev, 'apr'); ?></td>
                        <td class="isi"><?php persenMtd($rev, 'mei'); ?></td>
                        <td class="isi"><?php persenMtd($rev, 'jun'); ?></td>
                        <td class="isi"><?php persenMtd($rev, 'jul'); ?></td>
                        <td class="isi"><?php persenMtd($rev, 'agus');?></td>
                        <td class="isi"><?php persenMtd($rev, 'sept');?></td>
                        <td class="isi"><?php persenMtd($rev, 'okt'); ?></td>
                        <td class="isi"><?php persenMtd($rev, 'nov'); ?></td>
                        <td class="isi"><?php persenMtd($rev, 'des'); ?></td>
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
                        <td style="background-color:  #FFA2A2; color: black;">YTD</td>
                        <td class="isi"><?php $hasilJan = ytd($rev, 0, 'jan'); cetak($hasilJan);?></td>
                        <td class="isi"><?php $hasilFeb = ytd($rev, $hasilJan, 'feb'); cetak($hasilFeb);    ?></td>
                        <td class="isi"><?php $hasilMar = ytd($rev, $hasilFeb, 'mar'); cetak($hasilMar);    ?></td>
                        <td class="isi"><?php $hasilApr = ytd($rev, $hasilMar, 'apr'); cetak($hasilApr);    ?></td>
                        <td class="isi"><?php $hasilMei = ytd($rev, $hasilApr, 'mei'); cetak($hasilMei);    ?></td>
                        <td class="isi"><?php $hasilJun = ytd($rev, $hasilMei, 'jun'); cetak($hasilJun);    ?></td>
                        <td class="isi"><?php $hasilJul = ytd($rev, $hasilJun, 'jul'); cetak($hasilJul);    ?></td>
                        <td class="isi"><?php $hasilAgus = ytd($rev, $hasilJul, 'agus'); cetak($hasilAgus); ?></td>
                        <td class="isi"><?php $hasilSept = ytd($rev, $hasilAgus, 'sept'); cetak($hasilSept);?></td>
                        <td class="isi"><?php $hasilOkt = ytd($rev, $hasilSept, 'okt'); cetak($hasilOkt);   ?></td>
                        <td class="isi"><?php $hasilNov = ytd($rev, $hasilOkt, 'nov'); cetak($hasilNov);    ?></td>
                        <td class="isi"><?php $hasilDes = ytd($rev, $hasilNov, 'des'); cetak($hasilDes);    ?></td>

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
                        <td style="background-color:  #FFA2A2; color: black;">%YTD</td>
                        <td class="isi"><?php persenYTD($rev, $hasilJan, $tempSum) ;?></td>
                        <td class="isi"><?php persenYTD($rev, $hasilFeb, $tempSum); ?></td>
                        <td class="isi"><?php persenYTD($rev, $hasilMar, $tempSum); ?></td>
                        <td class="isi"><?php persenYTD($rev, $hasilApr, $tempSum); ?></td>
                        <td class="isi"><?php persenYTD($rev, $hasilMei, $tempSum); ?></td>
                        <td class="isi"><?php persenYTD($rev, $hasilJun, $tempSum); ?></td>
                        <td class="isi"><?php persenYTD($rev, $hasilJul, $tempSum); ?></td>
                        <td class="isi"><?php persenYTD($rev, $hasilAgus, $tempSum);?></td>
                        <td class="isi"><?php persenYTD($rev, $hasilSept, $tempSum);?></td>
                        <td class="isi"><?php persenYTD($rev, $hasilOkt, $tempSum) ;?></td>
                        <td class="isi"><?php persenYTD($rev, $hasilNov, $tempSum); ?></td>
                        <td class="isi"><?php persenYTD($rev, $hasilDes, $tempSum); ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
    </body>
</html>