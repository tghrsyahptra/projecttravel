<?php 
session_start();
include "../koneksi.php";

if (!isset($_SESSION['id_user'])|| !isset($_SESSION['nama_lengkap'])|| !isset($_SESSION['username']))
    {
      echo "<script>alert('silakan login terlebih dahulu');</script>";
      echo "<script>location = 'login.php';</script>";
      exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Daftar Pesanan</title>
    <!-- Core theme CSS (includes Bootstrap)-->
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
        <div class="sidebar-heading border-bottom bg-info">Pergi Travelling</div>
        <div class="list-group list-group-flush">
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard.php">Pesanan</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="daftar_user.php">Daftar User</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="layanan.php">Layanan</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="profil.php">Profile</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../logout.php">Logout</a>
        </div>
      </div>
      
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
  <div class="container" style="margin-top: 100px">
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo  $_SESSION['nama_lengkap']; ?></h4>
                      <p class="text-secondary mb-1"><?php echo  $_SESSION['username']; ?></p>
                      <p class="text-muted font-size-sm"><?php echo  $_SESSION['alamat']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo  $_SESSION['nama_lengkap']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo  $_SESSION['email']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo  $_SESSION['nomor']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo  $_SESSION['alamat']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">NIK</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo  $_SESSION['nik']; ?>
                    </div>
                  </div>
                  <hr>
                  <!-- <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>
</html>
