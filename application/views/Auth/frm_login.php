<div class="row">
	<div class="col-md-8">
		
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
		   <div class="carousel-item active">
			  	<img src="<?php  echo base_url();?>asset/images/slide/gambar1.jpg" alt="...">
			 	 <div class="carousel-caption d-none d-md-block">
			    	<h5>Perpustakaan ADAM ADIFA</h5>
			   		 <p>Perpustakaan terlengkap dan terbaik di Indonesia</p>
			  	</div>
			</div>
		    <div class="carousel-item">
			  	<img src="<?php  echo base_url();?>asset/images/slide/gambar3.jpg" alt="...">
			 	 <div class="carousel-caption d-none d-md-block">
			    	<h5>Perpustakaan ADAM ADIFA</h5>
			   		 <p>Perpustakaan terlengkap dan terbaik di Indonesia</p>
			  	</div>
			</div>
		    <div class="carousel-item">
			  	<img src="<?php  echo base_url();?>asset/images/slide/gambar2.jpg" alt="...">
			 	 <div class="carousel-caption d-none d-md-block">
			    	<h5>Perpustakaan ADAM ADIFA</h5>
			   		 <p>Perpustakaan terlengkap dan terbaik di Indonesia</p>
			  	</div>
			</div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>

	</div>
	<div class="col-md-4">
		<form class="needs-validation" novalidate action="<?php echo base_url();?>Auth" method="POST">
			<table class="table table-bordered">
				<tr>
					<td colspan="2" bgcolor="#e4f3ca"><b>Halaman Login</b></td>	
				</tr>
				<tr>
					<td>Username</td>
					<td>
						<input type="text" name="username" class="form-control" required>
						<div class="invalid-feedback">
							Username Harus diisi!	
						</div>
					</td>	
				</tr>
				<tr>
					<td>Password</td>
					<td>
						<input type="password" name="password" class="form-control" required>
						<div class="invalid-feedback">
							Password Harus diisi!	
						</div>
					</td>	
				</tr>	
				<tr>
					<td colspan="2" align="right">
						<input type="submit" class="btn btn-primary" value="Login" name="submit">
						<input type="reset" class="btn btn-danger" value="Batal" name="batal">
					</td>	
				</tr>
			</table>
		</form>
	</div>
</div>

<script type="text/javascript">
	$('.carousel').carousel({
	  interval: 2000
	})

</script>