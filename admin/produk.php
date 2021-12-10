

<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Kelola Produk - Dehanex's</title>
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
																	<h2>Daftar Product</h2>
																	
																	<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2">Tambah Produk</button>
                                </div>
																<form action="">
																	<div class="row">
																		<div class="col-md-4">
																			<select class="custom-select" name="category" id="">
																				<?php foreach(mysqli_query($conn, "SELECT * from tb_kategori") as $c) : ?>
																					<option value="<?= $c['category_id'] ?>"><?= $c['category_name'] ?></option>
																				<?php endforeach; ?>
																			</select>
																		</div>
																		<div class="col-md-4">
																			<button type="submit" class="btn btn-info">Pilih</button>

																		</div>
																	</div>

																</form>
                                    <div class="data-tables datatable-dark">
										 <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
											<tr style="text-align: center;">
												<th>No.</th>
												<th>Nama Produk</th>
												<th>Kategori</th>
												<th>Harga</th>
												<th>Deskripsi</th>
												<th>Foto</th>
												<th>Stok</th>
												<th>Aksi</th>
											</tr></thead><tbody>
											<?php 
											if(isset($_GET['category'])){
												$id = $_GET['category'];

												$brg = mysqli_query($conn,"SELECT * from tb_product where category_id = $id order by product_id ASC");
											}else {

												$brg=mysqli_query($conn,"SELECT * from tb_product order by product_id ASC");
											}
											$no=1;
											foreach($brg as $p){

												?>
												
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $p['product_name'] ?></td>
													<td><?php 
														$id = $p['category_id'];
														$kategori = mysqli_query($conn, "SELECT * FROM tb_kategori WHERE category_id = $id");
														$kategori = mysqli_fetch_assoc($kategori);
														echo $kategori['category_name'];
													?></td>
													<td><?php echo "Rp. " . number_format($p['product_price']) ?></td>
													<td><?php echo $p['product_description'] ?></td>
													<td><img width="100px" src="product/<?php echo $p['product_image'] ?>" alt=""></td>
													<td><?= $p['product_status'] ?></td>
													<td><a href="edit-produk.php?id=<?= $p['product_id'] ?>">Edit</a> | <a href="hapus-produk.php?id=<?= $p['product_id'] ?>" onclick="return confirm('Apakah anda yakin?')">Hapus</a></td>
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
                <p>Copyrigth &#x00A9; By Dehanex's 2021</p>
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
							<h4 class="modal-title">Tambah Produk</h4>
						</div>
						<div class="modal-body">
							<form method="post" action="" enctype='multipart/form-data'>
								<div class="form-group">
									<label>Nama Produk</label>
									<input name="nama" type="text" class="form-control" required autofocus>
								</div>
								<div class="form-group">
									<label>Kategori</label>
									<select name="kategori" id="kategori" class="form-control">
										<?php
										$kategori = mysqli_query($conn, "SELECT * FROM tb_kategori");
										foreach($kategori as $k) :
										?>
											<option value="<?= $k['category_id'] ?>"><?= $k['category_name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group">
									<label>Harga</label>
									<input name="harga" type="number" class="form-control" required autofocus>
								</div>
								<div class="form-group">
									<label>Deskripsi</label>
									<input name="deskripsi" type="text" class="form-control" required autofocus>
								</div>
								<div class="form-group">
									<label>Stok</label>
									<input name="stok" type="number" class="form-control" required autofocus>
								</div>
								<div class="form-group">
									<label>Foto</label>
									<input class="form-control" type="file" id="name" name="foto">
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

if(isset($_POST["tambah"])){
	$nama = htmlspecialchars($_POST["nama"]);
	$kategori = htmlspecialchars($_POST["kategori"]);
	$harga = htmlspecialchars($_POST["harga"]);
	$deskripsi = htmlspecialchars($_POST["deskripsi"]);
	$stok = $_POST['stok'];

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

	//LOLOS CEK BROOO
	//generate nama baru random
	$foto = uniqid().'.'.$ekstensiGambar;
	move_uploaded_file($temp,'product/'.$foto);

	mysqli_query($conn, "INSERT INTO tb_product VALUES('','$kategori','$nama','$harga','$deskripsi','$foto',$stok)");

	if(mysqli_affected_rows($conn) > 0){
		echo "<script>
						alert('Berhasil menambahkan produk')
						window.location.href = 'produk.php'
					</script>";
	}else {
		echo "<script>
						alert('". mysqli_error($conn) ."')
						window.location.href = 'produk.php'
					</script>";
	}
}


?>