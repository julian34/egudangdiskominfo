<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
Profile User
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
                                            <a class="btn btn-warning" onclick='eddata()'>
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
<?= $this->include('users/formedit'); ?>
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

<?= $this->Section('jspage')?>
<script>
function eddata() {
    $('#form')[0].reset();
    var arr = ['username', 'email', 'password', 'repeatpassword', 'role', 'picture'];
    var pic = document.getElementById('blah');
    pic.src = "<?= base_url(); ?>/icon/Upload-PNG-Images.png"

    $('#modal-form').modal('show');
    $('.modal-title').text('Edit User');
    $('#label-password').text('Password');
    $('#label-repeatpassword').text('Repeat Password');
    for (let i = 0; i < arr.length; i++) {
        var elemen = arr[i];
        console.log(elemen)
        elemen = document.getElementById(elemen);
        elemen.classList.remove("is-invalid");
        $('#invalid-feedback-' + arr[i]).text('');
    }

    $.ajax({
        type: "post",
        url: "<?= base_url('usermag/getdataprofile'); ?>",
        data: {
            user: '<?= sha1(user()->id) ?>'
        },
        dataType: "json",
        success: function(data) {
            if (data.success == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Data Gagal Dimuat',
                    footer: '<a>Silahkan Cek Kembali</a>'
                });
            } else {
                document.getElementById("fullname").value = data.user['user']['fullname'];
                document.getElementById("username").value = data.user['user']['username'];
                document.getElementById("email").value = data.user['user']['email'];
                const text = data.user['user']['role'];
                const $select = document.querySelector('#role');
                const $options = Array.from($select.options);
                const optionToSelect = $options.find(item => item.text === text);
                optionToSelect.selected = true;
                // if(data.user['user']['user_image'] !== "default.svg"){
                //     document.getElementById("user_image").value = data.user['user']['user_image'];
                // }  
                document.getElementById("btnSave").onclick = function() {
                    save(data.user['user']['userid']);
                };

            }
        }
    });
}


function readURL(input, id) {
    id = id || '#blah';
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(id)
                .attr('src', e.target.result)
                .width(200)
                .height(150);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function save(e) {
    // $('#send_form').prop('disabled');
    var url;
    var element;

    url = "<?php echo site_url('usermag/updateprofile')?>/" + e;

    event.preventDefault();
    var form_data = new FormData($('#form')[0]);
    // ajax adding data to database
    $.ajax({
        url: url,
        type: "POST",
        data: form_data,
        dataType: "JSON",
        processData: false,
        contentType: false,
        success: function(data) {
            if (data.success == 0) {
                $('.txt_csrfname').val(data.token);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Inputan Tidak Valid',
                    footer: '<a>Silahkan Cek Kembali</a>'
                });
                var arr = ['username', 'email', 'password', 'repeatpassword', 'role', 'picture'];
                for (let i = 0; i < arr.length; i++) {
                    var elemen = arr[i];
                    console.log(elemen)
                    elemen = document.getElementById(elemen);
                    elemen.classList.remove("is-invalid");
                    $('#invalid-feedback-' + arr[i]).text('');
                }

                for (var key in data.msg) {
                    var elemen = key;
                    // console.log(key);
                    elemen = document.getElementById(key);
                    elemen.classList.add("is-invalid");
                    for (var key1 in data.msg[key]) {
                        $('#invalid-feedback-' + key).text(data.msg[key]);
                        // console.log('#invalid-feedback-'+key+'|'+data.msg[key])
                    }
                }
            } else {
                $('#form')[0].reset();
                $('.txt_csrfname').val(data.token);
                //if success close modal and reload ajax table
                $('#modal-form').modal('hide');
                window.location.reload();
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $('#modal-form').modal('hide');
            alert('Error adding / update data');
        }
    });
}
</script>

<?= $this->endSection('jspage')?>