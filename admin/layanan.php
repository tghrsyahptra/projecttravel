<?php
session_start();
if (!isset($_SESSION['id_user'])|| !isset($_SESSION['nama_lengkap'])|| !isset($_SESSION['username']))
{
  echo "<script>alert('silakan login terlebih dahulu');</script>";
  echo "<script>location = '../login.php';</script>";
  exit();
}
if ($_SESSION["role"] == "client") {
  echo "<script>alert('Anda tidak berhak mengakses halaman ini !!!');</script>";
  echo "<script>location = '../index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="harga_layanan" content="" />
    <meta name="author" content="" />
    <title>Daftar Layanan</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Untuk datatable -->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css" />
    <script type="text/javascript" src="datatables/datatables.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#datatable').DataTable();
      });
    </script>
  </head>
  <body>
    <div class="d-flex" id="wrapper">
      <!-- Sidebar-->
      <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-info">PergiTravelling</div>
        <div class="list-group list-group-flush">
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard.php">Pesanan</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="daftar_user.php">Daftar User</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="layanan.php">Layanan</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="profil.php">Profile</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../logout.php">Logout</a>
        </div>
      </div>
      <!-- Page content wrapper-->
      <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-info bg-info border-bottom">
          <div class="container-fluid">
            <button class="btn btn-info" id="sidebarToggle">Toggle Menu</button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="admin">Halo Admin <?php echo  $_SESSION['username']; ?></div>
          </div>
        </nav>
        <!-- Page content-->
        <div class="container-fluid">
            <div class="condtainer" style="margin-top: 7px">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <!-- <div class="card-header border-bottom bg-info">
                        Daftar Layanan
                      </div> -->
                      <div class="card-body">
                      <p class="text-right"><a href="javascript.void(0)" class="btn btn-success" data-target="#ModalAdd" data-toggle="modal">Add Data</a></p>
                      <table id="datatable" class="table table-bordered">
          <thead>
            <th class="align-middle text-center">No</th>
            <th class="align-middle text-center">Nama Layanan</th>
            <th class="align-middle text-center">Harga Layanan</th>
            <th class="align-middle text-center">Durasi Layanan</th>
            <th class="align-middle text-center">Deskripsi Layanan</th>
            <th class="align-middle text-center">Foto</th>
            <th class="align-middle text-center">Aksi</th>
          </thead>
          <tbody id="modal-data">
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
                <td class="align-middle text-center">Rp.<?php echo number_format($r['harga_layanan']); ?></td>
                <td class="align-middle text-center"><?php echo  $r['lama_layanan']; ?></td>
                <td class="align-middle text-center"><?php echo  $r['desk']; ?></td>
                <td class="align-middle text-center"><a href="uploads/<?= $r["file_name"] ?>" class="lightbox">
                    <img src="uploads/<?= $r["file_name"] ?>" alt="file_name" class="img-fluid image" width="150px">
                </td>
                <td class="align-middle text-center">
                  <a href="javascript:void(0)" class='open_modal btn btn-warning' id='<?php echo  $r['id_layanan']; ?>'><img src="https://img.icons8.com/material-rounded/24/ffffff/edit--v1.png"/></a>
                  <a href="javascript:void(0)" class="delete_modal btn btn-danger" data-id='<?php echo  $r['id_layanan']; ?>'><img src="https://img.icons8.com/material-rounded/24/ffffff/delete-trash.png"/></a>
                </td>
            </tr>
          <?php } ?>
          </tbody>
          </table>
          </div>

