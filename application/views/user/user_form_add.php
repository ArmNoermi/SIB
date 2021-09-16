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
             <h3 class="box-title">Tambahkan Pengguna</h3>
             <div class="pull-right">
                 <a href="<?= site_url('user'); ?>" class="btn btn-warning btn-flat">
                     <i class="fa fa-undo"></i>
                     Kembali
                 </a>
             </div>
         </div>

         <div class="box-body">

             <div class="row">
                 <div class="col-md-4 col-md-offset-4">
                     <form action="" method="post">
                         <div class="form-group <?= form_error('fullname') ? 'has-error' : null ?>">
                             <label>Nama *</label>
                             <input type="text" name="fullname" value="<?= set_value('fullname') ?>" class="form-control">
                             <?php echo form_error('fullname') ?>
                         </div>
                         <div class="form-group  <?= form_error('username') ? 'has-error' : null ?>">
                             <label>Username *</label>
                             <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control">
                             <?php echo form_error('username') ?>
                         </div>
                         <div class="form-group  <?= form_error('password') ? 'has-error' : null ?>">
                             <label>Password *</label>
                             <input type="password" name="password" class="form-control">
                             <?php echo form_error('password') ?>
                         </div>
                         <div class="form-group  <?= form_error('passconf') ? 'has-error' : null ?>">
                             <label>Password Confirmation *</label>
                             <input type="password" name="passconf" class="form-control">
                             <?php echo form_error('passconf') ?>
                         </div>
                         <div class="form-group  <?= form_error('jk') ? 'has-error' : null ?>">
                             <label>Jenis Kelamin</label>
                             <select name="jk" class="form-control">
                                 <option value=""> -Pilih- </option>
                                 <option value="L">Laki-laki</option>
                                 <option value="P">Perempuan</option>
                             </select>
                             <?php echo form_error('jk') ?>
                         </div>
                         <div class="form-group  <?= form_error('jabatan') ? 'has-error' : null ?>">
                             <label>Jabatan</label>
                             <input type="text" name="jabatan" value="<?= set_value('jabatan') ?>" class="form-control">
                             <?php echo form_error('jabatan') ?>
                         </div>
                         <div class="form-group">
                             <label>Email</label>
                             <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control">
                         </div>
                         <div class="form-group">
                             <label>Alamat</label>
                             <textarea name="address" class="form-control"><?= set_value('address') ?></textarea>
                         </div>
                         <div class="form-group  <?= form_error('level') ? 'has-error' : null ?>">
                             <label>Level</label>
                             <select name="level" class="form-control">
                                 <option value=""> -Pilih- </option>
                                 <option value="1">Admin</option>
                                 <option value="2">Karyawan</option>
                             </select>
                             <?php echo form_error('level') ?>
                         </div>
                         <div class="form-group  <?= form_error('status') ? 'has-error' : null ?>">
                             <label>Status</label>
                             <select name="status" class="form-control">
                                 <option value=""> -Pilih- </option>
                                 <option value="1">Aktif</option>
                                 <option value="0">Tidak Aktif</option>
                             </select>
                             <?php echo form_error('status') ?>
                         </div>
                         <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control">
                            <small>(Biarkan kosong jika tidak ada)</small>
                         </div>
                         <div class="form-group">
                             <button type="submit" class="btn btn-success btn-flat">
                                 <i class="fa fa-paper-plane"></i>
                                 Simpan
                             </button>
                             <button type="reset" class="btn btn-flat">Reset</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>

 </section>