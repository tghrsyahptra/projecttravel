<!DOCTYPE html>
<html lang="en">
<head>
	<?php
	include 'koneksi.php';
	$ambil =  $conn->query("SELECT * FROM layanan WHERE id_layanan = '$_GET[id]'"); ?>
	<?php while ($perlayanan = $ambil->fetch_assoc()){ ?>
	<meta charset="utf-8"/>
    <title><?php echo $perlayanan['nama_layanan'] ?></title>
    <!-- bootstrap cdn -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <!-- font awesome cdn -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <!-- style.css -->
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <!-- jquery cdn -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="index.php">PergiTravelling</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav ml-auto">
				<a class="nav-item nav-link" href="paket.php">Package</a>
				<a class="nav-item nav-link" href="mice.php">Mice</a>
				<a class="nav-item nav-link" href="about.php">About Us</a>
				<a class="nav-item nav-link" href="galery.php">Our Galery</a>
        <?php
        session_start();
        include 'koneksi.php';
        if (!isset($_SESSION['id_user'])|| !isset($_SESSION['nama_lengkap'])|| !isset($_SESSION['username'])):?>
          <a class="btn btn-primary tombol" href="login.php">Login</a>
        <?php else:?>
          <a class="nav-item nav-link" href="riwayat.php">Riwayat</a>
          <a class="nav-item nav-link" href="profil.php"><?php echo  $_SESSION['username']; ?></a>
          <a class="btn btn-primary tombol" href="logout.php">Logout</a>
        <?php endif?>
			</div>
			</div>
		</div>
	</nav>
	<!-- jumbo -->
	<div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Rencanakan perjalanan<br/>sesuai dengan keinginan anda</h1>
      </div>
    </div>
	<!-- akhir jumbo -->
  
	<div class="services">
    <h1><?php echo $perlayanan['nama_layanan'] ?></h1>
          <div class="container">
              <h6><?php echo $perlayanan['desk'] ?></h6>
          </div>
		<h1>Rangkaian Perjalanan Anda</h1>
	</div>
      <div class="hari">
      <div class="rangka">
		<div class="container">
			<div class="row workingspace">
				<div class="col-lg-9">
					<h6><?php echo $perlayanan['hari1'] ?></h6>
					<p><?php echo $perlayanan['desk1'] ?></p>
				</div>
				<div class="col-lg-3">
					<img src="admin/uploads/<?php echo $perlayanan['file_name'] ?>" alt="workingspace" class="img-fluid"/>
				</div>
			</div>
		</div>
	</div>
	<div class="rangka">
		<div class="container">
			<div class="row workingspace">
				<div class="col-lg-9">
					<h6><?php echo $perlayanan['hari2'] ?></h6>
					<p><?php echo $perlayanan['desk2'] ?></p>
				</div>
				<div class="col-lg-3">
					<img src="admin/uploads/<?php echo $perlayanan['file_name'] ?>" alt="workingspace" class="img-fluid"/>
				</div>
			</div>
		</div>
	</div>
	<div class="rangka">
		<div class="container">
			<div class="row workingspace">
				<div class="col-lg-9">
					<h6><?php echo $perlayanan['hari3'] ?></h6>
					<p><?php echo $perlayanan['desk3'] ?></p>
				</div>
				<div class="col-lg-3">
				
				</div>
			</div>
		</div>
	</div>
	<div class="rangka">
		<div class="container">
			<div class="row workingspace">
				<div class="col-lg-9">
					<h6><?php echo $perlayanan['hari4'] ?></h6>
					<p><?php echo $perlayanan['desk4'] ?></p>
				</div>
				<div class="col-lg-3">
				
				</div>
			</div>
		</div>
	</div>
      </div>
	<div class="services">
		<h1>What's Included</h1>
	</div>

	<div class="rangka">
		<div class="container">
				<div class="row workingspace">
					<div class="col-lg-5">
					<section>
						<div>
							<ul class="check-list">
							<li><?php echo $perlayanan['inc1'] ?></li>
							<li><?php echo $perlayanan['inc2'] ?></li>
							<li><?php echo $perlayanan['inc3'] ?></li>
							<li><?php echo $perlayanan['inc4'] ?></li>
							<li><?php echo $perlayanan['inc5'] ?></li>
							<li><?php echo $perlayanan['inc6'] ?></li>
							<li><?php echo $perlayanan['inc7'] ?></li>
							</ul>
						</div>
					</section>
					</div>
					<div class="col-lg-3"></div>
					<div class="col-lg-4">
						<img src="img/inc.jpg" alt="workingspace" class="img-fluid"/>
					</div>
				</div>
		</div>
	</div>
	<div class="container">
		<div class="card mt-3">
			<div class="card-header bg-primary text-white">
				List Harga
			</div>
			<div class="card-body">
	<div class="rangka">
		<div class="container">
			<div class="row workingspace">
				<div class="col-lg-3">
					<h6>Adult Twin Share</h6>
				</div>
				<div class="col-lg-3">
					<p>IDR <?php echo number_format($perlayanan['harga1'])  ?></p>
				</div>
				<div class="col-lg-6"></div>
				<div class="col-lg-3">
					<h6>Child Twin Share</h6>
				</div>
				<div class="col-lg-3">
				<p>IDR <?php echo number_format($perlayanan['harga2'])  ?></p>
				</div>
				<div class="col-lg-3"></div>
				<div class="col-lg-3"></div>
				<div class="col-lg-3">
					<h6>Child Without Bed</h6>
				</div>
				<div class="col-lg-3">
				<p>IDR <?php echo number_format($perlayanan['harga3'])  ?></p>
				</div>
				<div class="col-lg-6"></div>
				<div class="col-lg-3">
					<h6>Child With Extra Bed</h6>
				</div>
				<div class="col-lg-3">
				<p>IDR <?php echo number_format($perlayanan['harga4'])  ?></p>
				</div>
				<div class="col-lg-6"></div>
        <div class="container"><a class="btn btn-primary" href="booking.php?id=<?php echo $perlayanan['id_layanan'] ?>">BOOK NOW</a></div>
			</div>
			</div>
		</div>
			</div>
		</div>
	</div>
  <?php } ?>
	<!-- footer -->
	<footer class="footer-distributed">
			<div class="footer-left">
				<h3>PergiTravelling</h3>
				<p class="footer-links">
					<a href="index.php" class="link-1">Home</a>									
					<a href="paket.php">Package</a>				
					<a href="mice.php">Mice</a>					
					<a href="about.php">About Us</a>
					<a href="#">Contact</a>
				</p>
			</div>
			<div class="footer-center">
				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>Jl. Gatot Subroto, Medan</span> Sumatera Utara, Indonesia</p>
				</div>
				<div>
					<i class="fa fa-phone"></i>
					<p>+62895611624105</p>
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:pergitravelling@gmail.com">pergitravelling@gmail.com</a></p>
				</div>
			</div>
			<div class="footer-right">
				<p class="footer-company-about">
					<span>About the company</span>
					Dari asal kami sebagai agen perjalanan liburan pada tahun 1999, PT. Pergi Dulu (PergiTravelling) telah berkembang menjadi penyedia solusi perjalanan perusahaan terpercaya dengan merek PergiTravelling.
				</p>
				<div class="footer-icons">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>
				</div>
			</div>
	</footer>
		<!-- akhir footer -->
</body>
</html>