<!-- Modal Popup untuk Add--> 
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Add Data Using Modal Boostrap (popup)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
          <form id="form-save" action="" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="nama_layanan">Nama Layanan</label>
                  <input type="text" name="nama_layanan"  id="nama_layanan" class="form-control" placeholder="Nama Layanan" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="harga_layanan">Harga Layanan</label>
                  <input type="text" name="harga_layanan"  id="harga_layanan" class="form-control" placeholder="Harga Layanan" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="lama_layanan">Durasi Layanan</label>
                  <input type="text" name="lama_layanan"  id="lama_layanan" class="form-control" placeholder="Durasi Layanan" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="desk">Deskripsi Layanan</label>
                   <textarea name="desk" id="desk" class="form-control" placeholder="Deskripsi Layanan" required></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="media">Foto</label>
                   <input type="file" name="media" id="media" class="form-control" required />
                  <!-- <input type="submit" class="btn btn-info" value="Start Upload" id="btn_upload" />    -->
                </div>
                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hari1">Hari 1</label>
                   <textarea name="hari1" id="hari1" class="form-control" placeholder="Deskripsi Layanan" ></textarea>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="desk1">Desk Hari 1</label>
                   <textarea name="desk1" id="desk1" class="form-control" placeholder="Deskripsi Layanan" ></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hari2">Hari 2</label>
                   <textarea name="hari2" id="hari2" class="form-control" placeholder="Deskripsi Layanan" ></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="desk2">Desk Hari 2</label>
                   <textarea name="desk2" id="desk2" class="form-control" placeholder="Deskripsi Layanan" ></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hari3">Hari 3</label>
                   <textarea name="hari3" id="hari3" class="form-control" placeholder="Deskripsi Layanan" ></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="desk3">Desk Hari 3</label>
                   <textarea name="desk3" id="desk3" class="form-control" placeholder="Deskripsi Layanan" ></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hari4">Hari 4</label>
                   <textarea name="hari4" id="hari4" class="form-control" placeholder="Deskripsi Layanan" ></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="desk4">Desk Hari 4</label>
                   <textarea name="desk4" id="desk4" class="form-control" placeholder="Deskripsi Layanan" ></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="inc1">Include 1</label>
                   <textarea name="inc1" id="inc1" class="form-control" placeholder="Deskripsi Layanan" ></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="inc2">Include 2</label>
                   <textarea name="inc2" id="inc2" class="form-control" placeholder="Deskripsi Layanan" ></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="inc3">Include 3</label>
                   <textarea name="inc3" id="inc3" class="form-control" placeholder="Deskripsi Layanan" ></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="inc4">Include 4</label>
                   <textarea name="inc4" id="inc4" class="form-control" placeholder="Deskripsi Layanan" ></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="inc5">Include 5</label>
                   <textarea name="inc5" id="inc5" class="form-control" placeholder="Deskripsi Layanan" ></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="inc6">Include 6</label>
                   <textarea name="inc6" id="inc6" class="form-control" placeholder="Deskripsi Layanan" ></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="inc7">Include 7</label>
                   <textarea name="inc7" id="inc7" class="form-control" placeholder="Deskripsi Layanan" ></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hotel1">Hotel 1</label>
                  <input type="text" name="hotel1"  id="hotel1" class="form-control" placeholder="Nama Layanan" />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hotel2">Hotel 2</label>
                  <input type="text" name="hotel2"  id="hotel2" class="form-control" placeholder="Nama Layanan" />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="hotel3">Hotel 3</label>
                  <input type="text" name="hotel3"  id="hotel3" class="form-control" placeholder="Nama Layanan" />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="harga1">Harga 1</label>
                  <input type="text" name="harga1"  id="harga1" class="form-control" placeholder="Nama Layanan" />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="harga2">Harga 2</label>
                  <input type="text" name="harga2"  id="harga2" class="form-control" placeholder="Nama Layanan" />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="harga3">Harga 3</label>
                  <input type="text" name="harga3"  id="harga3" class="form-control" placeholder="Nama Layanan" />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="harga4">Harga 4</label>
                  <input type="text" name="harga4"  id="harga4" class="form-control" placeholder="Nama Layanan" />
                </div>

              <div class="modal-footer">
                  <button class="btn btn-success" type="submit" value="Start upload">
                      Save
                  </button>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    Cancel
                  </button>
              </div>
              </form>
            </div>
        </div>
       
    </div>
</div>

<!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<div id="ModalLihat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>

