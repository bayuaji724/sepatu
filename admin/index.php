<!doctype html>
<html lang="en">
<head>
  <title>Admin Panel - Dehanex's</title>
  <link rel="icon" href="icon/ds1.png" sizes="200x200">
  <?php require '_headtags.php' ?>
  <?php loginAdmin() ?>
</head>

<body>
  <div id="preloader">
    <div class="loader"></div>
  </div>
  <!-- preloader area end -->
  <!-- page container area start -->
  <div class="page-container">
    
    <?php require '_sidebar.php' ?>

    <!-- main content area start -->
    <div class="main-content">
      
    
      <?php require '_header.php' ?>
            
      <!-- page title area end -->
      <div class="main-content-inner">
        <div class="sales-report-area mt-5 mb-5">
          <div class="row">
            <div class="col-md-4">
              <div class="single-report mb-xs-30">
                <div class="s-report-inner pr--20 pt--30 mb-3">
                  <!--<div class="icon"><i class="fa fa-user"></i></div>-->
                    <div class="s-report-title d-flex justify-content-between">
                      <h4 class="header-title mb-0">Pelanggan</h4>
                    </div>
                    <div class="d-flex justify-content-between pb-2">
                      <h1>
                        <?php
                          $user = mysqli_query($conn, "SELECT * FROM tb_admin");
                          echo mysqli_num_rows($user);
                        ?>
                      </h1>
                    </div>
									</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="single-report">
                  <div class="s-report-inner pr--20 pt--30 mb-3">
                    <!--<div class="icon"><i class="fa fa-book"></i></div>-->
                      <div class="s-report-title d-flex justify-content-between">
                        <h4 class="header-title mb-0">Product</h4>
                      </div>
                      <div class="d-flex justify-content-between pb-2">
                        <h1>
                          <?php
                            $product = mysqli_query($conn, "SELECT * FROM tb_product");
                            echo mysqli_num_rows($product);
                          ?>
                        </h1>
                      </div>
                    </div>
                  </div>
                </div>
						    <div class="col-md-4">
                  <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                      <!--<div class="icon"><i class="fa fa-link"></i></div>-->
                        <div class="s-report-title d-flex justify-content-between">
                          <h4 class="header-title mb-0">Kategori</h4>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                          <h1>
                            <?php
                              $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori");
                              echo mysqli_num_rows($kategori);
                            ?>
                          </h1>
                        </div>
									<!--
									<button type="button" class="<?php 
									if($itungtrans3==0){
										echo 'btn btn-secondary btn-block';
									} else {
										echo 'btn btn-primary btn-block';
									}
									?>
									">Lihat Transaksi</button>
									-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <!-- overview area end -->
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Selamat Datang</h2>
                                </div>
                                <div class="market-status-table mt-4">
                                    Anda masuk sebagai <strong><?php echo $_SESSION['login-sepatu'] ?></strong>
									<br>
									<p>Pada halaman admin, Anda dapat menambah kategori produk, mengelola produk, 
									mengelola user dan admin, melihat konfirmasi pembayaran</p>
                                </div>
                            </div>
                        </div>
                    </div>
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
