<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>::. Login SIDIA .::</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="<?=base_url() ?>/template/assets/style.css" />
</head>

<body>

    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">


                <div class="col-12 ellipse">
                    <img src="<?=base_url() ?>/template/assets/ellipse.png" class="ellipse-img">
                </div>

                <div class="col-12 logo-img">
                    <img src="<?=base_url() ?>/template/assets/logo-pemprov.png">
                </div>

                <div class="col-12 title-app">
                    <h1>SIDIA LOGIN</h1>
                </div>

                <div class="col-12 auth-massage-block">
                    <?= view('App\Auth\_message_block') ?>
                </div>

                <form class="col-12" action="<?= base_url('login') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <img src="<?=base_url() ?>/template/assets/ellipse.png" class="ellipse-input">
                        <input type="text"
                            class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                            placeholder="Enter <?=lang('Auth.email')?>" name="login">
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <img src="<?=base_url() ?>/template/assets/ellipse.png" class="ellipse-input">
                        <input type="password"
                            class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                            placeholder="Enter <?=lang('Auth.password')?>" name="password">
                        <div class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </div>
                    </div>
                    <button class="btn"><i class="fas fa-sign-in-alt"></i> <?=lang('Auth.loginAction')?></button>
                </form>
            </div>
            <!-- End of Modal Content -->
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
</body>

</html>