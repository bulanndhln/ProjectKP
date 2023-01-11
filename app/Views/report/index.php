<?= $this->extend('template/layouts'); ?>
<?= $this->section('container'); ?>
    
    <a href="/tambahDataPO"><button type="button" class="btn mb-3" id="btnAdd">Add PO</button></a>
        
            <div class="card" id="card-po">
                <div class="overflow-scroll">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th style="background-color:  #A90000; color: white;" scope="col">No</th>
                                    <th style="background-color:  #A90000; color: white; " scope="col">PO Number </th>
                                    <th style="background-color:  #A90000; color: white; " scope="col">Date of PO</th>
                                    <th style="background-color:  #A90000; color: white; " scope="col">Date of TOC</th>
                                    <th style="background-color:  #A90000; color: white; " scope="col">Segmen</th>
                                    <th style="background-color:  #A90000; color: white; " scope="col">Job Name</th>
                                    <th style="background-color:  #A90000; color: white; " scope="col">Job Status</th>
                                    <th style="background-color:  #A90000; color: white; " scope="col">Value before VAT</th>
                                    <th style="background-color:  #A90000; color: white; " scope="col">SP Number</th>
                                    <th style="background-color:  #A90000; color: white; " scope="col">Date of SP</th>
                                    <th style="background-color:  #A90000; color: white; " scope="col">Target BAST</th>
                                    <th style="background-color:  #A90000; color: white; " scope="col">Status</th>
                                    <th style="background-color:  #A90000; color: white;" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                <?php foreach($po as $p){?>
                                <tr>
                                    <td style="background-color:  #FFA2A2; color: black; font-weight:bold;"><?= $i++; ?></td>
                                    <td ><?php echo $p['noPO'] ?></td>
                                    <td ><?php echo $p['tglPO'] ?></td>
                                    <td ><?php echo $p['tglTOC'] ?></td>
                                    <td > <?php echo $p['segmen'] ?></td>
                                    <td ><?php echo $p['namaPkj'] ?></td>
                                    <td ><?php echo $p['statusPkj'] ?></td>
                                    <td ><?php echo "Rp" . number_format($p['ppn'],2,',','.') ?></td>
                                    <td ><?php echo $p['noSP'] ?></td>
                                    <td ><?php echo $p['tglSP'] ?></td>
                                    <td ><?php echo $p['tgtBAST'] ?></td>
                                    <td ><?php echo $p['status'] ?></td>
                                    <td >
                                        <form action="/POController/editData/<?= $p['id']; ?>" method="post" class="d-inline">
                                            <input type="hidden" name="editMethode" value="EDIT">
                                            <button type="submit" class="btn m-1 btn-outline-secondary" onclick="return konfirmsi()" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><i class="bi bi-pen"></i></button>
                                        </form>
                                        <form action="/POController/deleteData/<?= $p['id']; ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                            <input type="hidden" name="_methode" value="DELETE">
                                            <button type="submit" class="btn m-1 btn-outline-danger" onclick="return konfirmasi()" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><i class="bi bi-trash3-fill"></i></button>
                                            
                                        </form>
                                    </td>

                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
        <div class="rata">
            <a href="/POController/excel2"><button type="button" class="btn mt-3" id="btnExport"><i class="bi bi-box-arrow-down"></i> Export</button></a>
            <a href="/POController/deleteAll"><button type="button" class="btn mt-3 " id="btndelete" onclick="return konfirmasi2()"><i class="bi bi-trash3-fill"></i> Delete All</button></a>
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