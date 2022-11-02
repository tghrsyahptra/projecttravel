<?php
	include "../koneksi.php";
	$id=$_POST['id_user'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$nomor = $_POST['nomor'];
	$nik = $_POST['nik'];
	$alamat = $_POST['alamat'];
	$query=mysqli_query($conn,"UPDATE user SET
													 nama_lengkap = '$nama_lengkap',
													 username = '$username',
													 email = '$email',
													 nomor = '$nomor',
													 nik = '$nik',
													 alamat = '$alamat'
													WHERE id_user = '$id'");
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