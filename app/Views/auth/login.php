<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?= base_url() ?>" class="h1"><b><?=lang('Auth.loginTitle')?></b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <?= view('App\Auth\_message_block') ?>
                <form action="<?= route_to('login') ?>" method="post">
                    <?= csrf_field() ?>
                    <?php if ($config->validFields === ['email']): ?>
                    <div class="input-group mb-3">
                        <input type="email"
                            class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                            placeholder="<?=lang('Auth.email')?>" name="login">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="input-group mb-3">
                        <input type="text"
                            class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                            placeholder="<?=lang('Auth.emailOrUsername')?>" name="login">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="input-group mb-3">
                        <input type="password"
                            class="form-control  <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>"
                            placeholder="<?=lang('Auth.password')?>" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </div>
                    </div>
                    <div class="row">
                        <?php if ($config->allowRemembering): ?>
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" <?php if(old('remember')) : ?> checked
                                    <?php endif ?>>
                                <label for="remember">
                                    <?=lang('Auth.rememberMe')?>
                                </label>
                            </div>
                        </div>
                        <?php endif; ?>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit"
                                class="btn btn-primary btn-block"><?=lang('Auth.loginAction')?></button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <?php if ($config->allowRegistration) : ?>
                <p class="mb-1">
                    <a href="<?= route_to('register') ?>" class="text-center"><?=lang('Auth.needAnAccount')?></a>
                </p>
                <?php endif; ?>
                <?php if ($config->activeResetter): ?>
                <p class="mb-0">
                    <a href="<?= route_to('forgot') ?>" class="text-center"><?=lang('Auth.forgotYourPassword')?></a>
                </p>
                <?php endif; ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
</body>

<!-- jQuery -->
<script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/dist/js/adminlte.min.js"></script>
<?= $this->renderSection('pageScripts') ?>

<?= $this->endSection() ?>