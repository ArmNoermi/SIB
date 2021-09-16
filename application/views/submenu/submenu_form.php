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
                    <a href="<?= site_url('submenu') ?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i>
                        Kembali
                    </a>
                </div>
            </div>
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="<?= site_url('submenu/process') ?>" method="post">
                            <div class="form-group">
                                <label>Nama Menu *</label>
                                <input type="hidden" name="id_sub" value="<?= $row->id_sub ?>">
                                <!-- <input type="text" name="menu" value="<?php echo $row->id_menu ?>" class="form-control" required> -->
                                <?= form_dropdown('menu', $menu, $selectedmenu, ['class' => 'form-control', 'required' => 'required']) ?>
                            </div>
                            <div class="form-group">
                                <label>Judul *</label>
                                <input type="text" name="judul" value="<?php echo $row->judul ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>URL *</label>
                                <input type="text" name="url" value="<?php echo $row->url ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Icon *</label>
                                <input type="text" name="icon" value="<?php echo $row->icon ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="aktif" id="aktif" checked>
                                    <label class="form-check-label" for="aktif">
                                        Status Aktif
                                    </label>
                                </div>
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