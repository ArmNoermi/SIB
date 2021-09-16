<!-- Main content -->
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
            <h3 class="box-title">Data Users</h3>
            <div class="pull-right">
                <a href="<?= site_url('users') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>
                    Kembali
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php echo form_open_multipart('users/process') ?>                    
                        <div class="form-group">
                            <label>Nama *</label>
                            <input type="hidden" name="user_id" value="<?= $row->user_id ?>">
                            <input type="text" name="fullname" value="<?= $row->name ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Username *</label>
                            <input type="text" name="username" value="<?= $row->username ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password *</label>  <small><?= $page == 'edit' ? '(Biarkan kosong jika tidak diganti)' : '' ?></small>
                            <input type="password" name="password" value="<?= $this->input->post('password') ?>" class="form-control" <?= $page == 'add' ? 'required' : '' ?>>
                        </div>
                        <!-- <div class="form-group">
                            <label>Password Confirmation *</label>
                            <input type="password" name="passconf" value="" class="form-control" required>
                        </div> -->
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jk" class="form-control">
                                <option value=""> -Pilih- </option>
                                <?php $jk = $this->input->post('jk') ? $this->input->post('jk') : $row->jeniskelamin ?>
                                <option value="L" <?= $jk == 'L' ? 'selected' : null ?>>Laki-laki</option>
                                <option value="P" <?= $jk == 'P' ? 'selected' : null ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jabatan *</label>
                            <input type="text" name="jabatan" value="<?= $row->jabatan ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                             <label>Email</label>
                             <input type="email" name="email" value="<?= $row->email ?>" class="form-control">
                        </div>
                        <div class="form-group ">
                             <label>Level</label>
                             <select name="level" class="form-control">
                                 <option value=""> -Pilih- </option>
                                 <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                                 <option value="1" <?= $level == 1 ? 'selected' : null ?>>Admin</option>
                                 <option value="2" <?= $level == 2 ? 'selected' : null ?>>Karyawan</option>
                             </select>
                         </div>
                        <div class="form-group">
                             <label>Status</label>
                             <select name="status" class="form-control">
                                 <!-- <option value=""> -Pilih- </option> -->
                                 <?php $status = $this->input->post('status') ? $this->input->post('status') : $row->status ?>
                                 <option value="1" <?php echo $status == 1 ? 'selected' : null ?>>Aktif</option>
                                 <option value="0" <?php echo $status == 0 ? 'selected' : null ?>>Tidak Aktif</option>
                             </select>
                         </div>

                        <div class="form-group">
                            <label>Foto</label><br>
                                <?php if($page == 'edit'){ if($row->foto != null) { ?>
                                    <div style="margin-bottom:5px">
                                        <img src="<?= base_url('uploads/profile/' . $row->foto) ?>" style="width:40%">
                                    </div>
                                <?php }} ?>
                                
                            <input type="file" name="file_foto" class="form-control" <?= $page == 'add' ? 'required' : '' ?>>
                            <small><?= $page == 'edit' ? '(Biarkan kosong jika tidak diganti)' : null ?></small>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="address" class="form-control"><?= $row->address ?></textarea>
                        </div>
            
                        <div class="form-group">
                            <button type="submit" name="<?php echo $page ?>" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i>
                                Save
                            </button>
                            <button type="reset" class="btn btn-flat">Reset</button>
                        </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>