<!DOCTYPE html>
<html lang="en">

<head>
  <title>Register - Dehanex's</title>
  <?php
  require '_headtags.php';
  loginCheck();
  ?>
</head>

<body id="bg-login">
  <div class="box-login">
    <h2>Dehanex's Store</h2>

    <!-- form -->
    <form action="" method="POST">
      <p>Informasi Profile</p>
      <input type="text" name="nama" placeholder="Nama Lengkap"  class="input-control" required>
      <input type="email" name="email" placeholder="Alamat Email"  class="input-control" required>
      <input type="text" name="telp" placeholder="Nomor Telepon"  class="input-control" required maxlength="13">
      <input type="text" name="alamat" placeholder="Alamat Lengkap"  class="input-control" required><br><br>
      <p>Informasi Login</p>
      <input type="text" name="username" placeholder="Username" class="input-control">
      <input type="password" name="password" placeholder="Password" class="input-control">
      <button type="submit" name="adduser" class="btn">Daftar</button>
    </form><br>
    <!-- end form -->

    <p>Sudah mempunyai akun ? <u><a href="login.php"><br>Login</a></u></p>
  </div>
</body>
</html>

<?php

if(isset($_POST["adduser"])){
  $nama = htmlspecialchars($_POST["nama"]);
  $email = htmlspecialchars($_POST["email"]);
  $telp = htmlspecialchars($_POST["telp"]);
  $alamat = htmlspecialchars($_POST["alamat"]);
  $username = htmlspecialchars($_POST["username"]);
  $password = htmlspecialchars($_POST["password"]);

  // check if username is exist
  $usernameCheck = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username'");
  if(mysqli_num_rows($usernameCheck) == 1){
    echo "<script>
            alert('Username sudah ada, silahkan gunakan username lain!')
          </script>";
  }else {
    // hash
    $password = password_hash($password, PASSWORD_DEFAULT);
  
    // role
    $role = "member";
  
    // input to db
    mysqli_query($conn, "INSERT INTO tb_admin VALUES('', '$nama', '$username', '$password', '$telp', '$email', '$alamat', '$role')");
    // check if success register
    if(mysqli_affected_rows($conn) == 1){
      echo "<script>
              alert('Berhasil mendaftar, silahkan login')
              window.location.href = 'login.php'
            </script>";
    }else {
      echo "<script>
              alert('Error : " . mysqli_error($conn) . "')
            </script>";
    }
  }

}