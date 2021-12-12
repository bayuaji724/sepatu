<?php

require '_headtags.php';

loginAdmin();

$idProduk = $_GET['id'];

mysqli_query($conn, "DELETE FROM tb_product WHERE product_id = $idProduk");
mysqli_query($conn, "DELETE FROM tb_cart WHERE id_product = $idProduk");

if(mysqli_affected_rows($conn) > 0){
  echo "<script>
          alert('Berhasil menghapus produk')
          window.location.href = 'produk.php'
        </script>";
}else {
  echo "<script>
          alert('". mysqli_error($conn) ."')
          window.location.href = 'produk.php'
        </script>";
}

?>