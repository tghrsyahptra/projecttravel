<?php

include('koneksi.php');

//query insert data ke dalam database
$query = "UPDATE pesanan SET bukti='$namaBaru',Pembayaran='Konfirmasi' WHERE id_pesanan='$id_pesanan'";        

if(mysqli_query($conn, $query)) {
    echo "success";
} else {
    echo "error";
}