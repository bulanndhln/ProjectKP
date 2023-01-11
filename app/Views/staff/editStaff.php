<?= $this->extend('template/layouts'); ?>

<?= $this->section('container'); ?>
<div class="container-fluid">
<div class="row ">
    <div class="col ">
        <div class="card  " id="card-editstaff" >
            <main class="form-karyawan ">
                <h1 class="h3 mb-3 fw-normal ">Edit Data Staff</h1>
                <form action="/Auth/saveEdit" method="POST" >
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="nama" class="form-control" id="nama" value="<?= $staff['nama']; ?>" required>
                                <label for="floatingInput">Name</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="date" name="tglLahir" class="form-control " id="tglLahir" value="<?= $staff['tglLahir']; ?>" required>
                                <label for="floatingInput">Date of Birth</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col gender">
                            <label for="">Gender</label>
                            <div class="rata">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="gender" id="Perempuan" value="Female" >
                                <label class="form-check-label" for="exampleRadios1">Female</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="Laki-laki" value="Male">
                                <label class="form-check-label" for="exampleRadios2">Male</label>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="tel" name="noHP" class="form-control " id="noHP" placeholder="" value="<?= $staff['noHP']; ?>" required>
                                <label for="floatingInput">Phone Number</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control  " id="email" value="<?= $staff['email']; ?>" required>
                                <label for="floatingInput">Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="number" name="nik" class="form-control  " id="nik" placeholder="" value="<?= $staff['nik']; ?>" required>
                                <label for="floatingInput">NIK</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control  " id="password" value="<?= $staff['password']; ?>" required>
                                <label for="floatingInput">Password</label>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?= $staff['id']; ?>">
                    <input type="hidden" name="gender1" value="<?= $staff['gender']; ?>">
                    <div class="rata justify-content-center mt-3">
                        <button class="btn" id="btnSave" type="submit" onclick="return editt()">Save</button>
                        <button class="btn" onclick="history.back()" type="reset" id="btnCancel">Cancel</button>
                    </div>
                    <input type="hidden" name="id" value="<?= $staff['id']; ?>">
                </form>
            </main>
        </div>
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