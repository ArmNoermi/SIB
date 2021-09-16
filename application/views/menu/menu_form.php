<section class="content-header">
    <h1>
        <?= $judul ?>
        <small>Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Archive</li>
    </ol>
</section>

<section class="content">
    
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Menu</h3>
                <div class="pull-right">
                    <a href="<?= site_url('menu') ?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i>
                        Kembali
                    </a>
                </div>
            </div>
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="<?= site_url('menu/process') ?>" method="post">
                            <div class="form-group">
                                <label>Nama Menu *</label>
                                <input type="hidden" name="id_menu" value="<?= $row->id_menu ?>">
                                <input type="text" name="nama_menu" value="<?php echo $row->nama_menu ?>" class="form-control" required>
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