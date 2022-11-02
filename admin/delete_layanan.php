<?php
	include "../koneksi.php";
	$id_layanan=$_POST['id_layanan'];
	$query=mysqli_query($conn,"DELETE FROM layanan WHERE id_layanan ='$id_layanan'");
	
	
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