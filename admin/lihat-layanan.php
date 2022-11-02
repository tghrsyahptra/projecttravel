<?php
    include "../koneksi.php";
	$id_layanan=$_GET['id_layanan'];
	$modal=mysqli_query($conn,"SELECT * FROM layanan WHERE id_layanan='$id_layanan'");
	while($r=mysqli_fetch_array($modal)){
?>
<div class="modal-dialog">
    <div class="modal-content">
		<div class="modal-header">
        <h5 class="modal-title">Edit Data layanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
        	<form id="form-update" action="proses_edit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Name">Nama Layanan</label>
                    <input type="hidden" name="id_layanan" id="edit-id"  class="form-control" value="<?php echo $r['id_layanan']; ?>" />
     				        <input type="text" name="nama_layanan" id="edit-name" class="form-control" value="<?php echo $r['nama_layanan']; ?>"readonly/>
                </div> 
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="harga">Harga Layanan</label>
     				      <input type="text" name="harga" id="edit-harga" class="form-control" value="<?php echo $r['harga_layanan']; ?>"readonly/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="lama">Durasi Layanan</label>
     				      <input type="text" name="lama" id="edit-lama" class="form-control" value="<?php echo $r['lama_layanan']; ?>"readonly/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="desk">Deskripsi</label>
     				      <input type="text" name="desk" id="edit-desk" class="form-control" value="<?php echo $r['desk']; ?>"readonly/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hari1">Hari 1</label>
                   <textarea name="hari1" id="edit-hari1" class="form-control" readonly><?php echo $r['hari1']; ?></textarea>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="desk1">Desk Hari 1</label>
                   <textarea name="desk1" id="edit-desk1" class="form-control" readonly><?php echo $r['desk1']; ?></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hari2">Hari 2</label>
                   <textarea name="hari2" id="edit-hari2" class="form-control" readonly><?php echo $r['hari2']; ?></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="desk2">Desk Hari 2</label>
                   <textarea name="desk2" id="edit-desk2" class="form-control" readonly><?php echo $r['desk2']; ?></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hari3">Hari 3</label>
                   <textarea name="hari3" id="edit-hari3" class="form-control" readonly><?php echo $r['hari3']; ?></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="desk3">Desk Hari 3</label>
                   <textarea name="desk3" id="edit-desk3" class="form-control" readonly><?php echo $r['desk3']; ?></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hari4">Hari 4</label>
                   <textarea name="hari4" id="edit-hari4" class="form-control" readonly><?php echo $r['hari4']; ?></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="desk4">Desk Hari 4</label>
                   <textarea name="desk4" id="edit-desk4" class="form-control" readonly ><?php echo $r['desk4']; ?></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="inc1">Include 1</label>
                   <textarea name="inc1" id="edit-inc1" class="form-control" readonly ><?php echo $r['inc1']; ?></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="inc2">Include 2</label>
                   <textarea name="inc2" id="edit-inc2" class="form-control" readonly ><?php echo $r['inc2']; ?></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="inc3">Include 3</label>
                   <textarea name="inc3" id="edit-inc3" class="form-control" readonly ><?php echo $r['inc3']; ?></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="inc4">Include 4</label>
                   <textarea name="inc4" id="edit-inc4" class="form-control" readonly ><?php echo $r['inc4']; ?></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="inc5">Include 5</label>
                   <textarea name="inc5" id="edit-inc5" class="form-control" readonly ><?php echo $r['inc5']; ?></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="inc6">Include 6</label>
                   <textarea name="inc6" id="edit-inc6" class="form-control" readonly ><?php echo $r['inc6']; ?></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="inc7">Include 7</label>
                   <textarea name="inc7" id="edit-inc7" class="form-control" readonly ><?php echo $r['inc7']; ?> </textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hotel1">Hotel 1</label>
                  <input type="text" name="hotel1"  id="edit-hotel1" class="form-control" value="<?php echo $r['hotel1']; ?>" readonly />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hotel2">Hotel 2</label>
                  <input type="text" name="hotel2"  id="edit-hotel2" class="form-control" value="<?php echo $r['hotel2']; ?>" readonly />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hotel3">Hotel 3</label>
                  <input type="text" name="hotel3"  id="edit-hotel3" class="form-control" value="<?php echo $r['hotel3']; ?>" readonly />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="harga1">Harga 1</label>
                  <input type="text" name="harga1"  id="edit-harga1" class="form-control" value="<?php echo $r['harga1']; ?>" readonly />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="harga2">Harga 2</label>
                  <input type="text" name="harga2"  id="edit-harga2" class="form-control" value="<?php echo $r['harga2']; ?>" readonly />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="harga3">Harga 3</label>
                  <input type="text" name="harga3"  id="edit-harga3" class="form-control" value="<?php echo $r['harga3']; ?>" readonly/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="harga4">Harga 4</label>
                  <input type="text" name="harga4"  id="edit-harga4" class="form-control" value="<?php echo $r['harga4']; ?>" />
                </div>
	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit">
	                    Update
	                </button>
	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
	               		Cancel
	                </button>
	            </div>
            	</form>
             <?php } ?>
            </div>
        </div>
    </div>