<header>
  <div class="container">
  <h1><a href="index.php">DEHANEX'S</a></h1>
  <ul>
      <li><a href="index.php">Home</a></li>
      <?php if($_SESSION["login-sepatu"] == "admin") : ?>
<<<<<<< HEAD
        <li><a href="admin">Dashboard Admin</a></li>
=======
        <li><a href="admin">Dashboard</a></li>
>>>>>>> 614333bd81d39045b8a79afe6fe790042d4ed1c4
      <?php else : ?>
        <li><a href="produk.php">Produk</a></li>
        <li><a href="cart.php">Keranjang saya</a></li>
        <li><a href="pesanan.php">Pesanan Anda</a></li>
<<<<<<< HEAD
      <?php endif ;?> |
      <li><a href="logout.php">Login</a></li>
      <li><a href="logout.php"  onclick="return confirm('Apakah anda yakin ingin keluar ?')">Keluar</a></li> 
=======
      <?php endif ;?>
      <li><a href="logout.php">Keluar</a></li>
>>>>>>> 614333bd81d39045b8a79afe6fe790042d4ed1c4
      
  </ul>
  </div>
</header>