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
<script src="template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="template/dist/js/demo.js"></script>
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
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Selesai</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <table class="table">
                        <tr>
                            <th>No Order</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>37000</td>
                            <td><span class="badge badge-info">Processing</span></td>
                        </tr>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                  <table class="table">
                        <tr>
                            <th>No Order</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                            <th>Info Paket</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>37000</td>
                            <td><span class="badge badge-warning">Sedang dikirim</span></td>
                            <td><span class="badge badge-info">Diterima</span></td>
                        
                        </tr>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                  <table class="table">
                        <tr>
                            <th>No Order</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>37000</td>
                            <td><span class="badge badge-success">Paket telah selesai</span></td>
                        </tr>
                    </table>
                  </div>   
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div><br>
        <a class="btn btn-primary" href="cart.php" role="button">Kembali Ke keranjang</a>
        </center>
        <footer class="footer">
      <div class="container">
        <p class="text-muted">Copyright &copy; 2021 By DEHANEX'S </p>       
      </div>
    </footer>
</body>
</html>