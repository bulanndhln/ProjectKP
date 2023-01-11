<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename= Report Harian Po.xls")
?>
<html>
    <head>
    <style type="text/css">
        table tr th.satu .dua .tiga .empat .lima .enam .tujuh .delapan .sembilan .sepuluh .sebelas .duabelas{
            text-align: center;
            vertical-align: middle;
            
        }
        tr.nama{
            background-color: lightpink;
        }

        tr.isi{
            text-align: center;
            vertical-align: middle;
        }
    </style>
    </head>
    <body>
        <table border="1" >
            <thead><br>
                <h1 style="text-align: center" >REPORT HARIAN PO COMMERCE</h1> 
                <br>
                <tr class="nama" >
                    <th class="satu"  scope="col">No</th>
                    <th class="dua"  scope="col">Nomor PO </th>
                    <th class="tiga"  scope="col">Tanggal PO</th>
                    <th class="empat"  scope="col">Tanggal TOC</th>
                    <th class="lima"  scope="col">Segmen</th>
                    <th class="enam"  scope="col">Nama Pekerjaan</th>
                    <th class="tujuh"  scope="col">Status Pekerjaan</th>
                    <th class="delapan"  scope="col">Nilai Sebelum PPN</th>
                    <th class="sembilan"  scope="col">Nomor SP</th>
                    <th class="sepuluh" scope="col">Tanggal SP</th>
                    <th class="sebelas" scope="col">Target BAST</th>
                    <th class="duabelas" scope="col">Status</th>

                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                    <?php foreach($po as $p) :?>
                    <tr class="isi">
                        <td ><?= $i; ?></td>
                        <td ><?php echo $p['noPO'] ?></td>
                        <td ><?php echo $p['tglPO'] ?></td>
                        <td ><?php echo $p['tglTOC'] ?></td>
                        <td ><?php echo $p['segmen'] ?></td>
                        <td ><?php echo $p['namaPkj'] ?></td>
                        <td ><?php echo $p['statusPkj'] ?></td>
                        <td ><?php echo"Rp" . number_format($p['ppn'],2,',','.')?></td>
                        <td ><?php echo $p['noSP'] ?></td>
                        <td ><?php echo $p['tglSP'] ?></td>
                        <td ><?php echo $p['tgtBAST'] ?></td>
                        <td ><?php echo $p['status'] ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </body>
</html>