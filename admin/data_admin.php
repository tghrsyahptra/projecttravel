<?php 
            //menampilkan data mysqli
            include "../koneksi.php";
            $no = 0;
            $modal=mysqli_query($conn,"SELECT * FROM user ORDER BY id_user DESC");
            while($r=mysqli_fetch_array($modal)){
            $no++;    
          ?>
            <tr>
                <td class="align-middle text-center"><?php echo $no; ?></td>
                <td class="align-middle text-center"><?php echo  $r['nama_lengkap']; ?></td>
                <td class="align-middle text-center"><?php echo  $r['email']; ?></td>
                <td class="align-middle text-center"><?php echo  $r['username']; ?></td>
                <td class="align-middle text-center">
                <a href="javascript:void(0)" class='lihat_modal btn btn-info'  id='<?php echo  $r['id_pesanan']; ?>'><img src="https://img.icons8.com/material-outlined/24/ffffff/file-preview.png"/></a>
                <a href="javascript:void(0)" class="delete_modal btn btn-danger" data-id='<?php echo  $r['id_pesanan']; ?>'><img src="https://img.icons8.com/material-rounded/24/ffffff/delete-trash.png"/></a>
                </td>
            </tr>
          <?php } ?>