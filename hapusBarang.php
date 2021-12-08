<?php

require '_headtags.php';

loginUser();

$id = $_GET["id"];

mysqli_query($conn, "DELETE FROM tb_cart WHERE id = $id");

if(mysqli_affected_rows($conn) == 1){
  echo "<script>
          alert('Barang berhasil dihapus dari cart!')
          window.location.href = 'cart.php'
        </script>";
} else {
  echo "<script>
          alert('".$mysqli_error($conn)."')
          window.location.href = 'cart.php'
        </script>";
}