
<?php 
  //menampilkan data mysqli
  include "../koneksi.php";
  $no = 0;
  $modal=mysqli_query($conn,"SELECT * FROM pesanan ORDER BY id_pesanan DESC");
  while($r=mysqli_fetch_array($modal)){
  $no++;
?>
  <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo  $r['kode']; ?></td>
      <td><?php echo  $r['nama_lengkap']; ?></td>
      <td><?php echo  $r['email']; ?></td>
      <td><?php echo  $r['nomor']; ?></td>
      <td><?php echo  $r['destinasi']; ?></td>
      <td><?php echo  $r['tanggal']; ?></td>
      <td><?php echo  $r['jumlah']; ?> Orang</td>
      <td>Rp.<?php echo number_format($r['total']); ?></td>
      <td>
         <a href="javascript:void(0)" class='open_modal btn btn-success' id='<?php echo  $r['id_pesanan']; ?>'>Edit</a>
         <a href="javascript:void(0)" class="delete_modal btn btn-danger " data-id='<?php echo  $r['id_pesanan']; ?>'>Delete</a>
      </td>
  </tr>
 
<?php } ?>




