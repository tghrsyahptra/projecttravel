<?php
	include "../koneksi.php";
	$id=$_POST['id_pesanan'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$email = $_POST['email'];
	$nomor = $_POST['nomor'];
	$nik = $_POST['nik'];
	$alamat = $_POST['alamat'];
	$destinasi = $_POST['destinasi'];
	$tanggal = $_POST['tanggal'];
	$jumlah = $_POST['jumlah'];
	$total = $_POST['total'];
	$query=mysqli_query($conn,"UPDATE pesanan SET
													 nama_lengkap = '$nama_lengkap',
													 email = '$email',
													 nomor = '$nomor',
													 nik = '$nik',
													 alamat = '$alamat',
													 destinasi = '$destinasi',
													 tanggal = '$tanggal',
													 jumlah = '$jumlah',
													 total = '$total'
													WHERE id_pesanan = '$id'");
	
	if($query) // jika insert data berhasil
	{
		// fungsi untuk membuat format json
		header('Content-Type: application/json');
		// untuk load data yang sudah ada dari tabel
		$content = file_get_contents('http://localhost/projecttravel/admin/ajax_data.php', true);
		$data = array('status'=>'success', 'data'=> $content);
		echo json_encode($data);
	}
	else // jika insert data gagal
	{
		$data = array('status'=>'failed', 'data'=> null);
		echo json_encode($data);
	}
?>