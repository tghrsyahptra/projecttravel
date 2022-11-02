<?php
session_start();
include "Penghubung/navbar.php" ?>
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
			    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			  </ol>
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			    	<div class="info">
			      		<h1>AMAN</h1>
			      		<p></p>
			      	</div>
			    </div>
			    <div class="carousel-item">
			    	<div class="info">
			      		<h1>NYAMAN</h1>
			      		<p></p>
			      	</div>
			    </div>
			    <div class="carousel-item">
			    	<div class="info">
			      		<h1>BAHAGIA</h1>
			      		<p></p>
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

	<section class="gallery-block cards-gallery">
      <div class="container">
		<div class="heading">
			<h2>Experience Our Destination</h2>
		</div>
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <div class="card border-0 transform-on-hover">
              <a class="lightbox" href="sumatera.php">
                <img src="img/toba2.jpg" alt="Card Image" class="card-img-top" />
              </a>
              <div class="card-body">
                <h6><a href="sumatera.php">Sumatera</a></h6>
                <p class="text-muted card-text"></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="card border-0 transform-on-hover">
              <a class="lightbox" href="jawa.php">
                <img src="img/bromo.jpg" alt="Card Image" class="card-img-top" />
              </a>
              <div class="card-body">
                <h6><a href="jawa.php">Jawa</a></h6>
                <p class="text-muted card-text"></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="card border-0 transform-on-hover">
              <a class="lightbox" href="papua.php">
                <img src="img/raja.jpg" alt="Card Image" class="card-img-top" />
              </a>
              <div class="card-body">
                <h6><a href="papua.php">Papua</a></h6>
                <p class="text-muted card-text"></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="card border-0 transform-on-hover">
              <a class="lightbox" href="sulawesi.php">
                <img src="img/sulawesi.jpg" alt="Card Image" class="card-img-top" />
              </a>
              <div class="card-body">
                <h6><a href="sulawesi.php">Sulawesi</a></h6>
                <p class="text-muted card-text"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	<!-- working space -->
	<div class="container">
		<div class="row workingspace">
			<div class="col-lg-6">
			<img src="img/bajo.jpg" alt="workingspace" class="img-fluid"/>
			</div>
			<div class="col-lg-6">
			<h3>berlibur dengan hemat dan hati tenang bersama PergiTravelling</h3>
			<p>Melayani Dengan penuh hati dan senyuman</p>
			<a href="galery.php" class="btn btn-primary tombol">Gallery</a>
			</div>
		</div>
	</div>
	
      <!-- akhir working space -->
	  <div class="services">
      <h1>Services Lainnya</h1>
      <div class="container">
	  	<h6>Pada prinsipnya, karena apa yang kami tawarkan merupakan sebuah perjalanan serta pengalaman tak terlupakan, kami memahami bahwa terdapat elemen-elemen penting yang tidak dapat dipisahkan dari sebatas perencanaan, namun juga memastikan bahwa proses perjalanan anda terakomodasi dengan sempurna. Berikut pelayanan lain yang kami sediakan untuk anda:</h6>
	  </div>
      <div class="cen">
        <div class="service">
        <img src="img/insurance.png" alt="service" class="img"/>
          <h2>Asuransi</h2>
          <p>Lindungi perjalanan anda dari kejadian-kejadian tak diinginkan, supaya anda tidak memiliki kekuatiran selama liburan</p>
        </div>
        <div class="service">
        <img src="img/car.png" alt="service" class="img"/>
          <h2>Transportasi</h2>
          <p>Demi menjelajah setiap pelosok, kami memiliki layanan penyewaan mobil di setiap destinasi anda, sehingga anda...</p>
        </div>
        <div class="service">
        <img src="img/hotel.png" alt="service" class="img"/>
          <h2>Hotel</h2>
          <p>Agar istirahat anda nyaman, kami juga sudah menyediakan hotel - hotel terbaik untuk anda beristirahat</p>
        </div>
        <div class="service">
        <img src="img/ticket.png" alt="service" class="img"/>
          <h2>Ticket & Attraction</h2>
          <p>Tidak perlu lagi membayangkan antrean panjang untuk masuk ke taman hiburan dan berbagai atraksi pada setiap</p>
        </div>
      </div>
    </div>
	<!-- footer -->
	<?php include "Penghubung/footer.php"; ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>

	<!-- scripts -->
	<!-- bootstrap javascript cdn -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>