<?php

include('../koneksi.php');

$nama_lengkap = $_POST['nama_lengkap'];
$email     = $_POST['email'];
$nomor     = $_POST['nomor'];
$nik     = $_POST['nik'];
$alamat     = $_POST['alamat'];
$destinasi     = $_POST['destinasi'];
$tanggal     = $_POST['tanggal'];
$jumlah     = $_POST['jumlah'];
$total     = $_POST['total'];


//query insert data ke dalam database
$query = "INSERT INTO pesanan (nama_lengkap, email, nomor, nik, alamat, destinasi, tanggal, jumlah, total) VALUES ('$nama_lengkap', '$email', '$nomor','$nik','$alamat','$destinasi','$tanggal','$jumlah','$total')";        

if($conn->query($query)) {
    echo "success";
} else {
    echo "error";
}