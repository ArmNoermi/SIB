<section class="content-header">
    <h1>
        <?= $judul ?>
        <small>Kategori Dokumen Pengadaan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Kategori</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Kategori</h3>
            <div class="pull-right">
                <a href="<?= site_url('ktgr_dokumen') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>
                    Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('ktgr_dokumen/process') ?>" method="post">
                        <div class="form-group">
                            <label>Nama Kategori *</label>
                            <input type="hidden" name="id_kat" value="<?= $row->id_kategori ?>">
                            <input type="text" name="nama_kat" value="<?php echo $row->nama_kategori ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="<?php echo $page ?>" class="btn btn-success btn-flat">
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