<?php
	include "../koneksi.php";
	$id=$_POST['id_user'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query=mysqli_query($conn,"UPDATE pelanggan SET
													 nama_lengkap = '$nama_lengkap',
													 email = '$email',
													 username = '$username',						
													 password = '$password'						
													WHERE id_user = '$id'");
	
	if($query) // jika insert data berhasil
	{
		// fungsi untuk membuat format json
		header('Content-Type: application/json');
		// untuk load data yang sudah ada dari tabel
		$content = file_get_contents('http://localhost/pkl/dashboard/data_admin.php', true);
		$data = array('status'=>'success', 'data'=> $content);
		echo json_encode($data);
	}
	else // jika insert data gagal
	{
		$data = array('status'=>'failed', 'data'=> null);
		echo json_encode($data);
	}
?>