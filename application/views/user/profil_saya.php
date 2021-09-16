<section class="content-header">
    <h1>
        <?= $judul ?>
        <small>Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active">My Profile</li>
    </ol>
</section>

<br><br>

<div class="col-md-4 col-md-offset-4">
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive" src="<?= base_url('uploads/profile/') . $this->fungsi->user_login()->foto; ?>" alt="User profile picture">

            <h3 class="profile-username text-center"><?= $this->fungsi->user_login()->name; ?></h3>

            <p class="text-muted text-center"><?= $this->fungsi->user_login()->email; ?></p>

            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Jabatan</b> <a class="pull-right"><?= $this->fungsi->user_login()->jabatan; ?></a>
                </li>
                <li class="list-group-item">
                    <b>Alamat</b> <a class="pull-right"><?= $this->fungsi->user_login()->address; ?></a>
                </li>
                <li class="list-group-item">
                    <b>Level User</b> <a class="pull-right"><?= $this->fungsi->user_login()->level == 1 ? "Admin" : "Karyawan"; ?></a>
                </li>
            </ul>

            <a href="<?= site_url('dashboard'); ?>" class="btn btn-warning btn-block"><b>Dashboard</b></a>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Profile Detail</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th>Nama</th>
                            <td><span id="name"></span></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td><span id="jeniskelamin"></span></td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td><span id="jabatan"></span></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><span id="email"></span></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><span id="address"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#set_dtl', function() {
            var name = $(this).data('name');
            var jeniskelamin = $(this).data('jeniskelamin');
            var jabatan = $(this).data('jabatan');
            var email = $(this).data('email');
            var address = $(this).data('address');

            $('#name').text(name);
            $('#jeniskelamin').text(jeniskelamin);
            $('#jabatan').text(jabatan);
            $('#email').text(email);
            $('#address').text(address);
            $('#detail').text(detail);
        })
    })
</script> -->