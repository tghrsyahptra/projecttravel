<?php
session_start();
include('koneksi.php');
// $username     = $_POST['username'];
// // // $password      = $_POST['password'];
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
// $password = md5($password);
// $nik     = $_POST['nik'];
// $password = md5($_POST['password']);

//query
$query  = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result     = mysqli_query($conn, $query);
$num_row     = mysqli_num_rows($result);
$row         = mysqli_fetch_array($result);

if($num_row >=1) {
    
    $_SESSION['id_user']       = $row['id_user'];
    $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
    $_SESSION['username']       = $row['username'];
    $_SESSION['email']       = $row['email'];
    $_SESSION['nomor']       = $row['nomor'];
    $_SESSION['nik']       = $row['nik'];
    $_SESSION['alamat']       = $row['alamat'];
    $_SESSION['role']       = $row['role'];
    // header("location:dashboard/index.php");
    echo ($row["role"] == "admin") ? "admin" : "client";
} else { 
    echo "error";
}
?>