<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
User Manajemen
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-plus-circle"></i> Tambah User',[
'class'=>'btn btn-primary',
'onclick' => 'tamdata()'
]) ?>
<?= $this->endSection('subjudul')?>
<?= $this->section('isi')?>
<?= session()->getFlashdata('sukses'); ?>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="col-lg grid-margin">
            <table class="table table-striped table-bordered" style="width: 100%;" id="tablelistdata">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th style="width:15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->include('users/forminput'); ?>
<div class="viewModal" style="display: none;"></div>

<?= $this->endSection('isi')?>

<?= $this->Section('jspage')?>
<script src="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script>
function tamdata() {
    save_method = 'add';
    var arr = ['username', 'email', 'password', 'repeatpassword', 'role', 'picture'];
    $('#form')[0].reset(); // reset form on modals
    $('#modal-form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah User'); // Set Title to Bootstrap modal title
    $('#label-password').text('Password *');
    $('#label-repeatpassword').text('Repeat Password *');

    var pic = document.getElementById('blah');
    pic.src = "<?= base_url(); ?>/icon/Upload-PNG-Images.png"

    for (let i = 0; i < arr.length; i++) {
        var elemen = arr[i];
        console.log(elemen)
        elemen = document.getElementById(elemen);
        elemen.classList.remove("is-invalid");
        $('#invalid-feedback-' + arr[i]).text('');
    }

}

function eddata(e) {
    save_method = 'edit';
    var arr = ['username', 'email', 'password', 'repeatpassword', 'role', 'picture'];
    var getdata = '<?= base_url('usermag/getdata'); ?>/' + e;
    var pic = document.getElementById('blah');
    pic.src = "<?= base_url(); ?>/icon/Upload-PNG-Images.png"
    $('#form')[0].reset();
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
        url: getdata,
        success: function(data) {
            if (data.success == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Data Gagal Dimuat',
                    footer: '<a>Silahkan Cek Kembali</a>'
                });
                console.log(data.user);
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
                    save(e);
                };

            }
        }
    });
}

function hapus_data(e) {
    $link = '<?= site_url('usermag/delete')?>/' + e;
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data ini akan dihapus dan tidak bisa digunakan kembali",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        preConfirm: (login) => {
            return fetch($link)
                .then(response => {
                    if (!response.sukses == false) {
                        throw new Error(response.statusText)
                    }
                    return response.json()
                })
                .catch(error => {
                    Swal.showValidationMessage(
                        `Request failed: ${error}`
                    )
                })
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'User Sukses Dihapus',
                showConfirmButton: false,
                timer: 1500
            });
            $('#tablelistdata').DataTable().ajax.reload();
        }
    })
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
    if (save_method == 'add') {
        url = "<?php echo site_url('usermag/store')?>";
    } else {
        url = "<?php echo site_url('usermag/update')?>/" + e;
    }

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
                $('#tablelistdata').DataTable().ajax.reload();
                $('#form')[0].reset();
                $('.txt_csrfname').val(data.token);
                //if success close modal and reload ajax table
                $('#modal-form').modal('hide');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $('#modal-form').modal('hide');
            alert('Error adding / update data');
        }
    });
}

$(document).ready(function() {
    var save_method;
    //start doc
    var table = $('#tablelistdata').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: "<?= site_url('usermag/listdata')?>",
        columns: [{
                data: ''
            },
            {
                data: 'fullname'
            },
            {
                data: 'username'
            },
            {
                data: 'email'
            },
            {
                data: 'role'
            },
            {
                data: 'aksi'
            }
        ],
    });
    //end doc
});
</script>
<?= $this->endSection('jspage')?>