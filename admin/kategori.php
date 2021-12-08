

<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Kelola Kategori - Dehanex's</title>
	<link rel="icon" href="icon/ds1.png" sizes="200x200">
    <?php require '_headtags.php' ?>
    <?php loginAdmin() ?>
<?php 
		
	if(isset($_POST['addcategory']))
	{
		$namakategori = $_POST['namakategori'];
			  
		$tambahkat = mysqli_query($conn,"insert into tb_kategori (namakategori) values ('','$namakategori')");
		if ($tambahkat){
		echo "
		<meta http-equiv='refresh' content='1; url= kategori.php'/>  ";
		} else { echo "
		 <meta http-equiv='refresh' content='1; url= kategori.php'/> ";
		}
		
	};
	?>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <!-- <div id="preloader">
        <div class="loader"></div>
    </div> -->
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
									<h2>Daftar Kategori</h2>
									<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2">Tambah Kategori</button>
                                </div>
                                    <div class="data-tables datatable-dark">
										 <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>No.</th>
												<th>Nama Kategori</th>
												<th>Jumlah Produk</th>
												<th>Aksi</th>
											</tr></thead><tbody>
											<?php 
											$kategori=mysqli_query($conn,"SELECT * from tb_kategori order by category_id ASC");
											$n=1;
											foreach ($kategori as $k) {

												?>
												
												<tr>
													<td><?php echo $n++ ?></td>
													<td><?php echo $k['category_name'] ?></td>
													<td>
														<?php
														$id = $k['category_id'];
														$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE category_id = $id");
														echo mysqli_num_rows($produk);
														?>
													</td>
													<td><a href="edit-kategori.php?id=<?= $id ?>">Edit</a> | <a href="hapus-kategori.php?id=<?= $id ?>" onclick="return confirm('Apakah anda yakin?')">Hapus</a></td>
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
	
	<!-- modal input -->
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Kategori</h4>
						</div>
						<div class="modal-body">
							<form action="" method="post">
								<div class="form-group">
									<label>Nama Kategori</label>
									<input name="nama" type="text" class="form-control" required autofocus>
								</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<input name="tambah" type="submit" class="btn btn-primary" value="Tambah">
							</div>
						</form>
					</div>
				</div>
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


<?php
if (isset($_POST["tambah"])){
	$nama = htmlspecialchars($_POST["nama"]);

	$cek = mysqli_query($conn, "SELECT * FROM tb_kategori WHERE category_name = '$nama'");
	if(mysqli_num_rows($cek) == 1){
		echo "<script>
            alert('Kategori sudah ada!')
            window.location.href = '#'
          </script>";
	}else {
		mysqli_query($conn, "INSERT INTO tb_kategori VALUES('','$nama')");
		if(mysqli_affected_rows($conn) > 0) {
			echo "<script>
            alert('Kategori berhasil ditambahkan')
            window.location.href = 'kategori.php'
          </script>";
		} else {
			echo "<script>
            alert('Error : ". mysqli_error($conn) ."')
            window.location.href = 'index.php'
          </script>";
		}
	}
}
?>