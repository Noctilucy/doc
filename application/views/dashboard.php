    <!-- /.row -->
    <div class="row">
      <div class="col-lg-6 col-6 mt-3">
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= $penjualan->total_penjualan;?></h3>
            <h3>Total Penjualan<h3>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

    <div class="col-lg-6 col-6 mt-3">
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?= $penjualan->omset; ?></h3>
            <h3>Omset<h3>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6 col-6 mt-3">
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= $pembelian->total_pembelian;?></h3>
            <h3>Total Pembelian<h3>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

    <div class="col-lg-6 col-6 mt-3">
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?= $pembelian->pengeluaran; ?></h3>
            <h3>Pengeluaran<h3>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>

    <div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels : [
      <?php foreach($data_grafik as $grafik){;?>
        '<?= $grafik->bulan;?>',
        <?php } ?>
        ],
        datasets: [{
        label: '# of Votes',
        data: [
          <?php  foreach($data_grafik as $grafik){ ?>
          '<?= $grafik->total; ?>',
          <?php } ?>
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>


  