<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
       <div class="modal-header">
        <h5 class="modal-title">Are you sure to delete this data ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
 $(document).ready(function () {
   $('#datatable').on('click', '.open_modal', function(e){
       var m = $(this).attr("id");
		   $.ajax({
    			   url: "modal_layanan.php",
    			   type: "GET",
    			   data : {id_layanan: m,},
    			   success: function (ajaxData){
      			   $("#ModalEdit").html(ajaxData);
      			   $("#ModalEdit").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
    });
</script>

<!-- Javascript untuk popup modal Lihat--> 
<script type="text/javascript">
  $(document).ready(function () {
    $('#datatable').on('click', '.lihat_modal', function(e){
        var m = $(this).attr("id");
        $.ajax({
              url: "lihat_layanan.php",
              type: "GET",
              data : {id_layanan: m,},
              success: function (ajaxData){
                $("#ModalLihat").html(ajaxData);
                $("#ModalLihat").modal('show',{backdrop: 'true'});
              }
            });
        });
    });
</script>

<!-- <script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script> -->
<script src="js/upload.js"></script>
  <script>
	$(function() {
	  $(document).on('change', ':file', function() {
		var input = $(this),
			numFiles = input.get(0).files ? input.get(0).files.length : 1,
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [numFiles, label]);
	  });

	  $(document).ready( function() {
		  $(':file').on('fileselect', function(event, numFiles, label) {

			  var input = $(this).parents('.input-group').find(':text'),
				  log = numFiles > 1 ? numFiles + ' files selected' : label;

			  if( input.length ) {
				  input.val(log);
			  } else {
				  if( log ) alert(log);
			  }

		  });
	  });
	  
	});
	</script>

<!-- Ajax untuk menyimpan data--> 
<script type="text/javascript">
    $('body').on('submit','#form-save', function(e){
		e.preventDefault();
		$.ajax({
			method:  $(this).attr("method"), // untuk mendapatkan attribut method pada form
			url: "upload.php",
			data: { 
				nama_layanan: $('#nama_layanan').val(),
				harga_layanan: $('#harga_layanan').val(),
				lama_layanan: $('#lama_layanan').val(),
				desk: $('#desk').val(),
				file_name: $('#file_name').val(),
				hari1: $('#hari1').val(),
        desk1: $('#desk1').val(),
				hari2: $('#hari2').val(),
        desk2: $('#desk2').val(),
				hari3: $('#hari3').val(),
        desk3: $('#desk3').val(),
				hari4: $('#hari4').val(),
        desk4: $('#desk4').val(),
				inc1: $('#inc1').val(),
				inc2: $('#inc2').val(),
				inc3: $('#inc3').val(),
				inc4: $('#inc4').val(),
				inc5: $('#inc5').val(),
				inc6: $('#inc6').val(),
				inc7: $('#inc7').val(),
				hotel1: $('#hotel1').val(),
				hotel2: $('#hotel2').val(),
				hotel3: $('#hotel3').val(),
				harga1: $('#harga1').val(),
				harga2: $('#harga2').val(),
				harga3: $('#harga3').val(),
				harga4: $('#harga4').val(),
			},
			success:function(response){
				console.log(response);
				$("#modal-data").empty();
				$("#modal-data").html(response.data);
				$("#ModalAdd").modal('hide');
				$(".modal-backdrop").hide();
			},
			error: function(e)
			{
				// Error function here
			},
			beforeSend:function(b){
				// Before function here
			}
		})
		.done(function(d) {
			// When ajax finished
		});
	});
</script>

<!-- Ajax untuk update data--> 
<script type="text/javascript">
    $('body').on('submit','#form-update', function(e){
		e.preventDefault();
		$.ajax({
			method:  $(this).attr("method"), // untuk mendapatkan attribut method pada form
			url: "update_layanan.php",
			data: { 
				id_layanan: $('#edit-id').val(),
				nama_layanan: $('#edit-name').val(),
				harga_layanan: $('#edit-harga').val(),
				lama_layanan: $('#edit-lama').val(),
				desk: $('#edit-desk').val(),
				hari1: $('#edit-hari1').val(),
        desk1: $('#edit-desk1').val(),
				hari2: $('#edit-hari2').val(),
        desk2: $('#edit-desk2').val(),
				hari3: $('#edit-hari3').val(),
        desk3: $('#edit-desk3').val(),
				hari4: $('#edit-hari4').val(),
        desk4: $('#edit-desk4').val(),
				inc1: $('#edit-inc1').val(),
				inc2: $('#edit-inc2').val(),
				inc3: $('#edit-inc3').val(),
				inc4: $('#edit-inc4').val(),
				inc5: $('#edit-inc5').val(),
				inc6: $('#edit-inc6').val(),
				inc7: $('#edit-inc7').val(),
				hotel1: $('#edit-hotel1').val(),
				hotel2: $('#edit-hotel2').val(),
				hotel3: $('#edit-hotel3').val(),
				harga1: $('#edit-harga1').val(),
				harga2: $('#edit-harga2').val(),
				harga3: $('#edit-harga3').val(),
				harga4: $('#edit-harga4').val(),
			},
			success:function(response){
				console.log(response);
				$("#modal-data").empty();
				$("#modal-data").html(response.data);
				$("#ModalEdit").modal('hide');
			},
			error: function(e)
			{
				// Error function here
			},
			beforeSend:function(b){
				// Before function here
			}
		})
		.done(function(d) {
			// When ajax finished
		});
	});
</script>

<!-- Ajax untuk delete data--> 
<script type="text/javascript">
    $('body').on('click','.delete_modal', function(e){
		let id_layanan = $(this).data('id');
		$('#modal_delete').modal('show', {backdrop: 'static'});
		$("#delete_link").on("click", function(){
			e.preventDefault();
			$.ajax({
				method:  'POST', // untuk mendapatkan attribut method pada form
				url: 'delete_layanan.php',  // untuk mendapatkan attribut action pada form
				data: { 
					id_layanan: id_layanan
				},
				success:function(response){
					console.log(response);
					$("#modal-data").empty();
					$("#modal-data").html(response.data);
					$("#modal_delete").modal('hide');

				},
				error: function(e)
				{
					// Error function here
				},
				beforeSend:function(b){
					// Before function here
				}
			})
			.done(function(d) {
				// When ajax finished
			});
		});
	});
</script>
  </body>
</html>
