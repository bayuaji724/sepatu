<?php

require '_headtags.php';

loginAdmin();

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM tb_kategori WHERE category_id = $id");

$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE category_id = $id");
foreach ($produk as $p){
  $idProduk = $p['product_id'];
  mysqli_query($conn, "DELETE FROM tb_cart WHERE id_product = $idProduk");
}

mysqli_query($conn, "DELETE FROM tb_product WHERE category_id = $id");

echo "<script>
          alert('Berhasil menghapus kategori')
          window.location.href = 'kategori.php'
        </script>";

?>