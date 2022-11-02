
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Travel</title>
	<!-- bootstrap cdn -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<!-- font awesome cdn -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<!-- style.css -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- jquery cdn -->
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
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
</body>
</html>