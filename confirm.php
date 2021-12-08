<?php

require '_headtags.php';

loginUser();

if(isset($_POST["submit"])){

  $username = $_POST['username'];

  $id = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username'"))['admin_id'];

  // var_dump($id);die;

  mysqli_query($conn, "UPDATE tb_cart SET status = 'Pesanan Baru' WHERE id_user = $id");

  if(mysqli_affected_rows($conn) > 0){
    echo "<script>
            alert('Berhasil mengkonfirmasi pesanan')
            window.location.href = 'cart.php'
          </script>";
  }else {
    echo "<script>
            alert('". mysqli_error($conn) ."')
            window.location.href = 'cart.php'
          </script>";
  }

  header("Location: https://api.whatsapp.com/send?phone=+6281295399491 &text= Halo min, Saya ingin membayar produk checkoutnya dengan Username $username");
}