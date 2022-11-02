<?php
	include "../koneksi.php";
	$id_pesanan=$_POST['id_pesanan'];
	$query=mysqli_query($conn,"Delete FROM pesanan WHERE id_pesanan ='$id_pesanan'");
	
	
	if($query) // jika insert data berhasil
	{
		// fungsi untuk membuat format json
		header('Content-Type: application/json');
		// untuk load data yang sudah ada dari tabel
		$content = file_get_contents('http://localhost/pkl/dashboard/ajax_data.php', true);
		$data = array('status'=>'success', 'data'=> $content);
		echo json_encode($data);
	}
	else // jika insert data gagal
	{
		$data = array('status'=>'failed', 'data'=> null);
		echo json_encode($data);
	}
	
?>