<?php
include "../koneksi.php";
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$nomor = $_POST['nomor'];
$nik = $_POST['nik'];
$alamat = $_POST['alamat'];
$destinasi = $_POST['destinasi'];
$tanggal = $_POST['tanggal'];
$jumlah = $_POST['jumlah'];
$total = $_POST['total'];

$query = mysqli_query($koneksi,"INSERT INTO pesanan (nama_lengkap,email,nomor,nik,alamat,destinasi,tanggal,jumlah,total) VALUES ('$nama_lengkap','$email','$nomor','$nik','$alamat','$destinasi','$tanggal','$jumlah','$total')");

if($query) // jika insert data berhasil
{
	// fungsi untuk membuat format json
	header('Content-Type: application/json');
	// untuk load data yang sudah ada dari tabel
	$content = file_get_contents('http://localhost/modalajax/ajax_data.php', true);
	$data = array('status'=>'success', 'data'=> $content);
	echo json_encode($data);
}
else // jika insert data gagal
{
	$data = array('status'=>'failed', 'data'=> null);
	echo json_encode($data);
}

?>