<?= $this->extend('template/layouts'); ?>

<?= $this->section('container'); ?>
<div class="row">
    <div class="col-lg-5">
        <div class="card" id="card-Tambahpo" >
            <main class="form-karyawan ">
                <h1 class="h3 mb-3 fw-normal ">Add PO</h1>

                <?php $validation = session()->getFlashdata('validation'); ?>

                <form action="/POController/dataPO" method="POST" >
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="noPO" class="form-control <?= $validation && $validation->hasError('noPO')?'is-invalid':'' ?>  " id="noPO" value="<?= old('noPO'); ?>" >
                                <label for="floatingInput">PO Number</label>
                                <?php if ($validation && $validation->hasError('noPO')) : ?>
                                <div class="invalid-feedback">
                                    <?php echo('Nomor PO sudah digunakan');?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="noSP" class="form-control <?= $validation && $validation->hasError('noSP')?'is-invalid':'' ?> " id="noSP" value="<?= old('noSP'); ?>" >
                                <label for="floatingInput">SP Number</label>
                                <?php if ($validation && $validation->hasError('noSP')) : ?>
                                <div class="invalid-feedback">
                                <?= 'Nomor SP harus diisi'; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col">
                            <select class="form-select <?= $validation && $validation->hasError('segmen')?'is-invalid':'' ?>" name="segmen" id="segmen" value="<?= old('segmen'); ?>">
                            <option value="">Choose Segmen</option>
                                <option value="AP WIFI">AP WIFI</option>
                                <option value="NODE B">NODE B</option>
                                <option value="PT2S">PT2S</option>
                                <option value="HEM">HEM</option>
                                <option value="OLO">OLO</option>
                                <option value="QE RECOVERY">QE RECOVERY</option>
                                <option value="QE AKSES">QE AKSES</option>
                                <option value="QE UTILITAS">QE UTILITAS</option>
                                <option value="PSB WIFI">PSB WIFI </option>
                                <option value="PT2NS">PT2NS</option>
                                <option value="STTF">STTF</option>
                                <option value="PT2 SIMPLE">PT2 SIMPLE</option>
                            </select>
                            <div class="invalid-feedback">
                                <?php if ($validation && $validation->hasError('segmen')) : ?>
                                <?= 'Mohon pilih segmen'; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="date" name="tglTOC" class="form-control <?= $validation && $validation->hasError('tglTOC')?'is-invalid':'' ?> " id="tglTOC" value="<?= old('tglTOC'); ?>" >
                                <label for="floatingInput">Date of TOC</label>
                                <?php if ($validation && $validation->hasError('noPO')) : ?>
                                <div class="invalid-feedback">
                                <?= 'Tanggal TOC harus diisi'; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="date" name="tglPO" class="form-control <?= $validation && $validation->hasError('tglPO')?'is-invalid':'' ?> " id="tglPO" value="<?= old('tglPO'); ?>" >
                                <label for="floatingInput">Date of PO</label>
                                <?php if ($validation && $validation->hasError('tglPO')) : ?>
                                <div class="invalid-feedback">
                                <?= 'Tanggal PO harus diisi'; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="namaPkj" class="form-control <?= $validation && $validation->hasError('namaPkj')?'is-invalid':'' ?> " id="namaPkj" value="<?= old('namaPkj'); ?>" >
                                <label for="floatingInput">Job Name</label>
                                <?php if ($validation && $validation->hasError('namaPkj')) : ?>
                                <div class="invalid-feedback">
                                <?= 'Nama pekerjaan harus diisi'; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="statusPkj" class="form-control  <?= $validation && $validation->hasError('statusPkj')?'is-invalid':'' ?>" id="statusPkj" value="<?= old('statusPkj'); ?>" >
                                <label for="floatingInput">Job Status</label>
                                <?php if ($validation && $validation->hasError('statusPkj')) : ?>
                                <div class="invalid-feedback">
                                <?= 'Status pekerjaan harus diisi'; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="ppn" class="form-control <?= $validation && $validation->hasError('ppn')?'is-invalid':'' ?>  " id="ppn" value="<?= old('ppn'); ?>">
                                <label for="floatingInput">Value Before VAT</label>
                                <?php if ($validation && $validation->hasError('ppn')) : ?>
                                <div class="invalid-feedback">
                                <?= 'Masukkan Nilai sebelum PPN'; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col">
                            <select class="form-select <?= $validation && $validation->hasError('status')?'is-invalid':'' ?>" name="status" id="status" value="<?= old('status'); ?>">
                            <option value="">Choose status</option>
                                <option value="OPEN">OPEN</option>
                                <option value="BAST">BAST</option>
                            </select>
                            <div class="invalid-feedback">
                                <?php if ($validation && $validation->hasError('status')) : ?>
                                <?= 'Mohon pilih status'; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="date" name="tgtBAST" class="form-control <?= $validation && $validation->hasError('tgtBAST')?'is-invalid':'' ?> " id="tgtBAST" value="<?= old('tgtBAST'); ?>">
                                <label for="floatingInput">Target BAST</label>
                                <?php if ($validation && $validation->hasError('tgtBAST')) : ?>
                                <div class="invalid-feedback">
                                <?= 'Tanggal Target BAST harus diisi'; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="date" name="tglSP" class="form-control <?= $validation && $validation->hasError('tglSP')?'is-invalid':'' ?>  " id="tglSP" value="<?= old('tglSP'); ?>" >
                                <label for="floatingInput">Date of SP</label>
                                <?php if ($validation && $validation->hasError('tglSP')) : ?>
                                <div class="invalid-feedback">
                                <?= 'Tanggal SP harus diisi'; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="rata justify-content-center mt-3">
                        <button class="btn" id="btnSave" type="submit" onclick="return notifAdd()">Save</button>
                        <button class="btn" id="btnCancel" onclick="history.back()" type="reset" id="btnCancel">Cancel</button>
                    </div>
                </form>
            </main>
        </div>
    </div>
</div>
<script type="text/javascript">

function notifAdd() {
        let conf = confirm('Warning!\nDo you want to add data ')

        if (conf === true) {
            return true;
        } else {
            return false;
        }
    }
        
</script>

<?= $this->endSection(); ?>