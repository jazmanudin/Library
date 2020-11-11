<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small card -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3><?php echo $getJmlBuku; ?></h3>

        <p>Data</p>
      </div>
      <div class="icon">
        <i class="fa fa-book"></i>
      </div>
      <a href="<?php echo base_url(); ?>buku/view_buku" class="small-box-footer">
        Klik Disini <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <!-- small card -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3><?php echo $getJmlAnggota; ?></h3>

        <p>Data Anggota</p>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
      </div>
      <a href="<?php echo base_url(); ?>anggota/view_anggota"" class=" small-box-footer">
        Klik Disini <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <!-- small card -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3><?php echo $getJmlKategori; ?></h3>

        <p>Data Kategori</p>
      </div>
      <div class="icon">
        <i class="fa fa-briefcase"></i>
      </div>
      <a href="<?php echo base_url(); ?>kategori/view_kategori"" class=" small-box-footer">
        Klik Disini <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <!-- small card -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?php echo $getJmlPinjam; ?></h3>

        <p>Data Peminjaman</p>
      </div>
      <div class="icon">
        <i class="fa fa-exchange"></i>
      </div>
      <a href="<?php echo base_url(); ?>peminjaman/view_peminjaman"" class=" small-box-footer">
        Klik Disini <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title">GRAFIK PEMINJAMAN BERDASARKAN KATEGORI </h3>
      </div>
      <div class="card-body">
        <div class="chart">
          <div id="chartKategori"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">GRAFIK PEMINJAMAN BUKU</h3>
      </div>
      <div class="card-body">
        <div class="chart">
          <div id="chartPeminjaman"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">GRAFIK ANGGOTA TAHUN <?php echo date("Y"); ?></h3>

      </div>
      <div class="card-body">
        <div class="chart">
          <canvas id="myChart" width="100" height="40"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function() {
    // Grafik Anggota Menggunakan ChartJS
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [<?php foreach ($grafikAnggota->result() as $d) {
                    echo '"' . $d->nama_bulan . '"' . ',';
                  } ?>],
        datasets: [{
          label: 'Jumlah Anggota Tahun <?php echo date("Y"); ?>',
          data: [<?php foreach ($grafikAnggota->result() as $d) {
                    echo $d->jmlanggota . ',';
                  } ?>],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {

          xAxes: [{



          }],
          yAxes: [{


          }]



        }
      }
    });



    //Grafik Highchart Berdasrkan Kategori

    Highcharts.chart('chartKategori', {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
      },
      title: {
        text: ''
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: true,
            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
            style: {
              color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
            }
          }
        }
      },
      series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [

          <?php
          foreach ($grafikKategori->result() as $k) {

            echo "{ name:'" . $k->nama_kategori . "',y:" . $k->jml . "},";
          }
          ?>

        ]
      }]
    });

    // CHart Peminjaman Menggunakan MorrisJ

    Highcharts.chart('chartPeminjaman', {
      chart: {
        type: 'column'
      },
      title: {
        text: ''
      },
      subtitle: {
        text: ''
      },
      xAxis: {
        categories: [
          'Jan',
          'Feb',
          'Mar',
          'Apr',
          'May',
          'Jun',
          'Jul',
          'Aug',
          'Sep',
          'Oct',
          'Nov',
          'Dec'
        ],
        crosshair: true
      },
      yAxis: {
        min: 0,
        title: {
          text: 'Rainfall (mm)'
        }
      },
      tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
          '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
      },
      plotOptions: {
        column: {
          pointPadding: 0.2,
          borderWidth: 0
        }
      },
      series: [{
          name: '<?php echo date('Y'); ?>',
          data: [

            <?php

            foreach ($grafikPinjamNow->result() as $pn) {

              echo $pn->jml . ",";
            }

            ?>

          ]

        },
        {
          name: '<?php echo date('Y') - 1; ?>',
          data: [

            <?php

            foreach ($grafikPinjamLast->result() as $pn) {

              echo $pn->jml . ",";
            }

            ?>


          ]

        },
      ]
    });


  });
</script>