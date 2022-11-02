<?php

include('koneksi.php');

$nama_lengkap = $_POST['nama_lengkap'];
$username     = $_POST['username'];
$email     = $_POST['email'];
$nomor     = $_POST['nomor'];
$nik     = $_POST['nik'];
$password     = $_POST['password'];
// $password = md5($_POST['password']);
$gender     = $_POST['gender'];
$alamat     = $_POST['alamat'];
$otp    = mt_rand(1111, 9999);

//query insert data ke dalam database
$query = "INSERT INTO user (nama_lengkap, username, email,nomor,nik, password,gender,alamat,role,otp) VALUES ('$nama_lengkap', '$username', '$email','$nomor','$nik', '$password', '$gender', '$alamat', 'client', '$otp')";        

if(mysqli_query($conn, $query)) {
    echo "success";
} else {
    echo "error";
}