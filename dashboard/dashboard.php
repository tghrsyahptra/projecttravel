<?php
  include '../koneksi.php'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
   </head>

   <body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bxs-plane-alt'></i> <span class="nav_logo-name">PergiTravelling</span> </a>
                <div class="nav_list"> <a href="#" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> <a href="#" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a> <a href="#" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Messages</span> </a> <a href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span> </a> <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a> <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a> </div>
            </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
      <div class="condtainer" style="margin-top: 80px">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  Daftar Pemesan
                </div>
                <div class="card-body">
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
    


  <!-- <script>
    document.addEventListener("DOMContentLoaded", function(event) {

    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)

    if(toggle && nav && bodypd && headerpd){
    toggle.addEventListener('click', ()=>{
    nav.classList.toggle('show')
    toggle.classList.toggle('bx-x')
    bodypd.classList.toggle('body-pd')
    headerpd.classList.toggle('body-pd')
    })
    }
    }
    showNavbar('header-toggle','nav-bar','body-pd','header')
    const linkColor = document.querySelectorAll('.nav_link')
    function colorLink(){
    if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
    }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))
    });
  </script> -->

</body>
</html>
