<!doctype html>
<html lang="en">
<head>
<title>CRUD PHP MySQLi Modal Bootstrap & Datatable | Aguzrybudy.com</title>
<meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
<meta content="Aguzrybudy" name="author"/>
<!-- <link rel="stylesheet" type="text/css" href="datatables/Bootstrap-4-4.1.1/css/bootstrap.min.css"/> -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="jquery/jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Untuk datatable -->
<link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
<script type="text/javascript" src="datatables/datatables.min.js"></script>
	
<script type="text/javascript">
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>
</head>
<body>
 
<div class="container mt-5 mb-5">

<table id="datatable" class="table table-bordered">
    <thead>
      <th>No</th>
      <th>Name</th>
      <th>email</th>
      <th>Action</th>
    </thead>
	<tbody id="modal-data">
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
      <td><?php echo  $r['nama_lengkap']; ?></td>
      <td><?php echo  $r['email']; ?></td>
      <td>
         <a href="javascript:void(0)" class='open_modal' id='<?php echo  $r['id_pesanan']; ?>'>Edit</a>
         <a href="javascript:void(0)" class="delete_modal" data-id='<?php echo  $r['id_pesanan']; ?>'>Delete</a>
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
          <form id="form-save" action="proses_save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Name">Modal Name</label>
                  <input type="text" name="nama_lengkap"  id="nama_lengkap" class="form-control" placeholder="Modal Name" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Email">Email</label>
                  <input type="email" name="email"  id="email" class="form-control" placeholder="Email" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="email">Email</label>
                   <textarea name="email" id="email" class="form-control" placeholder="Email" required/></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Date">Date</label>
                  <input type="text" name="date"  class="form-control" plcaceholder="Timestamp" disabled value="<?php echo date('Y-m-d H:i:s');?>" required/>
                </div>

              <div class="modal-footer">
                  <button class="btn btn-success" type="submit">
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
    			   url: "modal_edit.php",
    			   type: "GET",
    			   data : {id_pesanan: m,},
    			   success: function (ajaxData){
      			   $("#ModalEdit").html(ajaxData);
      			   $("#ModalEdit").modal('show',{backdrop: 'true'});
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
			url: $(this).attr("action"),  // untuk mendapatkan attribut action pada form
			data: { 
				nama_lengkap: $('#nama_lengkap').val(),
				email: $('#email').val(),
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
			url: $(this).attr("action"),  // untuk mendapatkan attribut action pada form
			data: { 
				// id_pesanan: $('#edit-id').val(),
				nama_lengkap: $('#edit-name').val(),
				email: $('#edit-email').val(),
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
		let id_pesanan = $(this).data('id');
		$('#modal_delete').modal('show', {backdrop: 'static'});
		$("#delete_link").on("click", function(){
			e.preventDefault();
			$.ajax({
				method:  'POST', // untuk mendapatkan attribut method pada form
				url: 'proses_delete.php',  // untuk mendapatkan attribut action pada form
				data: { 
					id_pesanan: id_pesanan
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