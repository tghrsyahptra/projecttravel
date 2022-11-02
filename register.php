<?php 
include "koneksi.php";

$field = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user"));

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/lores.css"/>
    <title>Register Pengguna</title>
  </head>
  <body>
    <div class="container" style="margin-top: 50px">
      <div class="row">
        <div class="col-md-5 offset-md-3">
          <div class="card">
            <div class="card-body">
              <h4>REGISTER</h4>
              <hr>         

                <!-- Automatis -->
                
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama_lengkap" placeholder="Masukkan Nama">
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
                  <label>No Telp</label>
                  <input type="text" class="form-control" id="nomor" placeholder="Masukkan Notelp">
                </div>
                <div class="form-group">
                  <label>NIK</label>
                  <input type="text" class="form-control" id="nik" placeholder="Masukkan NIK">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat">
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
                </div>
                <label for="gender">Gender</label>
                  <select class="form-control" id="gender" placeholder="Masukkan Gender Anda">
                      <option value=""></option>
                      <option value="Pria">Pria</option>
                      <option value="Wanita">Wanita</option>
                      <option value="Lainnya..">Lainnya..</option>
                    </select>
                    <br>
                <button class="btn btn-register btn-block btn-primary">REGISTER</button> 
            </div>
          </div>
          <div class="text-center" style="margin-top: 15px">
            Sudah punya akun? <a href="login.php">Silahkan Login</a>
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
          var nama_lengkap = $("#nama_lengkap").val()
          ,username = $("#username").val()
          ,email = $("#email").val()
          ,nomor = $("#nomor").val()
          ,nik = $("#nik").val()
          ,password = $("#password").val()
          ,gender = $("#gender").val()
          ,alamat = $("#alamat").val()

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
                  "nik": nik,
                  "password": password,
                  "gender": gender,
                  "alamat": alamat
              },
              success:function(response){
                console.log(response)
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

  </body>
</html>