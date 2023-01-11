<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome| Login Commerce</title>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">   
            <!-- Custom styles for this template -->
            <link href="<?= base_url('css/style.css') ?>" rel=" stylesheet" id="satu">
            
    </head>
    <body >
        <div class="container-fluid " >
        <div class="logo-tengah" >
          <img class="img-responsive mt-5" style="width: 300px; height:100px; margin-left:auto;margin-right:auto; display:block;" src="/img/logo.png" alt="Logo Telkom Akses">
        </div>
        <div class="card m-auto p-3 mt-5" style="width: 30rem;box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;" >
            <main class="form-signin w-100 m-auto">

            <?php if(session()->has('error')): ?>
              <p class="text-danger text-center"><?= session()->getFlashdata('error'); ?></p>
            <?php endif; ?>
              <?php $validation = session()->getFlashdata('validation'); ?>
              
                <form action="/Auth/login" method="POST">

                <h1 class="h3 mb-3 fw-normal mb-2" style="text-align: center;">Please sign in</h1>

                <div class="form mb-2 ">
                    <label for="floatingInput">Email address</label>
                    <input type="email" name="email" id="email" class="form-control <?= $validation && $validation->hasError('email')?'is-invalid':'' ?>" value="<?= old('email')?>" placeholder="" >
                    <?php if ($validation && $validation->hasError('email')) : ?>
                      <div class="invalid-feedback">
                        <?= $validation->getError('email'); ?>
                      </div>
                    <?php endif; ?>
                </div>
                
                <div class="form mb-2 mt-3">
                    <label for="floatingPassword">Password</label>
                    <input type="password" name="password" id="password" class="form-control <?= $validation && $validation->hasError('password')?'is-invalid':'' ?>"  placeholder="">
                    <?php if ($validation && $validation->hasError('password')) : ?>
                      <div class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                      </div>
                    <?php endif; ?>
                </div>

                <button class="btn" type="submit" name="login" id="login">Sign in</button>
                </form>
            </main>
        </div>
        </div>
        
   


        
        </body>
    </html>