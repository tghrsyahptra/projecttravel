<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"/>
    <title>Contact Us</title>
  </head>
  <body>
  <?php
    session_start();
    include "Penghubung/navbar.php" ?>
    <div class="container" style="margin-top: 60px; margin-bottom: 60px;">
      <div class="row">
        <div class="col-md-5 offset-md-3">
          <div class="card">
            <div class="card-body">
              <h4>Contact Us</h4>
              <hr>               
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama_lengkap" placeholder="Masukkan Nama Lengkap">
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" id="username" placeholder="Masukkan Username">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Masukkan Email">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Pesan</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button class="form-control btn btn-register btn-block btn-primary">REGISTER</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
      $(document).ready(function() {
        $(".btn-register").click( function() {   
          var nama_lengkap = $("#nama_lengkap").val();
          var username = $("#username").val();
          var email = $("#email").val();
          var nomor = $("#nomor").val();
          var nik = $("#nik").val();
          var password = $("#password").val();
          var gender = $("#gender").val();
          var alamat = $("#alamat").val();

          if (nama_lengkap.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Nama Lengkap Wajib Diisi !'
            });

          } else if(username.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Username Wajib Diisi !'
            });
          } else if(email.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Email Wajib Diisi !'
            });

          }else if(nomor.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'No Telp Wajib Diisi !'
            });
          } else if(nik.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'NIK Wajib Diisi !'
            });
          } else if(gender.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Gender Wajib Diisi !'
            });
          }
          else if(alamat.length == "") {
          Swal.fire({
            type: 'warning',
            title: 'Oops...',
            text: 'Alamat Wajib Diisi !'
          });
          }
           else if(password.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Password Wajib Diisi !'
            });

          } else {
            //ajax
            $.ajax({

              url: "simpan-register.php",
              type: "POST",
              data: {
                  "nama_lengkap": nama_lengkap,
                  "username": username,
                  "email": email,
                  "nomor": nomor,
                  "nik": email,
                  "password": nik,
                  "gender": gender,
                  "alamat": alamat
              },
              success:function(response){
                if (response == "success") {
                  Swal.fire({
                    type: 'success',
                    title: 'Register Berhasil!',
                    text: 'silahkan login!'
                  });
                  $("#nama_lengkap").val('');
                  $("#username").val('');
                  $("#email").val('');
                  $("#nomor").val('');
                  $("#nik").val('');
                  $("#password").val('');
                  $("#gender").val('');
                  $("#alamat").val('');
                } else {
                  Swal.fire({
                    type: 'error',
                    title: 'Register Gagal!',
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
              }
            })
          }
        }); 
      });
    </script>
<?php
    include "Penghubung/footer.php" ?>
  </body>
</html>