<?php

require '_headtags.php';

loginAdmin();

$id = $_GET["id"];

mysqli_query($conn, "UPDATE tb_cart SET status = 'Selesai' WHERE id = $id");

if(mysqli_affected_rows($conn) > 0){
  echo "<script>
          alert('Berhasil mengubah status pesanan')
          window.location.href = 'pesanan.php'
        </script>";
}else {
  echo "<script>
          alert('". mysqli_error($conn) ."')
          window.location.href = 'pesanan.php'
        </script>";
}