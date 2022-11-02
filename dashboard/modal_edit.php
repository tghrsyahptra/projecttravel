<?php
    include "../koneksi.php";
	$id_pesanan=$_GET['id_pesanan'];
	$modal=mysqli_query($conn,"SELECT * FROM pesanan WHERE id_pesanan='$id_pesanan'");
	while($r=mysqli_fetch_array($modal)){
?>

<div class="modal-dialog">
    <div class="modal-content">

		<div class="modal-header">
        <h5 class="modal-title">Edit Data Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
        	<form id="form-update" action="proses_edit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Name">Nama Lengkap</label>
                    <input type="hidden" name="id_pesanan" id="edit-id"  class="form-control" value="<?php echo $r['id_pesanan']; ?>" />
     				        <input type="text" name="nama_lengkap" id="edit-name" class="form-control" value="<?php echo $r['nama_lengkap']; ?>"/>
                </div> 
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Email">Email</label>
     				      <input type="email" name="email" id="edit-email" class="form-control" value="<?php echo $r['email']; ?>"/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Email">Nomor Telp</label>
     				      <input type="text" name="nomor" id="edit-nomor" class="form-control" value="<?php echo $r['nomor']; ?>"/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="nik">NIK</label>
     				      <input type="text" name="nik" id="edit-nik" class="form-control" value="<?php echo $r['nik']; ?>"/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="alamat">Alamat</label>
     				      <input type="text" name="nik" id="edit-alamat" class="form-control" value="<?php echo $r['alamat']; ?>"/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="destinasi">Destinasi</label>
     				      <input type="text" name="destinasi" id="edit-destinasi" class="form-control" value="<?php echo $r['destinasi']; ?>"/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="tanggal">Tanggal Keberangkatan</label>
     				      <input type="text" name="tanggal" id="edit-tanggal" class="form-control" value="<?php echo $r['tanggal']; ?>"/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="jumlah">Jumlah Peserta</label>
     				      <input type="text" name="jumlah" id="edit-jumlah" class="form-control" value="<?php echo $r['jumlah']; ?>"/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="total">Total Biaya</label>
     				      <input type="text" name="total" id="edit-total" class="form-control" value="<?php echo $r['total']; ?>" disabled/>
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