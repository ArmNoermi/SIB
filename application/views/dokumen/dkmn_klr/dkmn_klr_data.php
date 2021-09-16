<section class="content-header">
    <h1>
        <?= $judul ?>
        <small>Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Arsip Dokumen</li>
    </ol>
</section>

<section class="content" height="100%">
    <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Dokumen</h3>
            <div class="pull-right">
                <a href="<?= site_url('dkmn_klr/add') ?>" class="btn btn-primary btn-flat">
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
                        <th>Tanggal Dokumen</th>         
                        <th>Nomor Dokumen</th>
                        <th>Tujuan Dokumen</th>
                        <th>Perihal Dokumen</th>
                        <th>Kategori Dokumen</th>
                        <th>Kode Lemari</th>
                        <th>Nomor Bantex</th>
                        <th>Status Dokumen</th>                              
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%;"><?= $no++ ?>.</td>
                            <td><?= $data->tgl_dokumen ?></td>
                            <td><?= $data->kode_dokumen ?></td>
                            <td><?= $data->tujuan ?></td>
                            <td width="300px"><?= $data->nama_dokumen ?></td> 
                            <td><?= $data->nama_kategori ?></td>
                            <td><?= $data->kode_lemari ?></td>
                            <td><?= $data->nmr_bantex ?></td>
                            <td><?= $data->stts_dokumen  ?></td>   
                            
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('dkmn_klr/edit/' . $data->id_dokumen) ?>" class="btn btn-bitbucket btn-xs">
                                    <i class="fa fa-pencil"></i>                                    
                                </a>
                                <?php if ($this->session->userdata('level') == 1) { ?>
                                    <a href="<?= site_url('dkmn_klr/del/' . $data->id_dokumen) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
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