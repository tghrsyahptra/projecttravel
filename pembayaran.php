<?php 
include "koneksi.php";
session_start();
if (!isset($_SESSION['id_user'])|| !isset($_SESSION['nama_lengkap'])|| !isset($_SESSION['username']))
{
      echo "<script>alert('silakan login terlebih dahulu');</script>";
      echo "<script>location = 'login.php';</script>";
      exit();
}
$pesanan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pesanan ORDER BY id_pesanan DESC")) ;
$id_pesanan = $pesanan["id_pesanan"];
if ($pesanan["id_user"] != $_SESSION["id_user"] || $pesanan["pembayaran"] != "Diproses") {
    echo "<script>alert('Pesanan Perjalanan Gagal!');</script>";
    echo "<script>location = 'paket.php'</script>";
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <title>Pembayaran <?= $pesanan["destinasi"] ?></title>
</head>
<script>
   function sweetAlert() 
  {  
    Swal.fire({
    type: 'success',
    title: 'Proses Pembayaran Anda Telah Berhasi!',
    text: 'Silahkan Tunggu Admin Kami Menghubungi Anda',
    timer: 2000,
    showCancelButton: false,
    showConfirmButton: false
}).then (function() {
  window.location.href = "riwayat.php";
});
  }



//   document.querySelector(".btn-booking").addEventListener('click', function(){
//     Swal.fire({
//     type: 'success',
//     title: 'Proses Pembayaran Anda Telah Berhasi!',
//     text: 'Silahkan Tunggu Admin Kami Menghubungi Anda',
//     timer: 2000,
//     showCancelButton: false,
//     showConfirmButton: false
// }).then (function() {
//   window.location.href = "riwayat.php";
// })
// });
</script>
<?php 

if (isset($_FILES["bukti"])) : 

$error = $_FILES["bukti"]["error"];
$namaFile = $_FILES["bukti"]["name"];
$ukuranFile = $_FILES["bukti"]["size"];
$tmpName = $_FILES["bukti"]["tmp_name"];

$eksValid = ["jpeg","jpg","png"];
$namaBaru = uniqid();
$eksFile = explode(".", $namaFile);
$eksFile = strtolower(end($eksFile));
$namaBaru .= ".$eksFile";
if ($error == 4) { 
    echo "<div class='alert alert-danger col-sm-6 mx-auto' role='role' style='width: 40rem;'>Bukti Belum Terkirim!</div>" ;
}
elseif (! in_array($eksFile, $eksValid)) {
    echo "<div class='alert alert-danger col-sm-6 mx-auto' role='role' style='width: 40rem; margin-top: 10px;'>Ekstensi Bukti Tidak Valid!</div>";
}
elseif ($ukuranFile >= 1000000) {
    echo "<div class='alert alert-danger col-sm-6 mx-auto' role='role' style='width: 40rem;'>Ukuran Bukti Terlalu Besar!</div>";
}
else {
move_uploaded_file($tmpName, "foto_bukti/" . $namaBaru);

mysqli_query($conn, "UPDATE pesanan SET bukti='$namaBaru',Pembayaran='Konfirmasi' WHERE id_pesanan='$id_pesanan'");
echo "<script>location = 'riwayat.php';</script>";
exit();
}
endif;

?>
<body>
<?php include "Penghubung/navbar.php" ?>
<div class="section">
    <div class="container">
    <button class="btn btn-info" style="margin-top: 20px;" onclick="history.back(-1)">Back</button>
        <div class="services">
            <div class="heading">
                <h1>Detail Pembelian</h1>
            </div>
        </div>
          
        <strong><h5></h5></strong>
        <h5>
            Nama Pelanggan: <?= $pesanan["nama_lengkap"] ?> <br>
            No. Telp Pelanggan: <?php echo $pesanan['nomor']; ?> <br>
            Email Pelanggan: <?php echo $pesanan['email']; ?>
        </h5>
            <br>
        <table class="table">
            <thead class="bg-info">
                <tr>
                <th class="align-middle text-center" scope="col">No</th>
                <th class="align-middle text-center" scope="col">Nama Paket</th>
                <th class="align-middle text-center" scope="col">Hotel</th>
                <th class="align-middle text-center" scope="col">Harga</th>
                <th class="align-middle text-center" scope="col">Jumlah</th>
                <th class="align-middle text-center" scope="col">Tanggal keberangkatan</th>
                <th class="align-middle text-center" scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                <tr>
                <th class="align-middle text-center"><?php echo $no; ?></th>
                <td class="align-middle text-center"><?= $pesanan["destinasi"] ?></td>
                <td class="align-middle text-center"><?= $pesanan["hotel"] ?></td>
                <td class="align-middle text-center">Rp. <?php echo number_format($pesanan['harga'])?></td>
                <td class="align-middle text-center"><?php echo $pesanan['jumlah']; ?> Orang</td>
                <td class="align-middle text-center"><?php echo $pesanan['tanggal']; ?></td>
                <td class="align-middle text-center">Rp. <?php echo number_format($pesanan['total'])?></td>
                </tr>
                <?php $no++; ?>
            </tbody>
        </table>
        <div class="alert alert-success" role="alert">
        Transfer ke No Rekening 0943283423 Atas Nama Teguh Rahmat Syahputra Sebesar Rp. <?php echo number_format($pesanan['total'])?>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
                        <label for="bukti" class="d-block fs-5 fw-bold" style="margin-top: 40px;">Kirim Bukti Pembayaran</label>
                        <input type="file" name="bukti" id="bukti" style="margin-bottom: 40px;">
                        <button class="btn btn-booking btn-block btn-primary" onclick="sweetAlert()">Bayar</button>
                    </form>
        </div>
    </div> 
</div>
<br>


    <footer class="footer-distributed">
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