<div class="col-12">
	<div class=" bg-dark card mt-5">
		<div class="card-header">
			<h2 class="card-title">Summary</h2>
		</div>
		<div class="container-fluid">
			<div class="row mr-3 ml-3 mt-3">
				<div class="col-lg-4 col-6">
					<div class="small-box bg-primary">
						<div class="inner">
							<h3><?= $penjualan->total_penjualan;?></h3>
							<p>Total Penjualan</p>
							<p></p>
						</div>

						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="#" class="small-box-footer"
							>More info <i class="fas fa-arrow-circle-right"></i
						></a>
					</div>
				</div>

				<div class="col-lg-4 col-6">
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?= rupiah($penjualan->omset); ?></h3>
							<p>Total Omset</p>
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
					<div class="small-box bg-warning">
						<div class="inner">
							<h3><?= $pembelian->total_pembelian;?></h3>
							<p>Total Pembelian</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						<a href="#" class="small-box-footer"
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
							<h3><?= rupiah($pembelian->pengeluaran); ?></h3>
							<p>Total Pembelian</p>
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
