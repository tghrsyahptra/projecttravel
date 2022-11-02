<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Daftar Admin</title>
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
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php">Pesanan</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="daftar_admin.php">Daftar Admin</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Overview</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Events</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Profile</a>
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
          </div>
        </nav>
        <!-- Page content-->
        <div class="container-fluid">
            <div class="condtainer" style="margin-top: 7px">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header border-bottom bg-info">
                        Daftar Pemesan
                      </div>
                      
                      <div class="card-body">
                      <table id="datatable" class="table table-bordered">
          <thead>
            <th>No</th>
            <th>NamaLengkap</th>
            <th>Email</th>
            <th>Username</th>
            <th>Aksi</th>
          </thead>
          <tbody id="modal-data">
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
                   <a href="javascript:void(0)" class="delete_modal btn btn-danger" data-id='<?php echo  $r['id_user']; ?>'>Delete</a>
                </td>
            </tr>
          <?php } ?>
          </tbody>
          </table>
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
                       url: "modal_admin.php",
                       type: "GET",
                       data : {id_user: m,},
                       success: function (ajaxData){
                         $("#ModalEdit").html(ajaxData);
                         $("#ModalEdit").modal('show',{backdrop: 'true'});
                       }
                     });
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
                  // id_user: $('#edit-id').val(),
                  nama_lengkap: $('#edit-name').val(),
                  username: $('#edit-username').val(),
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
              let id_user = $(this).data('id');
              $('#modal_delete').modal('show', {backdrop: 'static'});
              $("#delete_link").on("click", function(){
                e.preventDefault();
                $.ajax({
                  method:  'POST', // untuk mendapatkan attribut method pada form
                  url: 'delete_admin.php',  // untuk mendapatkan attribut action pada form
                  data: { 
                    id_user: id_user
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
        </div>
      </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>
</html>
