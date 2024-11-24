<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: ./auth/login.php"); // Jika belum login, redirect ke halaman login
  exit();
}

$db = mysqli_connect("localhost", "root", "", "latihanjwdsaya");
$semuaProduk = mysqli_query($db, "SELECT * FROM produk");
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Depan - LATIHAN JWD SAYA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <style>
    /* Hover effect pada link navigation */
    .nav-link:hover {
      color: #0056b3 !important;
      /* Mengubah warna teks saat hover */
      background-color: #f0f0f0;
      /* Mengubah latar belakang saat hover */
      border-radius: 5px;
    }

    /* Hover effect pada tombol logout */
    .btn-outline-danger:hover {
      color: white;
      /* Warna teks menjadi putih */
      background-color: #dc3545;
      /* Warna latar belakang merah */
      border-color: #dc3545;
      /* Border merah saat hover */
    }
  </style>
</head>

<body>
  <!-- header awal -->
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <div class="col-md-3 mb-2 mb-md-0">
      <a href="index.php" class="text-decoration-none">
        <h2 class="text-primary">LATIHAN JWD SAYA</h2>
      </a>
    </div>
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="index.php" class="nav-link px-2 link-secondary">Home</a></li>
      <li><a href="./Crud Produk/detailProduk.php" class="nav-link px-2">Data Produk</a></li>
      <li><a href="./promo/promo.php" class="nav-link px-2">Promo</a></li>
      <li><a href="../promo/promo.php" class="nav-link px-2">FAQs</a></li>
      <li><a href="../promo/promo.php" class="nav-link px-2">About</a></li>
    </ul>
    <div class="col-md-3 text-end">
      <a href="logout.php"><button type="button" class="btn btn-outline-danger">Logout</button></a>
    </div>
  </header>
  <!-- akhir header -->

  <!-- konten utama -->
  <div class="container my-5">
    <h1>Selamat Datang, <?= $_SESSION['user']; ?>!</h1>
    <p>Berikut adalah daftar produk yang tersedia di platform kami:</p>

    <div class="row">
      <?php while ($produk = mysqli_fetch_assoc($semuaProduk)) { ?>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="images/<?= $produk['gambarProduk']; ?>" class="card-img-top" alt="Gambar Produk"
              width="100%" height="200px">
            <div class="card-body">
              <h5 class="card-title"><?= $produk['namaProduk']; ?></h5>
              <p class="card-text">Harga: Rp <?= number_format($produk['hargaProduk'], 0, ',', '.'); ?></p>
              <p class="card-text">Ketersediaan: <?= $produk['ketersediaanProduk'] == 1 ? 'Tersedia' : 'Kosong'; ?></p>
              <a href="detailProduk.php?nomorBpom=<?= $produk['nomorBpom']; ?>" class="btn btn-primary">Lihat Detail</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <!-- konten akhir -->

  <!-- footer awal -->
  <footer class="py-4 bg-light mt-5">
    <div class="container">
      <p class="text-center mb-0">© 2024 LATIHAN JWD SAYA</p>
    </div>
  </footer>
  <!-- footer akhir -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>