<!DOCTYPE html>
<html lang="en">
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
    <!-- Untuk datatable -->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css" />
    <script type="text/javascript" src="datatables/datatables.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function () {
        $('#datatable').DataTable();
      });
    </script>
  </head>
  <body>
  <?php
    session_start();
    include "Penghubung/navbar.php" ?>
  <?php
      
      include "koneksi.php";

      if (!isset($_SESSION['id_user'])|| !isset($_SESSION['nama_lengkap'])|| !isset($_SESSION['username']))
          {
            echo "<script>alert('silakan login terlebih dahulu');</script>";
            echo "<script>location = 'login.php';</script>";
            exit();
          }
          

      $id_user = $_SESSION["id_user"];



      function fetch($tb)
      {
          $newArr = [];
          while ($row = mysqli_fetch_assoc($tb)) {
              $newArr[] = $row;
          }
          return $newArr;
      }

      $allow_word = ["no","nama","destinasi","hotel", "tanggal keberangkatan", "harga", "jumlah peserta", "total","bukti pembayaran","status pembayaran"];

      $no = 0;
      
      $user = fetch(mysqli_query($conn, "SELECT * FROM pesanan WHERE id_user='$id_user'"));
      if ($_SESSION["role"] == "admin") {
          $user = fetch(mysqli_query($conn, "SELECT * FROM pesanan"));
          $allow_word[6] = "bukti"; $allow_word[7] = "pembayaran";
      }


      if (isset($_POST["confirm"])) {
          $id_pesanan = $_POST["confirm"];
          $pembayaran = $_POST["btn"];
          mysqli_query($conn, "UPDATE pesanan SET Pembayaran='$pembayaran' WHERE id_pesanan='$id_pesanan'");
      }


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

<!-- Modal Popup untuk delete--> 
 <!-- Modal Popup untuk delete--> 
 <div class="modal fade" id="modal_delete">
            <div class="modal-dialog">
              <div class="modal-content" style="margin-top:100px;">
                 <div class="modal-header">
                  <h5 class="modal-title">Are you sure to delete this data ?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                          
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                  <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
                  <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                </div>
              </div>
            </div>
          </div>
<title>Riwayat</title>
<div class="container-fluid" style="margin-top: 30px;">
<div class="services" style="margin-bottom: 30px;">
            <div class="heading">
                <h1>History Pembelian</h1>
            </div>
        </div>
    <div class="card bg-light">
      <div class="card-body">
            <?php if (!$user) : ?>
                <h1 class="text-center">Tidak Ada Transaksi</h1>
            <?php endif; ?>    
            <?php if ($user) : ?>
              <table id="datatable" class="table table-bordered">
                <thead>
                <tr>
                    <?php foreach ($allow_word as $key) : ?>
                        <th class="text-center"><?= ucwords($key) ?></th>    
                    <?php endforeach; ?>
                    
                </tr>
                </thead>
                <?php 
                 $no=1;
                for ($i=0; $i < count($user); $i++) :
                    ?>
                    
                    <tr>
                    <td class="align-middle text-center"><?php echo $no; ?></td>
                    <td class="align-middle text-center"><?= $user[$i]["nama_lengkap"] ?></td>
                    <td class="align-middle text-center"><?= $user[$i]["destinasi"] ?></td>
                    <td class="align-middle text-center"><?= $user[$i]["hotel"] ?></td>
                    <td class="align-middle text-center"><?= $user[$i]["tanggal"] ?></td>
                    <td class="align-middle text-center">Rp. <?php echo number_format($user[$i]["harga"])?></td>
                    <td class="align-middle text-center"><?= $user[$i]["jumlah"] ?> Orang</td>
                    <td class="align-middle text-center">Rp. <?php echo number_format($user[$i]["total"])?></td>
                    <td class="align-middle text-center"><a href="foto_bukti/<?= $user[$i]["bukti"] ?>" class="lightbox">
                        <img src="foto_bukti/<?= $user[$i]["bukti"] ?>" alt="bukti" class="img-fluid image" width="150px">
                    </a></td>
                    <td class="align-middle text-center">
                        <form action="" method="post">
                        <input type="text" class="d-none" name="confirm" value="<?= $user[$i]["id_pesanan"] ?>">
                        <?php if ($user[$i]["pembayaran"] == "Konfirmasi" && $_SESSION["role"] == "admin" ) { ?>
                            <?=   "<div class='d-flex'><button type='submit' name='btn' value='Lunas' class='btn btn-success' style='margin-right: 10px;'> Lunas </button>
                                                <button type='submit' class='btn btn-danger' name='btn' value='Cancel'> Cancel </button></div>";?>

                        <?php } 
                            elseif ($user[$i]["pembayaran"] == "Konfirmasi" && $_SESSION["role"] == "client" ) { ?>
                            <div class="alert alert-warning">Konfirmasi</div>
                        <?php    }
                        ?>
                        </form>
                        <?php if ($user[$i]["pembayaran"] == "Lunas") : ?> 
                        <div class="alert alert-success">Lunas</div>
                        <?php endif; ?>
                        <?php if ($user[$i]["pembayaran"] == "Cancel") : ?> 
                        <div class="alert alert-danger">Cancel</div>
                        <?php endif; ?>
                    </td>
                    </tr>
                    <?php $no++; ?>
                <?php endfor;?>
            <?php endif; ?>
            </table>
            <!-- Ajax untuk delete data--> 
            <script type="text/javascript">
              $('body').on('click','.delete_modal', function(e){
              let id_pesanan = $(this).data('id');
              $('#modal_delete').modal('show', {backdrop: 'static'});
              $("#delete_link").on("click", function(){
                e.preventDefault();
                $.ajax({
                  method:  'POST', // untuk mendapatkan attribut method pada form
                  url: 'proses_delete.php',  // untuk mendapatkan attribut action pada form
                  data: { 
                    id_pesanan: id_pesanan
                  },
                  success:function(response){
                    console.log(response);
                    $("#modal-data").empty();
                    $("#modal-data").html(response.data);
                    $("#modal_delete").modal('hide');
          
                  },
                  error: function(e)
                  {
                    // Error function here
                  },
                  beforeSend:function(b){
                    // Before function here
                  }
                })
                .done(function(d) {
                  // When ajax finished
                });
              });
            });
          </script>
        </div>
    </div>
</div>
<footer class="footer-distributed ">
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
