


<?php
include "../koneksi.php";
$nama_layanan = $_POST['nama_layanan'];
$harga_layanan = $_POST['harga_layanan'];
$lama_layanan = $_POST['lama_layanan'];
$desk = $_POST['desk'];
$foto_layanan = $_POST['foto_layanan'];


$query = mysqli_query($conn,"INSERT INTO layanan (nama_layanan,harga_layanan,lama_layanan,desk,foto_layanan) VALUES ('$nama_layanan','$harga_layanan','$lama_layanan','$desk','$foto_layanan')");

if($query) // jika insert data berhasil
{
	// fungsi untuk membuat format json
	header('Content-Type: application/json');
	// untuk load data yang sudah ada dari tabel
	$content = file_get_contents('http://localhost/projecttravel/admin/ajax_layanan.php', true);
	$data = array('status'=>'success', 'data'=> $content);
	echo json_encode($data);
}
else // jika insert data gagal
{
	$data = array('status'=>'failed', 'data'=> null);
	echo json_encode($data);
}

?>
