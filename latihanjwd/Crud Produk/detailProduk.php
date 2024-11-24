<?php
$db = mysqli_connect("localhost", "root", "", "latihanjwdsaya");
$semuaProduk = mysqli_query($db, "SELECT * FROM produk");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>LATIHAN JWD SAYA</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
</head>

<body>
  <!-- header awal-->
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <div class="col-md-3 mb-2 mb-md-0">
      <!-- <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
          <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a> -->
    </div>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="../index.php" class="nav-link px-2">Home</a></li>
      <li><a href="detailProduk" class="nav-link px-2 link-secondary">Data Produk</a></li>
      <li><a href="../promo/promo.php" class="nav-link px-2">Promo</a></li>
      <li><a href="../promo/promo.php" class="nav-link px-2">FAQs</a></li>
      <li><a href="../promo/promo.php" class="nav-link px-2">About</a></li>
    </ul>

    <div class="col-md-3 text-end">
      <a href="login.php"><button type="button" class="btn btn-outline-primary me-2">Login</button></a>
      <a href="registrasi.php"><button type="button" class="btn btn-outline-primary me-2">Sign Up</button></a>
    </div>
  </header>
  <!-- akhir header -->

  <!-- awal konten -->
  <div class="container my-5">
    <div class="row">
      <div class="col-md-8">
        <h2>Data Produk</h2>
      </div>
      <div class="col-sm-4 text-end">
        <a href="tambahProduk.html"><button type="button" class="btn btn-primary">Tambah Produk</button>
        </a>
      </div>
    </div>
    <table class="table mx-6">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nomor BPOM</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Jenis Produk</th>
          <th scope="col">Harga</th>
          <th scope="col">Gambar</th>
          <th scope="col">Ketersediaan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        foreach ($semuaProduk as $produk) { ?>
          <tr>
            <th scope="row">
              <?= $i++; ?>
            </th>
            <td><?= $produk['nomorBpom'] ?></td>
            <td><?= $produk['namaProduk'] ?></td>
            <td><?= $produk['jenisProduk'] ?></td>
            <td><?= $produk['hargaProduk'] ?></td>
            <td>
              <img src="images/<?= $produk['gambarProduk'] ?>" alt="gambar" width="75px" height="100px">
            </td>

            <td>
              <?=
              $produk['ketersediaanProduk'] == 1 ? 'Tersedia' : 'Kosong';
              // $buku['ketersediaan']
              ?>

            </td>
            <td>
              <a href="ubahProduk.php?nomorBpom=<?= $produk['nomorBpom'] ?>"><button type="button" class="btn btn-primary">Ubah</button></a>
              <a href="hapusProduk.php?nomorBpom=<?= $produk['nomorBpom'] ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <!-- konten akhir -->

  <!-- footer awal-->
  <div class="container">
    <footer
      class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 border-top">
      <div class="col mb-3">
        <a
          href="/"
          class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
          <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>
        <p class="text-body-secondary">© 2024</p>
      </div>

      <div class="col mb-3"></div>

      <div class="col mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2">
            <a href="../index.php" nav-link p-0 text-body-secondary">Home</a>
          </li>
          <li class="nav-item mb-2">
            <a href="../promo/promo.php" class="nav-link p-0 text-body-secondary">Features</a>
          </li>
          <li class="nav-item mb-2">
            <a href="../promo/promo.php" class="nav-link p-0 text-body-secondary">Pricing</a>
          </li>
          <li class="nav-item mb-2">
            <a href="../promo/promo.php" class="nav-link p-0 text-body-secondary">FAQs</a>
          </li>
          <li class="nav-item mb-2">
            <a href="../promo/promo.php" class="nav-link p-0 text-body-secondary">About</a>
          </li>
        </ul>
      </div>

      <div class="col mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2">
            <a href="../index.php" nav-link p-0 text-body-secondary">Home</a>
          </li>
          <li class="nav-item mb-2">
            <a href="../promo/promo.php" class="nav-link p-0 text-body-secondary">Features</a>
          </li>
          <li class="nav-item mb-2">
            <a href="../promo/promo.php" class="nav-link p-0 text-body-secondary">Pricing</a>
          </li>
          <li class="nav-item mb-2">
            <a href="../promo/promo.php" class="nav-link p-0 text-body-secondary">FAQs</a>
          </li>
          <li class="nav-item mb-2">
            <a href="../promo/promo.php" class="nav-link p-0 text-body-secondary">About</a>
          </li>
        </ul>
      </div>

      <div class="col mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2">
            <a href="../index.php" nav-link p-0 text-body-secondary">Home</a>
          </li>
          <li class="nav-item mb-2">
            <a href="../promo/promo.php" class="nav-link p-0 text-body-secondary">Features</a>
          </li>
          <li class="nav-item mb-2">
            <a href="../promo/promo.php" class="nav-link p-0 text-body-secondary">Pricing</a>
          </li>
          <li class="nav-item mb-2">
            <a href="../promo/promo.php" class="nav-link p-0 text-body-secondary">FAQs</a>
          </li>
          <li class="nav-item mb-2">
            <a href="../promo/promo.php" class="nav-link p-0 text-body-secondary">About</a>
          </li>
        </ul>
      </div>
    </footer>
  </div>
  <!-- footer akhir-->

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>

<?php
// $semuaProduk=[
// [
// 'nomorBpom'=>'AB12',
// 'namaProduk'=>'Produk 1',
// 'jenisProduk'=>'Suplemen',
// 'hargaProduk'=>'Rp.100.000',
// 'gambarProduk'=>'p1.jpg',
// 'ketersediaanProduk'=>'Tersedia',
// ],
// [
// 'nomorBpom'=>'AB12',
// 'namaProduk'=>'Produk 2',
// 'jenisProduk'=>'Suplemen',
// 'hargaProduk'=>'Rp. 200.000',
// 'gambarProduk'=>'p1.jpg',
// 'ketersediaanProduk'=>'Kosong',
// ],
// ];
