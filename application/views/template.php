<!doctype html>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
 

    <title>Aplikasi Perpustakaan</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>asset/css/adminlte.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


   
    <style>

          #notifikasi {
              cursor: pointer;
              position: fixed;
              right: 0px;
              z-index: 9999;
              bottom: 0px;
              margin-bottom: 22px;
              margin-right: 15px;
              min-width: 300px; 
              max-width: 800px;  
          }

           

    </style>

    <!-- Custom styles for this template -->
    <script src="<?php echo base_url(); ?>asset/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/Chart.bundle.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark  bg-dark">
      <a class="navbar-brand" href="#">APP LIBRARY</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url(); ?>dashboard">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Data Master
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" href="<?php echo base_url();?>Anggota/view_anggota">Data Anggota</a>
			  <a class="dropdown-item" href="<?php echo base_url();?>Buku/view_buku">Data Buku</a>
			  <div class="dropdown-divider"></div>
			  <a class="dropdown-item" href="<?php echo base_url();?>Kategori/view_kategori">Data Kategori</a>
			</div>
		  </li>
          <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Transaksi
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" href="<?php echo base_url();?>Peminjaman/view_peminjaman">Peminjaman</a>
			  <a class="dropdown-item" href="<?php echo base_url();?>Pengembalian/view_pengembalian">Pengembalian</a>
		
			</div>
		  </li>
		  <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Laporan
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" href="<?php echo base_url();?>Peminjaman/laporan">Peminjaman</a>
			  <a class="dropdown-item" href="#">Pengembalian</a>
		
			</div>
		  </li>
       <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>auth/logout">Logout</a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <main role="main" class="container">
		<div style="margin-top:20px">
			<?php echo $contents; ?>
		</div>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <div class="modal fade" id="konfirmasi_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-body">
                  <b>Anda yakin ingin menghapus data ini ?</b><br><br>
                  <a class="btn btn-danger btn-ok"> Hapus</a>
                  <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
              </div>
          </div>
      </div>
    </div>

    <script type="text/javascript">
  
      $(function(){
        
      
        $("#datatable").DataTable();
        $("#datatable2").DataTable();
     

        $("#notifikasi").slideDown('slow').delay(3000).slideUp('slow');


         $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });

      });

      (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();

    </script>

  
  </body>
</html>
