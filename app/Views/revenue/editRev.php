<?= $this->extend('template/layouts'); ?>

<?= $this->section('container'); ?>
<div class="row" >
    <div class="col-lg-5">
        <div class="card" id="card-editrev" >
            
            <main class="form-karyawan; ">

                <?php $validation = session()->getFlashdata('validation'); ?>

                <form action="/RevController/saveEdit" method="POST" >
                    <h1 class="h3 fw-normal ">Edit Revenue <?= $rev['type']; ?>
                    </h1>
                    <?= csrf_field(); ?>
                    <input type="hidden" name="type1" value="<?= $rev['type']; ?>">
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="jan" class="form-control" id="jan" value="<?= $rev['jan']; ?>" >
                                <label for="floatingInput">January</label>
                                <p class="text-danger"><?= $validasi->getError('jan'); ?></p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="feb" class="form-control" id="feb" value="<?= $rev['feb']; ?>" >
                                <label for="floatingInput">February</label>
                                <p class="text-danger"><?= $validasi->getError('feb'); ?></p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="mar" class="form-control" id="mar" value="<?= $rev['mar']; ?>" >
                                <label for="floatingInput">March</label>
                                <p class="text-danger"><?= $validasi->getError('mar'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="apr" class="form-control" id="apr" value="<?= $rev['apr']; ?>">
                                <label for="floatingInput">April</label>
                                <p class="text-danger"><?= $validasi->getError('apr'); ?></p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="mei" class="form-control" id="mei" value="<?= $rev['mei']; ?>" >
                                <label for="floatingInput">Mei</label>
                                <p class="text-danger"><?= $validasi->getError('mei'); ?></p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="jun" class="form-control" id="jun" value="<?= $rev['jun']; ?>" >
                                <label for="floatingInput">June</label>
                                <p class="text-danger"><?= $validasi->getError('jun'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="jul" class="form-control" id="jul" value="<?= $rev['jul']; ?>" >
                                <label for="floatingInput">July</label>
                                <p class="text-danger"><?= $validasi->getError('jul'); ?></p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="agus" class="form-control" id="agus" value="<?= $rev['agus']; ?>">
                                <label for="floatingInput">August</label>
                                <p class="text-danger"><?= $validasi->getError('agus'); ?></p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="sept" class="form-control" id="sept" value="<?= $rev['sept']; ?>" >
                                <label for="floatingInput">September</label>
                                <p class="text-danger"><?= $validasi->getError('sept'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="okt" class="form-control" id="okt" value="<?= $rev['okt']; ?>" >
                                <label for="floatingInput">October</label>
                                <p class="text-danger"><?= $validasi->getError('okt'); ?></p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="nov" class="form-control " id="nov" value="<?= $rev['nov']; ?>" >
                                <label for="floatingInput">November</label>
                                <p class="text-danger"><?= $validasi->getError('nov'); ?></p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="des" class="form-control  " id="des" value="<?= $rev['des']; ?>">
                                <label for="floatingInput">December</label>
                                <p class="text-danger"><?= $validasi->getError('des'); ?></p>
                            </div>
                        </div>
                        
                    <div class="rata m-auto justify-content-center" >
                        <button class="btn" type="submit" id="btnSave" onclick="return editt()">Save</button>
                        <button class="btn" onclick="history.back()" type="reset" id="btnCancel">Cancel</button>
                    </div>
                    <input type="hidden" name="id" value="<?= $rev['id']; ?>">
                </form>
            </main>
        </div>
    </div>
</div>
<script type="text/javascript">
        function editt() {
            let conf = confirm('Warning!\nDo you want to change this data?')

            if (conf === true) {
                return true;
            } else {
                return false;
            }
        }
</script>


<?= $this->endSection(); ?>