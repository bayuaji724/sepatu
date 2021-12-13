<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dehanex's</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="template/plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="template/plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="template/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="template/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="css/footer.css">

  <!-- jQuery -->
<script src="template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<scrilpt src="template/dist/js/adminlte.min.js"></scrilpt>
<!-- AdminLTE for demo purposes -->
<script src="template/dist/js/demo.js"></script>

<?php

session_start();

require '_functions.php';
require 'koneksi.php';

loginUser();

// take admin_id
$username = $_SESSION['login-sepatu'];
$user = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username'");
$user = mysqli_fetch_assoc($user);
$idUser = $user['admin_id'];

// take cart data
$cartProcess = mysqli_query($conn, "SELECT * FROM tb_cart WHERE id_user = $idUser AND status = 'Diproses'");
$cartSend = mysqli_query($conn, "SELECT * FROM tb_cart WHERE id_user = $idUser AND status = 'Dikirim'");
$cartDone = mysqli_query($conn, "SELECT * FROM tb_cart WHERE id_user = $idUser AND status = 'Selesai'");

?>


</head>
<body>
<center><img src="icon/ds1.png" alt="dehanexs" width=80px;><br> <p>DEHANEX'S STORE</p></center>
    <br><br>
    <center>
<div class="col-6 col-sm-10">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Diproses</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Dikirim</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Selesai</a>
                  </li> -->
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <table class="table">
                        <tr>
                            <th>No Order</th>
                            <th>Nama Barang</th>
                            <th>Harga Barang</th>
                            <th>Total Barang</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                        </tr>
                        <?php foreach($cartProcess as $cart) : ?>
                        <tr>
                            <?php
                              $idProduct = $cart['id_product'];
                              $product = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = $idProduct");
                              $product = mysqli_fetch_assoc($product);
                            ?>
                            <td><?= $cart['id'] ?></td>
                            <td><?= $product['product_name'] ?></td>
                            <td><?= 'Rp. ' . number_format($product['product_price']) ?></td>
                            <td><?= $cart['total'] ?></td>
                            <td><?= 'Rp. ' . number_format($product['product_price'] * $cart['total']) ?></td>
                            <td><span class="badge badge-info">Processing</span></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                  <table class="table">
                        <tr>
                            <th>No Order</th>
                            <th>Nama Barang</th>
                            <th>Harga Barang</th>
                            <th>Total Barang</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                            <th>Info Paket</th>
                        </tr>
                        <?php foreach($cartProcess as $cart) : ?>
                        <tr>
                            <?php
                              $idProduct = $cart['id_product'];
                              $product = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = $idProduct");
                              $product = mysqli_fetch_assoc($product);
                            ?>
                            <td><?= $cart['id'] ?></td>
                            <td><?= $product['product_name'] ?></td>
                            <td><?= 'Rp. ' . number_format($product['product_price']) ?></td>
                            <td><?= $cart['total'] ?></td>
                            <td><?= 'Rp. ' . number_format($product['product_price'] * $cart['total']) ?></td>
                            <td><span class="badge badge-info">Processing</span></td>
                            <td>
                              <a href="diterima.php?id=<?= $cart['id'] ?>" class="btn btn-info" onclick="return confirm('Apakah paket anda sudah di terima...?')">Diterima</a>
                              <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                                Di terima
                              </button> -->
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                  </div>
                  <!-- <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                    <table class="table">
                        <tr>
                            <th>No Order</th>
                            <th>Nama Barang</th>
                            <th>Harga Barang</th>
                            <th>Total Barang</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                        </tr>
                        <?php foreach($cartDone as $cart) : ?>
                        <tr>
                            <?php
                              $idProduct = $cart['id_product'];
                              $product = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = $idProduct");
                              $product = mysqli_fetch_assoc($product);
                            ?>
                            <td><?= $cart['id'] ?></td>
                            <td><?= $product['product_name'] ?></td>
                            <td><?= 'Rp. ' . number_format($product['product_price']) ?></td>
                            <td><?= $cart['total'] ?></td>
                            <td><?= 'Rp. ' . number_format($product['product_price'] * $cart['total']) ?></td>
                            <td><span class="badge badge-success">Paket telah Selesai</span></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                  </div>    -->
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div><br>
        <div class="modal fade" id="modal-info">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">Pesanan di terima</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah anda yakin pesanan sudah di terima....?&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Belum </button>
              <button type="button" class="btn btn-outline-light">Iya</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
        <a class="btn btn-primary" href="cart.php" role="button">Kembali Ke keranjang</a>
        </center>
        <footer class="footer">
      <div class="container">
        <p class="text-muted">Copyright &copy; 2021 By DEHANEX'S </p>       
      </div>
    </footer>
</body>
</html>