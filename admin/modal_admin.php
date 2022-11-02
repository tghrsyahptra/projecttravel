<?php
    include "../koneksi.php";
	$id_user=$_GET['id_user'];
	$modal=mysqli_query($conn,"SELECT * FROM user WHERE id_user='$id_user'");
	while($r=mysqli_fetch_array($modal)){
?>

<div class="modal-dialog">
    <div class="modal-content">

		<div class="modal-header">
        <h5 class="modal-title">Data Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
        	<form id="form-update" action="edit_admin.php" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Nama</label>
                    <input type="hidden" name="id_user" id="edit-id"  class="form-control" value="<?php echo $r['id_user']; ?>" />
     				        <input type="text" name="nama_lengkap" id="edit-name" class="form-control" value="<?php echo $r['nama_lengkap']; ?>" disabled/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Username">Username</label>
     				      <input type="text" name="username" id="edit-name" class="form-control" value="<?php echo $r['username']; ?>"disabled/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Email">Email</label>
                  <input type="email" name="email" id="edit-email" class="form-control" value="<?php echo $r['email']; ?>"disabled/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Gender">Gender</label>
                  <input type="text" name="email" id="edit-gender" class="form-control" value="<?php echo $r['gender']; ?>"disabled/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Divisi">Role</label>
                  <input type="text" name="divisi" id="edit-divisi" class="form-control" value="<?php echo $r['role']; ?>"disabled/>
                </div>
	            <div class="modal-footer">
	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
	               		Close
	                </button>
	            </div>
            	</form>
             <?php } ?>
            </div>
        </div>
    </div>