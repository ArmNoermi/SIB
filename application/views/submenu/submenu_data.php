<section class="content-header">
    <h1>
        <?= $judul ?>
        <small>Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Submenu</li>
    </ol>
</section>



<section class="content">
    <?php $this->view('message') ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Submenu</h3>
                <div class="pull-right">
                    <a href="<?= site_url('submenu/add') ?>" class="btn btn-primary">
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
                            <th>Judul</th>
                            <th>Status Menu</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td style="width: 5%;"><?= $no++ ?>.</td>
                                <td><?= $data->nama_menu ?></td>
                                <td><?= $data->judul ?></td>
                                <td><?= $data->aktif == 1 ? "Aktif" : "Tidak Aktif" ?></td>
                                <td class="text-center" width="160px">
                                    <a href="<?= site_url('submenu/edit/' . $data->id_sub) ?>" class="btn btn-success btn-xs">
                                        <i class="fa fa-pencil"></i>
                                        Update
                                    </a>
                                    <a href="<?= site_url('submenu/del/' . $data->id_sub) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
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