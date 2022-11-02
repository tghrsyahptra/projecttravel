<?php
session_start();
include('koneksi.php');


$nama_lengkap = $_POST['nama_lengkap'];
$email     = $_POST['email'];
$nomor     = $_POST['nomor'];
$nik     = $_POST['nik'];
$alamat     = $_POST['alamat'];
$destinasi     = $_POST['destinasi'];
$tanggal     = $_POST['tanggal'];
$jumlah     = $_POST['jumlah'];
$harga     = $_POST["harga"];
$hotel     = $_POST["hotel"];
$total     = $_POST['total'];
$id_user = $_POST["id_user"];
$huruf = "JLN";
$kode    = $huruf . mt_rand(1111, 9999);


//query insert data ke dalam database
$query = "INSERT INTO pesanan (id_user,nama_lengkap, email, nomor, nik, alamat, destinasi, tanggal, harga,hotel, jumlah,total,pembayaran,kode) VALUES ('$id_user','$nama_lengkap', '$email', '$nomor','$nik','$alamat','$destinasi','$tanggal', '$harga', '$hotel', '$jumlah','$total','Diproses','$kode')";        

if($conn->query($query)) {
    echo "success";
} else {
    echo "error";
}