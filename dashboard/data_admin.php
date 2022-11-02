
<?php 
  //menampilkan data mysqli
  include "../koneksi.php";
  $no = 0;
  $modal=mysqli_query($conn,"SELECT * FROM pelanggan ORDER BY id_user DESC");
  while($r=mysqli_fetch_array($modal)){
  $no++;
?>
  <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo  $r['nama_lengkap']; ?></td>
      <td><?php echo  $r['email']; ?></td>
      <td><?php echo  $r['username']; ?></td>
      <td>
         <a href="javascript:void(0)" class='open_modal btn btn-info' id='<?php echo  $r['id_user']; ?>'>Lihat</a>
         <a href="javascript:void(0)" class="delete_modal btn btn-danger " data-id='<?php echo  $r['id_user']; ?>'>Delete</a>
      </td>
  </tr>
<?php } ?>




