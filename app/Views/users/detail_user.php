<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
Detail User
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= $this->endSection('subjudul')?>

<?= $this->section('isi')?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-12 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <?php if($user->picture == 'default.svg'): ?>
                                    <div class="m-b-25"> <img src="<?= base_url()."/dist/img/user2-160x160.jpg"; ?>"
                                            class="img-radius" style="width: 160px;" alt="User-Profile-Image"> </div>
                                    <?php else: ?>
                                    <div class="m-b-25"> <img
                                            src="<?= base_url()."/img/users_image/".$user->picture; ?>"
                                            class="img-radius" style="width: 160px;" alt="User-Profile-Image"> </div>
                                    <?php endif; ?>
                                    <h6 class="f-w-600"><?= (empty($user->username)) ? '-' : $user->username; ?></h6>
                                    <p><?= (empty($user->role)) ? '-' : $user->role; ?></p> <i
                                        class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Full Name</p>
                                            <h6 class="text-muted f-w-400">
                                                <?= (empty($user->fullname)) ? '-' : $user->fullname; ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">E-mail</p>
                                            <h6 class="text-muted f-w-400">
                                                <?= (empty($user->email)) ? '-' : $user->email; ?></h6>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Action</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-warning">
                                                <span class="text">Edit User</span>
                                            </a>
                                        </div>
                                        <?php if(in_groups('admin')): ?>
                                        <div class="col-sm-6">
                                            <a href="<?= site_url('usermag'); ?>" class="btn btn-primary">
                                                <span class="text">List Users</span>
                                            </a>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection('isi')?>

<?= $this->section('csspage')?>
<style>
body {
    background-color: #f9f9fa
}

.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    border: none;
    margin-bottom: 30px
}

.m-r-0 {
    margin-right: 0px
}

.m-l-0 {
    margin-left: 0px
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px
}

.bg-c-lite-green {
    background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #ee5a6f, #f29263)
}

.user-profile {
    padding: 20px 0
}

.card-block {
    padding: 1.25rem
}

.m-b-25 {
    margin-bottom: 25px
}

.img-radius {
    border-radius: 5px
}

h6 {
    font-size: 14px
}

.card .card-block p {
    line-height: 25px
}

@media only screen and (min-width: 1400px) {
    p {
        font-size: 14px
    }
}

.card-block {
    padding: 1.25rem
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.m-b-20 {
    margin-bottom: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.card .card-block p {
    line-height: 25px
}

.m-b-10 {
    margin-bottom: 10px
}

.text-muted {
    color: #919aa3 !important
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.f-w-600 {
    font-weight: 600
}

.m-b-20 {
    margin-bottom: 20px
}

.m-t-40 {
    margin-top: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.m-b-10 {
    margin-bottom: 10px
}

.m-t-40 {
    margin-top: 20px
}

.user-card-full .social-link li {
    display: inline-block
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out
}
</style>
<?= $this->endSection('csspage')?>