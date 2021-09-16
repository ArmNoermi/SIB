<section class="content-header">
    <h1>
        <?= $judul ?>
        <small>Dokumen Dalam Gudang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Lemari</li>
    </ol>
</section>

<section class="content">
    <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lemari Berkas</h3>
            <div class="pull-right">
                <a href="<?= site_url('lemari/add') ?>" class="btn btn-primary btn-flat">
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
                        <th>Kode Lemari</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%;"><?= $no++ ?>.</td>
                            <td><?= $data->kode_lemari ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('lemari/edit/' . $data->id_lemari) ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>
                                    Update
                                </a>
                                <?php if ($this->session->userdata('level') == 1) { ?>
                                    <a href="<?= site_url('lemari/del/' . $data->id_lemari) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
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