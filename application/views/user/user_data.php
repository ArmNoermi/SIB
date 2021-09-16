 <!-- Content Header (Page header) -->
 <section class="content-header">
     <h1>
     <?= $judul ?>
         <small>Pengguna</small>
     </h1>
     <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-user"></i></a></li>
         <li class="active">User</li>
     </ol>
 </section>

 <!-- Main content -->
 <section class="content">

     <div class="box">
         <div class="box-header">
             <h3 class="box-title">Data Pengguna</h3>
             <div class="pull-right">
                 <a href="<?= site_url('user/add'); ?>" class="btn btn-primary btn-flat">
                     <i class="fa fa-user-plus"></i>
                     Tambah
                 </a>
             </div>
         </div>

         <div class="box-body table-responsive">

             <table class="table table-bordered table-striped" id="table1">
                 <thead>
                     <tr>
                         <th class="text-center" width="50">No.</th>
                         <th class="text-center" width="150px">Username</th>
                         <th class="text-center" width="250px">Nama</th>
                         <th class="text-center">Alamat</th>
                         <th class="text-center" width="150px">Level</th>
                         <th class="text-center" width="160px">Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                         <tr>
                             <td><?php echo $no++ ?>.</td>
                             <td><?= $data->username ?></td>
                             <td><?= $data->name ?></td>
                             <td><?= $data->address ?></td>
                             <td><?= $data->level == 1 ? "Admin" : "Karyawan" ?></td>
                             <td>
                                 <form action="<?= site_url('user/del') ?>" method="post">
                                     <a href="<?= site_url('user/edit/' . $data->user_id) ?>" class="btn btn-primary btn-xs">
                                         <i class="fa fa-pencil"></i>
                                         Update
                                     </a>
                                     <input type="hidden" name="user_id" value="<?= $data->user_id ?>">
                                     <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs">
                                         <i class="fa fa-trash"></i>
                                         Hapus
                                     </button>
                                 </form>
                             </td>
                         </tr>
                     <?php } ?>
                 </tbody>
             </table>
         </div>
     </div>



 </section>