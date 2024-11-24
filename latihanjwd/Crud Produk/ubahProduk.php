<?php
$nomorBpom = $_GET['nomorBpom'];
// print_r($nomorBpom);

$db = mysqli_connect("localhost", "root", "", "latihanjwdsaya");
$query = "SELECT * FROM produk where nomorBpom = '$nomorBpom'";
$result = mysqli_query($db, $query);
// print($query);

$produk = mysqli_fetch_assoc($result);
// print_r($produk);
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
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 mx-5 border-bottom">
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
      <button type="button" class="btn btn-outline-primary me-2">Login</button>
      <button type="button" class="btn btn-primary">Sign-up</button>
    </div>
  </header>
  <!-- akhir header -->

  <!-- awal konten -->
  <div class="container my-5">
    <div>
      <h2>Form Ubah Data</h2>
    </div>
    <form
      method="post"
      action="ubahProdukHandler.php"
      class="row g-3"
      name="formProduk"
      onsubmit="return cekInputNamaProduk()"
      enctype="multipart/form-data">
      <div class="col-6">
        <label for="inputNomorBPOM" class="form-label">Nomor BPOM</label>
        <input
          type="text"
          class="form-control"
          id="inputNomorBPOM"
          name="nomorBpom"
          required
          value="<?= $produk['nomorBpom'] ?>"
          oninput="cekJumlahHurufKode()" />
      </div>

      <div class="col-6">
        <label for="inputNamaProduk" class="form-label">Nama Produk</label>
        <input
          type="text"
          class="form-control"
          id="inputNamaProduk"
          name="namaProduk"
          value="<?= $produk['namaProduk'] ?>" />
      </div>

      <div class="col-md-4">
        <label for="inputState" class="form-label">Pilih</label>
        <select id="inputState" class="form-select" name="jenisProduk">
          <option selected>Pilih Jenis...</option>
          <option <?php if ($produk['jenisProduk'] == 'Suplemen') {
                    echo 'selected';
                  } ?>>Suplemen</option>
          <option <?php if ($produk['jenisProduk'] == 'Vitamin') {
                    echo 'selected';
                  } ?>>Vitamin</option>
          <option <?php if ($produk['jenisProduk'] == 'Skincare') {
                    echo 'selected';
                  } ?>>Skincare</option>
          <option>Body Care</option>
        </select>
      </div>

      <div class="col-md-4">
        <label for="inputCity" class="form-label">Harga</label>
        <input
          type="text"
          class="form-control"
          id="inputCity"
          name="hargaProduk"
          required
          value="<?= $produk['hargaProduk'] ?>" />
      </div>

      <div class="mb-3 col-md-4">
        <label for="gambarProduk" class="form-label">Upload gambar produk</label>
        <input
          class="form-control"
          type="file"
          id="gambarProduk"
          name="gambarProduk"
          value="<?= $produk['gambarProduk'] ?>" />
        <?php if ($produk['gambarProduk']): ?>
        <?php else: ?>
          <img id="previewImage" style="display: none; max-width: 100%; height: auto;">
        <?php endif; ?>
      </div>

      <div class="col-md-6">
        <label for="inputState" class="form-label">Ketersediaan</label>
        <div class="form-check">
          <input
            class="form-check-input"
            type="radio"
            name="ketersediaanProduk"
            id="flexRadioDefault1"
            value="1"
            <?php if ($produk['ketersediaanProduk'] == '1') {
              echo 'checked';
            } ?> />
          <label class="form-check-label" for="flexRadioDefault1">
            Tersedia
          </label>
        </div>
        <div class="form-check">
          <input
            class="form-check-input"
            type="radio"
            name="ketersediaanProduk"
            for="flexRadioDefault2"
            value="0"
            <?php if ($produk['ketersediaanProduk'] == '0') {
              echo 'checked';
            } ?> />
          <label class="form-check-label" for="flexRadioDefault2">
            Kosong
          </label>
        </div>
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
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
  <script src="assets/js/app.js"></script>
</body>

</html>