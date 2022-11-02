<?php
session_start();
include "Penghubung/navbar.php" ?>

	<html>
	<body>
	<!-- jumbo -->
	<div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Rencanakan perjalanan<br/>sesuai dengan keinginan anda</h1>
      </div>
    </div>
	<!-- akhir jumbo -->

    <section class="gallery-block cards-gallery">
      <div class="container">
		<div class="heading">
			<h2>Paket Liburan</h2>
		</div>
        <div class="row">
          
          <?php $ambil =  $conn->query("SELECT * FROM layanan"); ?>
          <?php while ($perlayanan = $ambil->fetch_assoc()){ ?>
          <div class="col-md-6 col-lg-3">
            <div class="card border-0 transform-on-hover">
              <a class="lightbox">
                <img src="admin/uploads/<?php echo $perlayanan['file_name'] ?>" alt="Card Image" class="card-img-top">
              </a>
              <div class="card-body">
                <h6><a><?php echo $perlayanan['nama_layanan'] ?></a></h6>
                <p class="text-muted card-text">from<br/>IDR <?php echo  number_format($perlayanan['harga_layanan'])?><br/><?php echo $perlayanan['lama_layanan'] ?> days</p>
                <p class="text-muted card-text"><?php echo $perlayanan['desk'] ?></p>
                <a class="btn btn-primary bg-light" href="paketdet.php?id=<?php echo $perlayanan['id_layanan'] ?>">Detail</a>
                <a class="btn btn-primary bg-light" href="booking.php?id=<?php echo $perlayanan['id_layanan'] ?>">Book</a>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>

	<!-- footer -->
	<?php include "./Penghubung/footer.php" ?>
		<!-- akhir footer -->
</body>
</html>