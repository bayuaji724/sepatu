

<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Edit Produk - Dehanex's</title>
    <link rel="icon" href="icon/ds1.png" sizes="200x200">
    <?php require '_headtags.php' ?>
    <?php
    loginAdmin();

    $idProduk = $_GET['id'];
    ?>
</head>
<?php

if(isset($_POST["editProduct"])){
	$nama = htmlspecialchars($_POST["nama"]);
	$kategori = htmlspecialchars($_POST["kategori"]);
	$harga = htmlspecialchars($_POST["harga"]);
	$deskripsi = htmlspecialchars($_POST["deskripsi"]);
  $status = $_POST['status'];

  // var_dump(($_FILES['foto']));die;

  $a = 0;
  if($_FILES["foto"]["name"] != ""){

    echo $a++;

    //data foto
    $ukuranFile = $_FILES["foto"]["size"];
    $temp = $_FILES["foto"]["tmp_name"];
    $namaFile = $_FILES["foto"]["name"];
    $error = $_FILES["foto"]["error"];
  
    //CEK apakah gambar di upload ada gak
    if ( $error == 4 ) {
        echo "
        <script>
            alert('Silahkan inputkan gambar !');
            window.location.href = 'produk.php'
        </script>
        ";
    }
    echo $a++;
    //cek apakah file adalah gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    // explode = memecah string menjadi array (dg pemisah delimiter)
    $ekstensiGambar = explode('.',$namaFile);
    //mengambil ekstensi gambar yg paling belakang dg strltolower (mengecilkan semua huruf)
    $ekstensiGambar = strtolower(end($ekstensiGambar));
  
    // echo $ekstensiGambar;die;
  
    //CEK $ekstensiGambar ada di array $ekstensiGambarValid
    if ( !in_array($ekstensiGambar,$ekstensiGambarValid) ){
        echo "
            <script>
                alert('yang anda masukkan bukan gambar');
                window.location.href = 'produk.php'
            </script>
        ";
    }
    echo $a++;
    //CEK ukuran file
    if ( $ukuranFile > 3000000 ) {
        echo "
            <script>
                alert('ukuran gambar terlalu besar');
                window.location.href = 'produk.php'
            </script>
        ";
        die;
    }
    echo $a++;
    //LOLOS CEK BROOO
    //generate nama baru random
    $foto = uniqid().'.'.$ekstensiGambar;
    move_uploaded_file($temp,'product/'.$foto);
  }else {
    $foto = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = $idProduk"))['product_image'];
  }

  // var_dump($status);die;

	mysqli_query($conn, "UPDATE tb_product SET
                      category_id = $kategori,
                      product_name = '$nama',
                      product_price = $harga,
                      product_description  = '$deskripsi',
                      product_image = '$foto',
                      product_status = $status
                      WHERE product_id = $idProduk");

	if(mysqli_affected_rows($conn) > 0){
		echo "<script>
						alert('Berhasil mengedit produk')
						window.location.href = 'produk.php'
					</script>";
	}else {
		echo "<script>
						alert('". mysqli_error($conn) ."')
						window.location.href = 'produk.php'
					</script>";
  }
  echo $a++;
  // die;
}


?>
<body>
    <div class="page-container">
        
        <?php require '_sidebar.php' ?>
        <!-- main content area start -->
        <div class="main-content">
            
        
            <?php require '_header.php' ?>
            
            
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- market value area start -->
                <div class="row justify-content-center mt-5 mb-5">
                    

                  <?php

                  $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = $idProduk");
                  $produk = mysqli_fetch_assoc($produk);

                  ?>

                  <form method="post" action="" enctype='multipart/form-data'>
                    <img src="product/<?= $produk['product_image'] ?>" width="150px" alt="">
                    <div class="form-group">
                      <label>Nama Produk</label>
                      <input name="nama" type="text" class="form-control" value="<?= $produk['product_name'] ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Kategori</label>
                      <select name="kategori" id="kategori" class="form-control">
                        <?php
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori");
                        foreach($kategori as $k) :
                        ?>
                          <?php if($k['category_id'] == $produk['category_id']) : ?>
                            <option selected value="<?= $k['category_id'] ?>"><?= $k['category_name'] ?></option>
                          <?php else : ?>
                            <option value="<?= $k['category_id'] ?>"><?= $k['category_name'] ?></option>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Harga</label>
                      <input name="harga" type="number" value="<?= $produk['product_price'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Deskripsi</label>
                      <input name="deskripsi" value="<?= $produk['product_description'] ?>" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Stok</label>
                      <input name="status" value="<?= $produk['product_status'] ?>" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Foto</label>
                      <input class="form-control" type="file" id="name" name="foto">
                    </div>

                    <input name="editProduct" type="submit" class="btn btn-primary" value="Ubah">
                  </div>
                </form>
                </div>
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>Copyright &#x00A9; By Dehanex's 2021</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
	
	<?php require '_footer.php' ?>
</body>
</html>

