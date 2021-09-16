<section class="content-header">
    <h1>
        <?= $judul ?>
        <small>Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Arsip Surat Pengadaan</li>
    </ol>
</section>

<section class="content">
    <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Surat</h3>
            <div class="pull-right">
                <a href="<?= site_url('surat_pengadaan') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>
                    Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?= form_open_multipart('surat_pengadaan/process') ?>
                    <div class="form-group">
                        <label>Tanggal surat *</label>
                        <input type="date" name="tgl_surat" value="<?php echo $row->tgl_surat ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor surat *</label>
                        <input type="hidden" name="id_surat" value="<?= $row->id_surat ?>">
                        <input type="text" name="nmr_surat" value="<?php echo $row->nmr_surat ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Perihal surat *</label>
                        <input type="text" name="nm_surat" value="<?php echo $row->nm_surat ?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Pengirim *</label>
                        <input type="text" name="pengirim" value="<?php echo $row->pengirim ?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="pengupload" value="<?= $this->fungsi->user_login()->user_id ?>" class="form-control" readonly>
                        <label>Kategori *</label>
                        <select name="kategori" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php foreach ($kategori->result() as $key => $data) { ?>
                                <option value="<?= $data->id_kategori ?>" <?= $data->id_kategori == $row->id_kategori ? "selected" : null ?>><?= $data->nama_kategori ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lemari *</label>
                        <?= form_dropdown('lemari', $lemari, $selectedlemari, ['class' => 'form-control', 'required' => 'required']) ?>
                    </div>

                    <div class="form-group">
                        <label>Nomor Bantex *</label>
                        <?= form_dropdown('bantex', $bantex, $selectedbantex, ['class' => 'form-control', 'required' => 'required']) ?>
                    </div>

                    <div class="form-group">
                        <label>Status Surat *</label>
                        <?= form_dropdown('stts_surat', $stts_surat, $selectedstatus, ['class' => 'form-control', 'required' => 'required']) ?>
                    </div>
                    
                    <div class="form-group">
                        <label>File surat *</label><br>
                        <?php if ($page == 'edit') {
                            if ($row->file != null) {
                                echo '[' . $row->file . ']';
                            }
                        } ?>
                        <input type="file" name="file_surat" class="form-control" <?= $page == 'add' ? 'required' : '' ?>>
                        <small><?= $page == 'edit' ? '(Biarkan kosong jika tidak diganti)' : null ?></small>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="<?php echo $page ?>" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i>
                            Simpan
                        </button>
                        <button type="reset" class="btn btn-flat">Reset</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>