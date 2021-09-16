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

<section class="content" height="100%">
    <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Surat</h3>
            <div class="pull-right">
                <a href="<?= site_url('surat_pengadaan/add') ?>" class="btn btn-primary btn-flat">
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
                        <th>Tanggal Surat</th>          
                        <th>Nomor Surat</th>
                        <th>Pengirim</th>
                        <th>Perihal Surat</th>
                        <th>Kategori Surat</th>
                        <th>Kode Lemari</th>
                        <th>Nomor Bantex</th>
                        <th>Status Surat</th>                              
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $data->tgl_surat ?></td>
                            <td><?= $data->nmr_surat ?></td>
                            <td><?= $data->pengirim ?></td>
                            <td><?= $data->nm_surat ?></td> 
                            <td><?= $data->nama_kategori ?></td>
                            <td><?= $data->kode_lemari ?></td>
                            <td><?= $data->nmr_bantex ?></td>
                            <td><?= $data->stts_dokumen ?></td> 
                            
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('surat_pengadaan/edit/' . $data->id_surat) ?>" class="btn btn-bitbucket btn-xs">
                                    <i class="fa fa-pencil"></i>                                    
                                </a>
                                <?php if ($this->session->userdata('level') == 1) { ?>
                                    <a href="<?= site_url('surat_pengadaan/del/' . $data->id_surat) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"></i>
                                        
                                    </a>
                                <?php } ?>
                                <button class='btn btn-xs btn-default' type='button'
                                    onclick="window.open('<?php echo base_url().'uploads/file/'.$data->file ?>')"
                                    formtarget='_self'>
                                    <span class='blue'>
                                        <i class='ace-icon fa fa-download'></i>
                                    </span>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>