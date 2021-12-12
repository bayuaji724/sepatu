<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Kelola Pesanan - Dehanex's</title>
    <link rel="icon" href="icon/ds1.png" sizes="200x200">
    <?php require '_headtags.php' ?>
    <?php loginAdmin() ?>
</head>

<body>
  <div class="page-container">
    <?php require '_sidebar.php' ?>
    
    <!-- main content area start -->
    <div class="main-content">
      <?php require '_header.php' ?>
        
      <!-- page title area end -->
      <div class="main-content-inner">
          
        <!-- market value area start -->
        <div class="row mt-5 mb-5">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="d-sm-flex justify-content-between align-items-center my-3">
                  <h2>Daftar Pesanan Pelanggan</h2>
                </div>
              <div class="data-tables datatable-dark">

              <table id="dataTable3" class="display" style="width:100%">
                <thead class="thead-dark">
                  <tr>
                    <th>No.</th>
                    <th>Nama User</th>
                    <th>Produk</th>
                    <th>Total Barang</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <?php 
                  $produk = mysqli_query($conn,"SELECT tb_admin.admin_name as user,
                                                tb_product.product_price as price,
                                                tb_product.product_name as name,
                                                tb_cart.total as total,
                                                tb_cart.id as id,
                                                tb_cart.status as status
                                                FROM tb_cart
                                                INNER JOIN tb_admin
                                                ON tb_admin.admin_id = tb_cart.id_user
                                                INNER JOIN tb_product
                                                ON tb_product.product_id = tb_cart.id_product
                                                WHERE tb_cart.status != 'Keranjang'
                                                ORDER BY tb_cart.id DESC");
                  $no=1;
                  foreach($produk as $p) :
                ?>

                <tbody>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?= $p['user'] ?></td>
                    <td><?= $p['name'] . ' (Rp. ' . number_format($p['price']) . ')' ?></td>
                    <td><?= $p['total'] ?></td>
                    <td><?= 'Rp. ' . number_format($p['price'] * $p['total']) ?></td>
                    <td><?= $p['status'] ?></td>
                    <td>
                      <?php if($p['status'] == 'Pesanan Baru') : ?>
                        <a href="done1.php?id=<?= $p['id'] ?>" onclick="return confirm('Apakah anda yakin?')">Proses Pesanan</a>
                      <?php elseif ($p['status'] == 'Diproses') : ?>
                        <a href="done2.php?id=<?= $p['id'] ?>" onclick="return confirm('Apakah anda yakin?')">Kirim Pesanan</a>
                      <?php elseif ($p['status'] == 'Dikirim') : ?>
                        <a href="done3.php?id=<?= $p['id'] ?>" onclick="return confirm('Apakah anda yakin?')">Selesaikan Pesanan</a>
                      <?php elseif ($p['status'] == 'Selesai') : ?>
                        Pesanan Selesai
                      <?php endif; ?>
                    </td>
                  </tr>		
                </tbody>
                <?php endforeach; ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- main content area end -->


    <!-- footer area start-->
    <footer>
      <div class="footer-area">
        <p>Copyright &#x00A9; By Dehanex' 2021</p>
      </div>
    </footer>
    <!-- footer area end-->
  </div>
	
	<script>
	$(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
	} );
	</script>
	
	<?php require '_footer.php' ?>
</body>
</html>