<section class="content-header">
    <h1>
        <?= $judul ?>
        <small>Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Menu</li>
    </ol>
</section>

<br>

<section class="content">
    <?php $this->view('message') ?>
   
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Menu</h3>
                <div class="pull-right">
                    <a href="<?= site_url('menu/add') ?>" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Tambah
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Menu</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td style="width: 5%;"><?= $no++ ?>.</td>
                                <td><?= $data->nama_menu ?></td>
                                <td class="text-center" width="160px">
                                    <a href="<?= site_url('menu/edit/' . $data->id_menu) ?>" class="btn btn-success btn-xs">
                                        <i class="fa fa-pencil"></i>
                                        Update
                                    </a>
                                    <a href="<?= site_url('menu/del/' . $data->id_menu) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"></i>
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    
</section>