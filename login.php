<?php 
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/lores.css"/>

    <title>Login Akun</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-5 offset-md-3">
          <div class="card">
            <div class="card-body">
              <h4>LOGIN</h4>
              <hr>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" id="username" placeholder="Masukkan Username">
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
                </div>
                
                <button class="btn btn-login btn-block btn-primary" style="border-radius : 30px;">LOGIN</button>
              
            </div>
          </div>

          <div class="text-center">
            Belum punya akun? <a href="register.php">Silahkan Register</a>
          </div>

        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
      $(document).ready(function() {
        $(".btn-login").click( function() {
          var username = $("#username").val();
          var password = $("#password").val();

          if(username.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Username Wajib Diisi !'
            });

          } else if(password.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Password Wajib Diisi !'
            });

          } else {

            $.ajax({

              url: "cek-login.php",
              type: "POST",
              data: {
                  "username": username,
                  "password": password
              },

              success:function(response){

                if (response == "admin") {
                  Swal.fire({
                    type: 'success',
                    title: 'Selamat Datang Anda Adalah Admin',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 2000,
                    showCancelButton: false,
                    showConfirmButton: false
                  }) 
                  .then (function() {
                    window.location.href = "admin/dashboard.php";
                  });
                } 

                else if (response == "client") {

                  Swal.fire({
                    type: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 2000,
                    showCancelButton: false,
                    showConfirmButton: false
                  }) 
                  .then (function() {
                    window.location.href = "index.php";
                  });

                } 

                else {

                  Swal.fire({
                    type: 'error',
                    title: 'Login Gagal!',
                    text: 'silahkan coba lagi!'
                  });

                }

                console.log(response);

              },

              error:function(response){

                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'server error!'
                  });

                  console.log(response);

              }

            });

          }

        });

      });
    </script>

  </body>
</html>