<?php
//memasukkan file config.php
include("../koneksi.php");

//mendefinisikan folder upload
define("UPLOAD_DIR", "uploads/");

if (!empty($_FILES["media"])) {
	$media	= $_FILES["media"];
	$ext	= pathinfo($_FILES["media"]["name"], PATHINFO_EXTENSION);
	$size	= $_FILES["media"]["size"];
	$tgl	= date("Y-m-d");

	if ($media["error"] !== UPLOAD_ERR_OK) {
		echo '<div class="alert alert-warning">Gagal upload file.</div>';
		exit;
	}

	// filename yang aman
	$name = preg_replace("/[^A-Z0-9._-]/i", "_", $media["name"]);

	// mencegah overwrite filename
	$i = 0;
	$parts = pathinfo($name);
	while (file_exists(UPLOAD_DIR . $name)) {
		$i++;
		$name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
	}

	$success = move_uploaded_file($media["tmp_name"], UPLOAD_DIR . $name);
	if ($success) { 
		header('Content-Type: application/json');
		// untuk load data yang sudah ada dari tabel
		$content = file_get_contents('http://localhost/projecttravel/admin/ajax_layanan.php', true);
		$data = array('status'=>'success', 'data'=> $content);
		echo json_encode($data);
		
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

		$query = mysqli_query($conn,"INSERT INTO layanan (nama_layanan,harga_layanan,lama_layanan,desk,tgl_upload, file_name, file_size, file_type,hari1,desk1,hari2,desk2,hari3,desk3,hari4,desk4,inc1,inc2,inc3,inc4,inc5,inc6,inc7,hotel1,hotel2,hotel3,harga1,harga2,harga3,harga4) VALUES ('$nama_layanan','$harga_layanan','$lama_layanan','$desk','$tgl','$name','$size','$ext','$hari1','$desk1','$hari2','$desk2','$hari3','$desk3','$hari4','$desk4','$inc1','$inc2','$inc3','$inc4','$inc5','$inc6','$inc7','$hotel1','$hotel2','$hotel3','$harga1','$harga2','$harga3','$harga4')");

		
		
	}
	else // jika insert data gagal
		{
			$data = array('status'=>'failed', 'data'=> null);
			echo json_encode($data);
		}
	chmod(UPLOAD_DIR . $name, 0644);
}




?>
