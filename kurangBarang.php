<?php

require '_headtags.php';

loginUser();

$id = $_GET["id"];

$totalBarang = mysqli_query($conn, "SELECT * FROM tb_cart WHERE id=$id");
$totalBarang = mysqli_fetch_assoc($totalBarang);
$totalBarang = $totalBarang['total'];
$totalSekarang = $totalBarang - 1;

mysqli_query($conn, "UPDATE tb_cart SET total = $totalSekarang WHERE id = $id");

if(mysqli_affected_rows($conn) == 1){
  echo "<script>
          // alert('Barang mengurangi barang!')
          window.location.href = 'cart.php'
        </script>";
} else {
  echo "<script>
          alert('Gagal mengurangi barang!')
          window.location.href = 'cart.php'
        </script>";
}