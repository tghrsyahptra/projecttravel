<?php 
//menampilkan data mysqli
include "../koneksi.php";
$no = 0;
$modal=mysqli_query($conn,"SELECT * FROM pesanan ORDER BY id_pesanan DESC");
while($r=mysqli_fetch_array($modal)){
$no++;
?>
<tr>
    <!-- <td class="align-middle text-center"><?php echo  $no ?></td> -->
    <td class="align-middle text-center"><?php echo  $r['kode']; ?></td>
    <td class="align-middle text-center"><?php echo  $r['nama_lengkap']; ?></td>
    <td class="align-middle text-center"><?php echo  $r['nomor']; ?></td>
    <td class="align-middle text-center"><?php echo  $r['destinasi']; ?></td>
    <td class="align-middle text-center"><?php echo  $r['hotel']; ?></td>
    <td class="align-middle text-center"><?php echo  $r['tanggal']; ?></td>
    <td class="align-middle text-center"><?php echo  $r['jumlah']; ?> Orang</td>
    <td class="align-middle text-center">Rp.<?php echo number_format($r['total']); ?></td>
        <td class="align-middle text-center"><a href="../foto_bukti/<?= $r["bukti"] ?>" class="lightbox">
            <img src="../foto_bukti/<?= $r["bukti"] ?>" alt="bukti" class="img-fluid image" width="150px">
        </a></td>
    <td class="align-middle text-center">
            <form action="" method="post">
            <input type="text" class="d-none" name="confirm" value="<?= $r["id_pesanan"] ?>">
            <?php if ($r["pembayaran"] == "Konfirmasi" && $_SESSION["role"] == "admin" ) { ?>
                <?=   "<div class='d-flex'><button type='submit' name='btn' value='Lunas' class='btn btn-success' style='margin-right: 10px;'> Lunas </button>
                                    <button type='submit' class='btn btn-danger' name='btn' value='Cancel'> Cancel </button></div>";?>
            <?php } 
                elseif ($r["pembayaran"] == "Konfirmasi" && $_SESSION["role"] == "client" ) { ?>
                <div class="alert alert-warning">Konfirmasi</div>
            <?php    }
            ?>
            </form>
            <?php if ($r["pembayaran"] == "Lunas") : ?> 
            <div class="alert alert-success">Lunas</div>
            <?php endif; ?>
            <?php if ($r["pembayaran"] == "Cancel") : ?> 
            <div class="alert alert-danger">Cancel</div>
            <?php endif; ?>
        </td>  
    <td class="align-middle text-center">
    <a href="javascript:void(0)" class='lihat_modal btn btn-info'  id='<?php echo  $r['id_pesanan']; ?>'><img src="https://img.icons8.com/material-outlined/24/ffffff/file-preview.png"/></a>
    <a href="javascript:void(0)" class='open_modal btn btn-warning' id='<?php echo  $r['id_pesanan']; ?>'><img src="https://img.icons8.com/material-rounded/24/ffffff/edit--v1.png"/></a>
    <a href="javascript:void(0)" class="delete_modal btn btn-danger" data-id='<?php echo  $r['id_pesanan']; ?>'><img src="https://img.icons8.com/material-rounded/24/ffffff/delete-trash.png"/></a>
    </td>
</tr>
<?php } ?>
