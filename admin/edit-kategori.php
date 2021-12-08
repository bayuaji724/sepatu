

<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Edit Produk - Dehanex's</title>
    <link rel="icon" href="icon/ds1.png" sizes="200x200">
    <?php require '_headtags.php' ?>
    <?php
    loginAdmin();

    $id = $_GET['id'];
    ?>
</head>
<?php

if(isset($_POST["edit"])){
  $nama = $_POST["nama"];

  mysqli_query($conn, "UPDATE tb_kategori SET category_name = '$nama' WHERE category_id = $id");
  echo "<script>
          alert('Berhasil mengubah kategori')
          window.location.href = 'kategori.php'
        </script>";
	
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

                  $k = mysqli_query($conn, "SELECT * FROM tb_kategori WHERE category_id = $id");
                  $k = mysqli_fetch_assoc($k);

                  ?>

                  <form method="post" action="" enctype='multipart/form-data'>
                    <div class="form-group">
                      <label>Nama Kategori</label>
                      <input name="nama" value="<?= $k['category_name'] ?>" type="text" class="form-control" required autofocus>
                    </div>

                    <input name="edit" type="submit" class="btn btn-primary" value="Ubah">
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
                <p>Copyright &#x00A9; by Dehanex's 2021</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
	
	<?php require '_footer.php' ?>
</body>
</html>

