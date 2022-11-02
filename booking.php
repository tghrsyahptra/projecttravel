<?php 
include 'koneksi.php';
session_start();
if (!isset($_SESSION['id_user'])|| !isset($_SESSION['nama_lengkap'])|| !isset($_SESSION['username']))
    {
      echo "<script>alert('silakan login terlebih dahulu');</script>";
      echo "<script>location = 'login.php';</script>";
      exit();
    }

function fetch($tb)
{
    $newArr = [];
    while ($row = mysqli_fetch_assoc($tb)) {
        $newArr[] = $row;
    }
    return $newArr;
}

$id_user = $_SESSION["id_user"];
$pesanan = fetch(mysqli_query($conn, "SELECT * FROM pesanan")) ;
if ($pesanan) {

    for ($i=0; $i < count($pesanan); $i++) { 
        if ($pesanan[$i]["pembayaran"] == "Diproses") {
            $id_del = $pesanan[$i]["id_pesanan"];
            mysqli_query($conn, "DELETE FROM pesanan WHERE id_pesanan='$id_del'");
        }
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <?php $ambil =  $conn->query("SELECT * FROM layanan WHERE id_layanan = '$_GET[id]'"); ?>
    <?php while ($perlayanan = $ambil->fetch_assoc()){ ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- bootstrap cdn -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <!-- font awesome cdn -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <!-- style.css -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title><?php echo $perlayanan['nama_layanan'] ?></title>
  </head>
  <body>
  <?php
include "Penghubung/navbar.php" ?>
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
              <input type="num" class="id_user" name="id_user" style="display: none;" value="<?= $_SESSION["id_user"] ?>">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="email" class="form-control" name="nama_lengkap" id="nama_lengkap" value ="<?php echo  $_SESSION['nama_lengkap']; ?>" readonly required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value ="<?php echo  $_SESSION['email']; ?>"readonly>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Nomor Telepon</label>
                    <input type="text" class="form-control" name="nomor" id="nomor" value ="<?php echo  $_SESSION['nomor']; ?>" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" name="nik" id="nik" value ="<?php echo  $_SESSION['nik']; ?>" readonly>
                  </div>
                </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value ="<?php echo  $_SESSION['alamat']; ?>" readonly>
                  </div>

                  <div class="form-group">
                    <label for="destinasi">Destinasi</label>
                    <input type="text" class="form-control" name="destinasi" id="destinasi" placeholder="Bajo" value="<?php echo $perlayanan['nama_layanan'] ?>" readonly name="destinasi">
                  </div>
                  <div class="form-group">
                    <label for="tanggal">Keberangkatan</label>
                    <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                  </div>
                <hr>
                <h4>Tour Member</h4>
                <hr>
                <?php $ambil =  $conn->query("SELECT * FROM layanan WHERE id_layanan = '$_GET[id]'"); ?>
	              <?php while ($perlayanan = $ambil->fetch_assoc()){ ?>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="harga">Hotel</label>
                    <select class="form-control" name="hotel" id="hotel" required>
                        <option value=""></option>
                        <option value="<?php echo $perlayanan['hotel1']  ?>"><?php echo $perlayanan['hotel1']  ?></option>
                        <option value="<?php echo $perlayanan['hotel2']  ?>"><?php echo $perlayanan['hotel2']  ?></option>
                        <option value="<?php echo $perlayanan['hotel3']  ?>"><?php echo $perlayanan['hotel3']  ?></option>
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="harga">Tipe Kamar</label>
                    <select class="form-control" name="harga" id="harga" required>
                        <option value=""></option>
                        <option value="<?php echo $perlayanan['harga1']  ?>">Adult Twin Share</option>
                        <option value="<?php echo $perlayanan['harga2']  ?>">Child Twin Share</option>
                        <option value="<?php echo $perlayanan['harga3']  ?>">Child Without Bed</option>
                        <option value="<?php echo $perlayanan['harga4']  ?>">Child With Extra Bed</option>
                      </select>
                  </div>
                <?php } ?>
                  <div class="form-group col-md-6">
                    <label for="jumlah">Jumlah‎</label>
                    <input type="text" id="jumlah" class="form-control" name="jumlah" placeholder="Jumlah Orang" required>
                  </div>
                  <div class="form-group col-md-6">
                  <label for="total">Total</label>
                    <input type="text" class="form-control" name="total" id="total" placeholder="Total" readonly="">
                  </div>
                </div>
                  <button type="submit" class="btn btn-booking btn-block btn-primary">BOOKING</button>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <script>
      $(document).ready(function() {
        $("#jumlah, #harga").keyup(function() {
                            var harga  = $("#harga").val()
                            ,jumlah = $("#jumlah").val()
                            ,total = parseInt(harga) * parseInt(jumlah)
                            $("#total").val(total)
                            
                        }),
        $(".btn-booking").click( function() {     
          var nama_lengkap = $("#nama_lengkap").val()
          ,email = $("#email").val()
          ,nomor = $("#nomor").val()
          ,nik = $("#nik").val()
          ,alamat = $("#alamat").val()
          ,destinasi = $("#destinasi").val()
          ,tanggal = $("#tanggal").val()
          ,harga = $("#harga").val()
          ,hotel = $("#hotel").val()
          ,jumlah = $("#jumlah").val()
          ,total = $("#total").val()
          ,id_user = $(".id_user").val()
        

          if (nama_lengkap.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Nama Lengkap Wajib Diisi !'
            })
          } else if(email.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Email Wajib Diisi !'
            })
          } else if(nomor.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'nomor Wajib Diisi !'
            })
          } else if(nik.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'NIK Wajib Diisi !'
            })
            }
            else if(alamat.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Alamat Wajib Diisi !'
            })
            }
            else if(destinasi.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Destinasi Wajib Diisi !'
            })
            }
            else if(tanggal.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Tanggal Wajib Diisi !'
            })
            }
            else if(harga.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Jumlah Orang Wajib Diisi !'
            })
            }
            else if(hotel.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Hotel Orang Wajib Diisi !'
            })
            }
            else if(jumlah.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Jumlah Orang Wajib Diisi !'
            })
            }
            else {$.ajax({
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
                            "total": total,
                            "harga": harga,
                            "hotel": hotel,
                            "id_user": id_user
                        },
                        success:function(response){
                            if (response == "success") {

                            Swal.fire({
                                type: 'success',
                                title: 'Proses Booking Anda Telah Berhasi!',
                                text: 'Silahkan Melakukan Pembayaran ini!',
                                timer: 2000,
                                showCancelButton: false,
                                showConfirmButton: false
                            }).then (function() {
                              window.location.href = "pembayaran.php";
                          });
                            $("#tanggal").val('')
                            $("#harga").val('')
                            $("#hotel").val('')
                            $("#jumlah").val('')
                            $("#total").val('')
                            } else {

                            Swal.fire({
                                type: 'error',
                                title: 'Proses Booking Gagal',
                                text: 'silahkan coba lagi!'
                            })
                            }
                        },
                        error:function(response){
                            Swal.fire({
                                type: 'error',
                                title: 'Opps!',
                                text: 'server error!'
                            })
                        }
                        })

                    }
          })
      })
    </script>



  <!-- footer -->
	<?php include "Penghubung/footer.php" ?>
		<!-- akhir footer -->
  </body>
</html>