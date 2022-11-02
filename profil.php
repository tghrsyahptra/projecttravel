

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Profil</title>
	<!-- bootstrap cdn -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<!-- font awesome cdn -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<!-- style.css -->
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"/> -->
	<!-- jquery cdn -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>
  
<?php
session_start();
include "Penghubung/navbar.php" ?>
  <div class="container" style="margin-bottom: 100px; margin-top: 100px;">
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo  $_SESSION['nama_lengkap']; ?></h4>
                      <p class="text-secondary mb-1"><?php echo  $_SESSION['username']; ?></p>
                      <p class="text-muted font-size-sm"><?php echo  $_SESSION['alamat']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama Lengkap</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo  $_SESSION['nama_lengkap']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo  $_SESSION['email']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo  $_SESSION['nomor']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo  $_SESSION['alamat']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">NIK</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo  $_SESSION['nik']; ?>
                    </div>
                  </div>
                  <!-- <hr> -->
                  <div class="row">
                    <!-- <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <footer class="footer-distributed fixed-bottom">
			<div class="footer-left">
				<h3>PergiTravelling</h3>
				<p class="footer-links">
					<a href="index.php" class="link-1">Home</a>									
					<a href="paket.php">Package</a>				
					<a href="mice.php">Mice</a>					
					<a href="about.php">About Us</a>
					<a href="contactUs.php">Contact</a>
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
</body>
</html>