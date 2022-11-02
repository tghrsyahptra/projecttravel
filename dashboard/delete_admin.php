<?php
	include "../koneksi.php";
	$id_user=$_POST['id_user'];
	$query=mysqli_query($conn,"Delete FROM pelanggan WHERE id_user ='$id_user'");
	
	
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