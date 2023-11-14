<div class="col-12">
	<div class=" bg-dark card mt-5">
		<div class="card-header">
			<h2 class="card-title">Summary</h2>
		</div>
		<div class="container-fluid">
			<div class="row mr-3 ml-3 mt-3">
				
				<div class="col-lg-4 col-6">
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?= rupiah($debit->debit); ?></h3>
							<p>Total Debit</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<a href="<?= base_url('penjualan')?>" class="small-box-footer"
							>More info <i class="fas fa-arrow-circle-right"></i
						></a>
					</div>
				</div>


				<div class="col-lg-4 col-6">
					<div class="small-box bg-danger">
						<div class="inner">
							<h3><?= rupiah($kredit->kredit); ?></h3>
							<p>Total Kredit</p>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
						<a href="#" class="small-box-footer"
							>More info <i class="fas fa-arrow-circle-right"></i
						></a>
					</div>
				</div>

				<div class="col-lg-4 col-6">
					<div class="small-box bg-danger">
						<div class="inner">
							<h3><?= rupiah($debit->debit - $kredit->kredit ); ?></h3>
							<p>Laba Kerugian</p>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
						<a href="#" class="small-box-footer"
							>More info <i class="fas fa-arrow-circle-right"></i
						></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
    <div class="row">
          <div class="col-12">
            <div class="card mt-5">
              <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>

              <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap" id="myTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Kredit</th>
                      <th>Debit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach($data_kd as $kd){ ?>
                      <tr>
                      <td><?= $no; ?></td>
                      <td><?= $kd->tgl_transaksi?></td>
                      <td><?= $kd->kredit ?></td>
                      <td><?= $kd->debit ?></td>
                      </tr>
                    <?php $no++; } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
   

      