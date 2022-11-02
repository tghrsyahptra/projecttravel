<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- bootstrap cdn -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
    <!-- font awesome cdn -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <!-- style.css -->
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Booking Sumba</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="../index.php">PergiTravelling</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
        <a class="nav-item nav-link" href="../paket.php">Package</a>
          <a class="nav-item nav-link" href="../mice.php">Mice</a>
          <a class="nav-item nav-link" href="../about.php">About Us</a>
          <a class="nav-item nav-link" href="#">Contact</a>
          <a class="btn btn-primary tombol" href="../login.php">Login</a>
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
    
    <div class="container" style="margin-top: 50px">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h4>Data Diri Calon Pelancong</h4>
              <hr>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Nama Lengkap</label>
                  <input type="email" class="form-control" id="nama_lengkap" placeholder="Masukkan Nama Lengkap">
                </div>
                <div class="form-group col-md-6">
                  <label>Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Masukkan Email">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Nomor Telepon</label>
                  <input type="text" class="form-control" id="nomor" placeholder="Masukkan Nomor Telepon">
                </div>
                <div class="form-group col-md-6">
                  <label>NIK</label>
                  <input type="text" class="form-control" id="nik" placeholder="Masukkan NIK">
                </div>
              </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat">
                </div>

                <div class="form-group">
                  <label>Destinasi</label>
                  <input type="text" class="form-control" id="destinasi" placeholder="Sumba" value="Sumba" disabled>
                </div>

                <div class="form-group">
                  <label>Keberangkatan</label>
                  <input type="date" class="form-control" id="tanggal">
                </div>
              <hr>
              <h4>Tour Member</h4>
              <hr>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Jumlah Orang</label>
                  <select class="form-control" id="harga">
                      <option value=""></option>
                      <option value="2950000">Adult Twin Share</option>
                      <option value="2,950,000">Child Twin Share</option>
                    </select>
              </div>
                <div class="form-group col-md-6">
                  <label>‎</label>
                  <input type="text" id="jumlah" class="form-control" placeholder="Jumlah Orang">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                <label>Total</label>
                  <input type="text" class="form-control" id="total" placeholder="Total" readonly="">
                </div>
                <button class="btn btn-booking btn-block btn-primary">BOOKING</button>
              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <script>
      $(document).ready(function() {
        $("#jumlah, #harga").keyup(function() {
                            var harga  = $("#harga").val();
                            var jumlah = $("#jumlah").val();

                            var total = parseInt(harga) * parseInt(jumlah);
                            $("#total").val(total);
                        });
        $(".btn-booking").click( function() {
        
          var nama_lengkap = $("#nama_lengkap").val();
          var email = $("#email").val();
          var nomor = $("#nomor").val();
          var nik = $("#nik").val();
          var alamat = $("#alamat").val();
          var destinasi = $("#destinasi").val();
          var tanggal = $("#tanggal").val();
          var harga = $("#harga").val();
          var jumlah = $("#jumlah").val();
          var total = $("#total").val();

          if (nama_lengkap.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Nama Lengkap Wajib Diisi !'
            });
          } else if(email.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Email Wajib Diisi !'
            });
          } else if(nomor.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'nomor Wajib Diisi !'
            });
          } else if(nik.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'NIK Wajib Diisi !'
            });
            }
            else if(alamat.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Alamat Wajib Diisi !'
            });
            }
            else if(destinasi.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Destinasi Wajib Diisi !'
            });
            }
            else if(tanggal.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Tanggal Wajib Diisi !'
            });
            }
            else if(harga.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Jumlah Orang Wajib Diisi !'
            });
            }
            else if(jumlah.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Jumlah Orang Wajib Diisi !'
            });
            }
           else {
            //ajax
            $.ajax({
              url: "simpan-booking.php",
              type: "POST",
              data: {
                  "nama_lengkap": nama_lengkap,
                  "email": email,
                  "nomor": nomor,
                  "nik": nik,
                  "alamat": alamat,
                  "destinasi": destinasi,
                  "tanggal": tanggal,
                  "jumlah": jumlah,
                  "total": total
              },
              success:function(response){
                if (response == "success") {
                  Swal.fire({
                    type: 'success',
                    title: 'Proses Booking Anda Telah Berhasi!',
                    text: 'Silahkan tunggu admin kami menghubungi anda!'
                  });
                  $("#nama_lengkap").val('');
                  $("#email").val('');
                  $("#nomor").val('');
                  $("#nik").val('');
                  $("#alamat").val('');
                  $("#tanggal").val('');
                  $("#harga").val('');
                  $("#jumlah").val('');
                  $("#total").val('');
                } else {

                  Swal.fire({
                    type: 'error',
                    title: 'Register Gagal!',
                    text: 'silahkan coba lagi!'
                  });
                }
                console.log(response);
              },
              error:function(response){
                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'server error!'
                  });
              }

            })

          }

        }); 


      });
    </script>


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