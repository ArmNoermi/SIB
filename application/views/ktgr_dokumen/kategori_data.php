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
    <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Kategori</h3>
            <div class="pull-right">
                <a href="<?= site_url('ktgr_dokumen/add') ?>" class="btn btn-primary btn-flat">
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
                        <th>Nama Kategori Dokumen</th>                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%;"><?= $no++ ?>.</td>
                            <td><?= $data->nama_kategori ?></td>
                            
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('ktgr_dokumen/edit/' . $data->id_kategori) ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>
                                    Update
                                </a>

                                <?php if ($this->session->userdata('level') == 1) { ?>
                                    <a href="<?= site_url('ktgr_dokumen/del/' . $data->id_kategori) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"></i>
                                        Hapus
                                    </a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>