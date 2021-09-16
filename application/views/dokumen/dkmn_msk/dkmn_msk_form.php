<section class="content-header">
    <h1>
        <?= $judul ?>
        <small>Dokumen Pengadaan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Arsip Dokumen</li>
    </ol>
</section>

<section class="content">
    <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Dokumen</h3>
            <div class="pull-right">
                <a href="<?= site_url('dkmn_msk') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>
                    Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?= form_open_multipart('dkmn_msk/process') ?>
                    <div class="form-group">
                        <label>Tanggal Dokumen *</label>
                        <input type="date" name="tgl_dokumen" value="<?php echo $row->tgl_dokumen ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor Dokumen *</label>
                        <input type="hidden" name="id_dok" value="<?= $row->id_dokumen ?>">
                        <input type="text" name="kode_dok" value="<?php echo $row->kode_dokumen ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Perihal Dokumen *</label>
                        <input type="text" name="nama_dok" value="<?php echo $row->nama_dokumen ?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Asal Dokumen *</label>
                        <input type="text" name="asal_dokumen" value="<?php echo $row->asal_dokumen ?>" class="form-control" required>
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
                        <label>Status Dokumen *</label>
                        <?= form_dropdown('stts_dokumen', $stts_dokumen, $selected_stts_dokumen, ['class' => 'form-control', 'required' => 'required']) ?>
                    </div>

                    <!-- <div>
                        <label>Status Dokumen *</label>
                        <select name="status" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php foreach ($status->result() as $key => $data) { ?>
                                <option value="<?= $data->id_stts ?>" <?= $data->id_stts == $row->id_stts ? "selected" : null ?>><?= $data->stts_dokumen ?></option>
                            <?php } ?>
                        </select>
                    </div> -->
                       
                    <div class="form-group">
                        <label>File Dokumen *</label><br>
                        <?php if ($page == 'edit') {
                            if ($row->file != null) {
                                echo '[' . $row->file . ']';
                            }
                        } ?>
                        <input type="file" name="file_dok" class="form-control" <?= $page == 'add' ? 'required' : '' ?>>
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