 <!-- Content Header (Page header) -->
 <section class="content-header">
 	<h1>
 		<?= $judul ?>
 		<small>Control Panel</small>
 	</h1>
 	<ol class="breadcrumb">
 		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
 		<li class="active">Dashboard</li>
 	</ol>
 </section>

 <!-- Main content -->
 <section class="content">
		 <!-- <div class="row">
        <div class="col-lg-3 col-xs-6">
          
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $this->fungsi->count_dokumen_msk() ?></h3>

              <p>DOKUMEN MASUK</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-document"></i>
            </div>
            <a href="<?= site_url('dkmn_msk') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       
        <div class="col-lg-3 col-xs-6">
          
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $this->fungsi->count_dokumen_klr() ?></h3>

              <p>DOKUMEN KELUAR</p>
            </div>
            <div class="icon">
              <i class="ion ion-document-text"></i>
            </div>
            <a href="<?= site_url('dkmn_klr') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    
        <div class="col-lg-3 col-xs-6">
          
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $this->fungsi->count_user() ?></h3>

              <p>PENGGUNA</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="<?= site_url('users') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    
        <div class="col-lg-3 col-xs-6">
          
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $this->fungsi->count_lemari() ?></h3>

              <p>LEMARI</p>
            </div>
            <div class="icon">
              <i class="ion ion-archive"></i>
            </div>
            <a href="<?= site_url('lemari') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div> -->

      

	  <div class="row">
 			<div class="col-md-3 col-sm-6 col-xs-12">
 				<div class="info-box">
 					<span class="info-box-icon bg-aqua"><i class="fa fa-envelope"></i></span>
 					<div class="info-box-content">
 						<span class="info-box-text">Surat Pengadaan</span>
 						<span class="info-box-number"><?= $this->fungsi->count_surat_pengadaan() ?></span>
 					</div>
 				</div>
 			</div>
 			<div class="col-md-3 col-sm-6 col-xs-12">
 				<div class="info-box">
 					<span class="info-box-icon bg-yellow"><i class="fa fa-clone"></i></span>
 					<div class="info-box-content">
 						<span class="info-box-text">Kategori Dokumen</span>
 						<span class="info-box-number"><?= $this->fungsi->count_kategori_dokumen() ?></span>
 					</div>
 				</div>
 			</div>
 			<div class="clearfix visible-sm-block"></div>
 			<div class="col-md-3 col-sm-6 col-xs-12">
 				<div class="info-box">
 					<span class="info-box-icon bg-green"><i class="fa fa-copy"></i></span>
 					<div class="info-box-content">
 						<span class="info-box-text">Kategori Pengadaan</span>
 						<span class="info-box-number"><?= $this->fungsi->count_kategori_surat() ?></span>
 					</div>
 				</div>
 			</div>
 			<div class="col-md-3 col-sm-6 col-xs-12">
 				<div class="info-box">
 					<span class="info-box-icon bg-red"><i class="fa fa-book"></i></span>
 					<div class="info-box-content">
 						<span class="info-box-text">Bantex</span>
 						<span class="info-box-number"><?= $this->fungsi->count_bantex() ?></span>
 					</div>
 				</div>
 			</div>
 		</div>

      <div class="row">
        <div class="col-md-8">
                        <!-- Bar chart -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <i class="fa fa-bar-chart-o"></i>

                   <h3 class="box-title">Bar Chart</h3>

                      <!-- <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                          <i class="fa fa-minus"></i>
                         </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                          <i class="fa fa-times"></i>
                        </button>
                      </div> -->
              </div>
                            <div class="box-body">
                      <div id="bar-chart" style="height: 342px;"></div>
                      </div>

            </div>

            
        </div>
        <div class="col-md-4">
         
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-android-document"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dokumen Masuk</span>
              <span class="info-box-number"><?= $this->fungsi->count_dokumen_msk() ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                    Document in
                  </span>
            </div>
  
          </div>
         
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-document-text"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dokumen Keluar</span>
              <span class="info-box-number"><?= $this->fungsi->count_dokumen_klr() ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                    Document out
                  </span>
            </div>
           
          </div>
         
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-person"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pengguna</span>
              <span class="info-box-number"><?= $this->fungsi->count_user() ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                    Users
                  </span>
            </div>
           
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion ion-archive"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Lemari</span>
              <span class="info-box-number"><?= $this->fungsi->count_lemari() ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                    Cupboard
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
      </div>

		<!-- <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">JUMLAH</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong><?= date('Y-m-d') ?></strong>
                  </p>

                  <div class="chart">
                  
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                 
                </div>
              
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Completion</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Dokumen Masuk</span>
                    <span class="progress-number"><?= $this->fungsi->count_dokumen_msk() ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 100%"></div>
                    </div>
                  </div>
                 
                  <div class="progress-group">
                    <span class="progress-text">Dokumen Keluar</span>
                    <span class="progress-number"><b><?= $this->fungsi->count_dokumen_klr() ?></b></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 100%"></div>
                    </div>
                  </div>
                 
                  <div class="progress-group">
                    <span class="progress-text">Surat Pengadaan</span>
                    <span class="progress-number"><b><?= $this->fungsi->count_surat_pengadaan() ?></b></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 100%"></div>
                    </div>
                  </div>
                  
                  <div class="progress-group">
                    <span class="progress-text">Pengguna</span>
                    <span class="progress-number"><b><?= $this->fungsi->count_user() ?></b></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                  </div>
                 
                </div>
               
              </div>
             
            </div>
            
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-down"></i></span>
                    <h5 class="description-header"><?= $this->fungsi->count_lemari() ?></h5>
                    <span class="description-text">LEMARI</span>
                  </div>
                  
                </div>
               
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-down"></i></span>
                    <h5 class="description-header"><?= $this->fungsi->count_bantex() ?></h5>
                    <span class="description-text">BANTEX</span>
                  </div>
                  
                </div>
               
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-down"></i></span>
                    <h5 class="description-header"><?= $this->fungsi->count_kategori_dokumen() ?></h5>
                    <span class="description-text">KATEGORI DOKUMEN</span>
                  </div>
                  
                </div>
                
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <span class="description-percentage text-green"><i class="fa fa-caret-down"></i></span>
                    <h5 class="description-header"><?= $this->fungsi->count_kategori_surat() ?></h5>
                    <span class="description-text">KATEGORI PENGADAAN</span>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div> -->
 
 </section>
 
 <script>
        $(function () {
            /*
             * BAR CHART
             * ---------
             */
            var bar_data = {
                data: [
                    ['Dok. Masuk', <?= $this->fungsi->count_dokumen_msk() ?>],
                    ['Dok. Keluar', <?= $this->fungsi->count_dokumen_klr() ?>],
                    ['Surat Pengadaan', <?= $this->fungsi->count_surat_pengadaan() ?>],
                    ['Kategori Dokumen', <?= $this->fungsi->count_kategori_dokumen() ?>],
                    ['Kategori Pengadaan', <?= $this->fungsi->count_kategori_surat() ?>],
                    ['Lemari', <?= $this->fungsi->count_lemari() ?>],
                    ['Bantex', <?= $this->fungsi->count_bantex() ?>],
                    ['Pengguna', <?= $this->fungsi->count_user() ?>]
                ],
                color: '#3c8dbc'
            }
            $.plot('#bar-chart', [bar_data], {
                grid: {
                    borderWidth: 1,
                    borderColor: '#f3f3f3',
                    tickColor: '#f3f3f3'
                },
                series: {
                    bars: {
                        show: true,
                        barWidth: 0.5,
                        align: 'center'
                    }
                },
                xaxis: {
                    mode: 'categories',
                    tickLength: 0
                }
            })
            /* END BAR CHART */
        })

        /*
         * Custom Label formatter
         * ----------------------
         */
        function labelFormatter(label, series) {
            return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">' +
                label +
                '<br>' +
                Math.round(series.percent) + '%</div>'
        }
  </script>