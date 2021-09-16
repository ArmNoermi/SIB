 <!-- Content Header (Page header) -->
 <section class="content-header">
     <h1>
     <?= $judul ?>
         <small>Panel</small>
     </h1>
     <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-user"></i></a></li>
         <li class="active">Users</li>
     </ol>
 </section>

 <section class="content">
    <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Pengguna</h3>
            <div class="pull-right">
                <a href="<?= site_url('users/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i>
                    Tambah Data
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>level</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                            foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%;"><?= $no++ ?>.</td>
                            <td><?= $data->username ?></td>
                             <td><?= $data->name ?></td>
                             <td><?= $data->address ?></td>
                             <td><?= $data->level == 1 ? "Admin" : "Karyawan" ?></td>
                             <!-- <td><?= $data->foto ?></td> -->
                            <td>
                                <?php if ($data->foto != null) { ?>
                                    <img src="<?= base_url('uploads/profile/' . $data->foto) ?>" style="width:50px">
                                <?php } ?>
                            </td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('users/edit/' . $data->user_id) ?>" class="btn btn-success btn-xs">
                                    <i class="fa fa-pencil"></i>
                                    Update
                                </a>
                                <a href="<?= site_url('users/del/' . $data->user_id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>