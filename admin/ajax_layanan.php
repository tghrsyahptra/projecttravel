<?php 
//menampilkan data mysqli
include "../koneksi.php";
$no = 0;
$modal=mysqli_query($conn,"SELECT * FROM layanan ORDER BY id_layanan DESC");
while($r=mysqli_fetch_array($modal)){
$no++;
?>
<tr>
    <td class="align-middle text-center"><?php echo $no; ?></td>
    <td class="align-middle text-center"><?php echo  $r['nama_layanan']; ?></td>
    <td class="align-middle text-center">Rp. <?php echo number_format($r['harga_layanan']); ?></td>
    <td class="align-middle text-center"><?php echo  $r['lama_layanan']; ?> Hari</td>
    <td class="align-middle text-center"><?php echo  $r['desk']; ?></td>
    <td class="align-middle text-center"><a href="uploads/<?= $r["file_name"] ?>" class="lightbox">
        <img src="uploads/<?= $r["file_name"] ?>" alt="file_name" class="img-fluid image" width="150px">
    <td class="align-middle text-center">
      <a href="javascript:void(0)" class='open_modal btn btn-warning' id='<?php echo  $r['id_layanan']; ?>'><img src="https://img.icons8.com/material-rounded/24/ffffff/edit--v1.png"/></a>
      <a href="javascript:void(0)" class="delete_modal btn btn-danger" data-id='<?php echo  $r['id_layanan']; ?>'><img src="https://img.icons8.com/material-rounded/24/ffffff/delete-trash.png"/></a>
    </td>
</tr>
<?php } ?>