<?php
    include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
    <title>Travel</title>
    <!-- bootstrap cdn -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
    <!-- font awesome cdn -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <!-- style.css -->
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <!-- jquery cdn -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="#">PergiTravelling</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav ml-auto">
				<a class="nav-item nav-link" href="../paket.php">Package</a>
				<a class="nav-item nav-link" href="../mice.php">Mice</a>
				<a class="nav-item nav-link" href="../about.php">About Us</a>
				<a class="nav-item nav-link" href="#">Contact</a>
        <?php 
        include '../koneksi.php';
        session_start();
        if (!isset($_SESSION['id_user'])|| !isset($_SESSION['nama_lengkap'])|| !isset($_SESSION['username'])):?>
          <a class="btn btn-primary tombol" href="login.php">Login</a>
          
        <?php else:?>
          <a class="nav-item nav-link" href="../riwayat.php">Riwayat</a>
          <a class="nav-item nav-link" href="../profil.php">Profil</a>
          <a class="btn btn-primary tombol" href="../logout.php">Logout</a>
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
		<h1>2D1N EXOTIC IJEN BANYUWANGI</h1>
        <div class="container">
            <h6>Gunung Ijen adalah sebuah gunung berapi yang terletak di perbatasan antara Kabupaten Banyuwangi dan Kabupaten Bondowoso, Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.386 mdpl dan terletak berdampingan dengan Gunung Merapi. Gunung Ijen terakhir meletus pada tahun 1999.</h6>
        </div>
		<h1>Rangkaian Perjalanan Anda</h1>
	</div>
  <div class="hari">
    <div class="rangka">
      <div class="container">
        <div class="row workingspace">
          <div class="col-lg-9">
            <h6>HARI 1 : KETIBAAN SURABAYA – BANYUWANGI (SNACK)</h6>
            <p>Setibanya di Bandara Surabaya, Anda dijemput Kemudian diantar Menuju ke Banyuwangi, perjalanan darat kurang lebih 7 jam. Setelah itu diantar menuju hotel di Banyuwangi untuk check in & istirahat.</p>
          </div>
          <div class="col-lg-3">
            <img src="../img/ijen.jpg" alt="workingspace" class="img-fluid"/>
          </div>
        </div>
      </div>
    </div>
    <div class="rangka">
      <div class="container">
        <div class="row workingspace">
          <div class="col-lg-9">
            <h6>HARI 2 : IJEN TOUR – SURABAYA / TRANSFER OUT (MP,MS)</h6>
            <p>Dini hari rombongan diantar menuju Pos Paltuding. Sesampainya di Pos Paltuding, trekking kurang lebih 1.5 jam menuju puncak Kawah Ijen. jika ingin ke Blue Fire menempuh perjalanan trekking tambahan sekitar 1 jam. setelah puas menikmati pemandangan Kawah Ijen kembali ke Pos Paltuding. hingga saatnya diantar kembali menuju hotel untuk makan pagi & persiapan check out. Kemudian menuju pusat oleh oleh, hingga saatnya diantar kembali kembali menuju Bandara Surabaya. Perjalanan darat kurang lebih 7 jam. Sampai bertemu kembali dengan AVIA Tour.</p>
          </div>
          <div class="col-lg-3">
            <img src="../img/ijen.jpg" alt="workingspace" class="img-fluid"/>
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
							<li>Malam menginap di hotel dengan sarapan pagi</li>
							<li>Tour dan makan sesuai dengan itinerary</li>
							<li>Transportasi sesuai jumlah perserta</li>
							<li>Local Guide berbahasa Indonesia</li>
							<li>Gratis penggunaan standard masker, tongkat bambu</li>
							<li>Harga WNI </li>
							<li>Tiket masuk objek wisata</li>
							</ul>
						</div>
					</section>
					</div>
					<div class="col-lg-3"></div>
					<div class="col-lg-4">
						<img src="../img/ijen.jpg" alt="workingspace" class="img-fluid"/>
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
				 <p>IDR 2,750,000</p>
				</div>
				<div class="col-lg-6"></div>
				<div class="col-lg-3">
					<h6>Child Twin Share</h6>
				</div>
				<div class="col-lg-3">
				 <p>IDR 2,750,000</p>
				</div>
				<div class="col-lg-3"></div>
				<div class="col-lg-3"><a type="button" class="btn btn-primary" href="book.php">BOOK NOW</a></div>
				<div class="col-lg-3">
					<h6>Child Without Bed</h6>
				</div>
				<div class="col-lg-3">
				 <p>IDR 2,300,000</p>
				</div>
				<div class="col-lg-6"></div>
				<div class="col-lg-3">
					<h6>Child With Extra Bed</h6>
				</div>
				<div class="col-lg-3">
				 <p>IDR 2,750,000</p>
				</div>
				<div class="col-lg-6"></div>
				
			</div>
			</div>
		</div>
			</div>
		</div>

	</div>

	<!-- footer -->
	<footer class="footer-distributed">
		<div class="footer-left">
			<h3>PergiTravelling</h3>
			<p class="footer-links">
				<a href="#" class="link-1">Home</a>					
				<a href="#">Blog</a>				
				<a href="#">Pricing</a>				
				<a href="#">About</a>					
				<a href="#">Faq</a>
				<a href="#">Contact</a>
			</p>
		</div>
		<div class="footer-center">
			<div>
				<i class="fa fa-map-marker"></i>
				<p><span>444 S. Cedros Ave</span> Solana Beach, California</p>
			</div>
			<div>
				<i class="fa fa-phone"></i>
				<p>+1.555.555.5555</p>
			</div>
			<div>
				<i class="fa fa-envelope"></i>
				<p><a href="mailto:support@company.com">support@company.com</a></p>
			</div>
		</div>
		<div class="footer-right">
			<p class="footer-company-about">
				<span>About the company</span>
				Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
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
