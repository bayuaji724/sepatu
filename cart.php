<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dehanex's</title>
        <link rel="icon" href="icon/ds1.png" sizes="200x200">
        <link rel="stylesheet" href="fontawesome-free-5.15.1/css/all.css">
        <script src="https://kit.fontawesome.com/afd6aa68df.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="cart.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php require '_headtags.php' ?>
        <?php loginUser(); ?>
    </head>
    <body>
        <?php require '_header.php' ?>
        <div class="container">
            <h1>Shopping Cart</h1>
            <div class="cart">
                <div class="products">
                    <?php
                    $idUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '" . $_SESSION["login-sepatu"] . "'"))["admin_id"];

                    $cek = mysqli_query($conn, "SELECT * FROM tb_cart WHERE id_user = $idUser AND status = 'Keranjang'");
                    if(mysqli_num_rows($cek)) :
                    ?>
                        <?php foreach($cek as $p) : ?>
                            <div class="product"><img src="admin/product/<?= mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = " . $p['id_product']))['product_image'] ?>">
                                <div class="product-info">
                                    <h3 class="product-name"><?= mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = " . $p['id_product']))['product_name'] ?></h3>
                                    <h4 class="product-price">Rp. <?= number_format(mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = " . $p['id_product']))['product_price']) ?></h4>
                                    <p class="product-quantity">Jumlah: <a href="kurangBarang.php?id=<?= $p['id'] ?>"><butto style="margin: 10px;">-</butto></a> <?= $p['total'] ?> <a href="tambahBarang.php?id=<?= $p['id'] ?>"><butto style="margin: 10px;">+</butto></a>
                                    <a href="hapusBarang.php?id=<?= $p['id'] ?>" class="product-remove"><span class="remove">Remove</span></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <h3>Keranjang Kosong</h3>
                    <?php endif; ?>
                </div>
                <div class="cart-total">
                    <?php
                        $carts = mysqli_query($conn, "SELECT * FROM tb_cart WHERE id_user = $idUser AND status = 'Keranjang'");
                        $totalHarga = 0;
                        $totalBarang = 0;
                        foreach($carts as $cart){
                            $productID = $cart['id_product'];
                            $product = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = $productID");
                            $product = mysqli_fetch_assoc($product);
                            $hargaProduk = $product['product_price'];

                            $totalHarga += $hargaProduk * $cart['total'];

                            $totalBarang += $cart['total'];
                        }
                    ?>
                    <p><span>Total Price</span><span>Rp. <?= number_format($totalHarga) ?></span></p>
                    <p><span>Number of Items</span><span><?= $totalBarang ?></span></p>
                    <form action="confirm.php" method="post">
                        <input type="hidden" value="<?= $_SESSION['login-sepatu'] ?>" name="username">
                        <button type="submit" href="confirm.php" name="submit" style="padding: 10px 5px; background-color:#F3950D">Proceed to Checkout</button>
                    </form>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <p class="text-muted">Copyright &copy;
                    2021 By DEHANEX'S </p>
            </div>
        </footer>
    </body>

    </html>