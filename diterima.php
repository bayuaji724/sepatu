<?php

require '_headtags.php';

loginAdmin();

$idCart = $_GET['id'];

mysqli_query($conn, "UPDATE tb_cart SET status = 'Selesai' WHERE id = $idCart");

header("Location: pesanan.php");
