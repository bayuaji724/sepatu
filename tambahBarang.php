<?php

require '_headtags.php';

loginUser();

$id = $_GET["id"];

$totalBarang = mysqli_query($conn, "SELECT * FROM tb_cart WHERE id=$id");
$totalBarang = mysqli_fetch_assoc($totalBarang);

$idBarang = $totalBarang['id_product'];
$totalBarang = $totalBarang['total'];
$totalSekarang = $totalBarang + 1;

// cek stok barang
$product = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = $idBarang");
$product = mysqli_fetch_assoc($product);
if($product['product_status'] < $totalSekarang){
  echo "<script>
          alert('Stok barang tidak cukup!')
          window.location.href = 'cart.php'
        </script>";
}

mysqli_query($conn, "UPDATE tb_cart SET total = $totalSekarang WHERE id = $id");

if(mysqli_affected_rows($conn) > 0){
  echo "<script>
          // alert('Barang menambah barang!')
          window.location.href = 'cart.php'
        </script>";
} else {
  echo "<script>
          alert('Gagal menambahkan barang!')
          window.location.href = 'cart.php'
        </script>";
}