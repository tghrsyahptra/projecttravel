<?php
	include "../koneksi.php";
	$id=$_POST['id_layanan'];
	$nama_layanan = $_POST['nama_layanan'];
	$harga_layanan = $_POST['harga_layanan'];
	$lama_layanan = $_POST['lama_layanan'];
	$desk = $_POST['desk'];
	$hari1 = $_POST['hari1'];
	$desk1 = $_POST['desk1'];
	$hari2 = $_POST['hari2'];
	$desk2 = $_POST['desk2'];
	$hari3 = $_POST['hari3'];
	$desk3 = $_POST['desk3'];
	$hari4 = $_POST['hari4'];
	$desk4 = $_POST['desk4'];
	$inc1 = $_POST['inc1'];
	$inc2 = $_POST['inc2'];
	$inc3 = $_POST['inc3'];
	$inc4 = $_POST['inc4'];
	$inc5 = $_POST['inc5'];
	$inc6 = $_POST['inc6'];
	$inc7 = $_POST['inc7'];
	$hotel1 = $_POST['hotel1'];
	$hotel2 = $_POST['hotel2'];
	$hotel3 = $_POST['hotel3'];
	$harga1 = $_POST['harga1'];
	$harga2 = $_POST['harga2'];
	$harga3 = $_POST['harga3'];
	$harga4 = $_POST['harga4'];
	$query=mysqli_query($conn,"UPDATE layanan SET
													 nama_layanan = '$nama_layanan',
													 harga_layanan = '$harga_layanan',
													 lama_layanan = '$lama_layanan',
													 desk = '$desk',
													 hari1 = '$hari1',
													 desk1 = '$desk1',
													 hari2 = '$hari2',
													 desk2 = '$desk2',
													 hari3 = '$hari3',
													 desk3 = '$desk3',
													 hari4 = '$hari4',
													 desk4 = '$desk4',
													 inc1 = '$inc1',
													 inc2 = '$inc2',
													 inc3 = '$inc3',
													 inc4 = '$inc4',
													 inc5 = '$inc5',
													 inc6 = '$inc6',
													 inc7 = '$inc7',
													 hotel1 = '$hotel1',
													 hotel2 = '$hotel2',
													 hotel3 = '$hotel3',
													 harga1 = '$harga1',
													 harga2 = '$harga2',
													 harga3 = '$harga3',
													 harga4 = '$harga4'
													WHERE id_layanan = '$id'");
	
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