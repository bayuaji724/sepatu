<head>
  <title>Customer - Dehanex's</title>
  <link rel="icon" href="icon/ds1.png" sizes="200x200">
  <?php require '_headtags.php' ?>
  <?php loginAdmin() ?>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
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
               
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Daftar Pelanggan</h2>
								</div>
                                    <div class="data-tables datatable-dark">
										 <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>No</th>
												<th>Nama Pelanggan</th>
												<th>No. Telepon</th>
												<th>Alamat</th>
												<th>Email</th>
											</tr></thead><tbody>
											<?php 
											$brgs=mysqli_query($conn,"SELECT * from tb_admin where role='member' order by admin_id ASC");
											$no=1;
											while($p=mysqli_fetch_array($brgs)){
												?>
												
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $p['admin_name'] ?></td>
													<td><?php echo $p['admin_telp'] ?></td>
													<td><?php echo $p['admin_address'] ?></td>
													<td><?php echo $p['admin_email'] ?></td>
													
												</tr>	
												
												<?php 
											}
											
											?>
											
										</tbody>
										</table>
                                    </div>
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
