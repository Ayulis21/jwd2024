<?php
  $kodebuku = $_GET['kodebuku'];
  // print_r($kodebuku);
  $conn = mysqli_connect("localhost", "root","", "jwd2024");  
  $query = "SELECT * FROM buku2 where kode = '$kodebuku'";
  $result = mysqli_query($conn, $query);
  // print($query);
  $result = mysqli_query($conn, $query);
  $buku = mysqli_fetch_assoc($result);
  // print_r($buku);
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
  </head>
  <body>
    <!-- <div class="container"> -->
    <header
      class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 mx-5 border-bottom"
    >
      <div class="col-md-3 mb-2 mb-md-0">
        <a
          href="/"
          class="d-inline-flex link-body-emphasis text-decoration-none"
        >
          <i
            class="bi bi-house-door-fill"
            style="font-size: 2rem; color: cornflowerblue"
          ></i>
          <!-- <svg
              class="bi"
              width="40"
              height="32"
              role="img"
              aria-label="Bootstrap"
            >
              <use xlink:href="#bootstrap"></use>
            </svg> -->
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 link-secondary">Beranda</a></li>
        <li><a href="#" class="nav-link px-2">Buku</a></li>
        <li><a href="#" class="nav-link px-2">Anggota</a></li>
        <li><a href="#" class="nav-link px-2">FAQs</a></li>
        <li><a href="#" class="nav-link px-2">Tentang</a></li>
      </ul>

      <!-- <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-primary me-2">
          Login
        </button>
        <button type="button" class="btn btn-primary">Sign-up</button>
      </div> -->
    </header>
    <!-- </div> -->

    <div class="container">
      <div><h2>Form Ubah Buku</h2></div>

      <form
        method="post"
        action="ubahBukuHandler.php"
        class="row g-3"
        name="formBuku"
        onsubmit="return cekPengarang()"
        enctype="multipart/form-data"
      >
        <div class="col-md-6">
          <label for="kodebuku" class="form-label">Kode Buku</label>
          <input
            type="text"
            class="form-control"
            id="kodebuku"
            name="kode"
            required
            value="<?php echo $buku['kode']?>"
            oninput="cekJumlahHurufKode()"
          />
        </div>

        <div class="col-6">
          <label for="judulbuku" class="form-label">Judul Buku</label>
          <input
            type="text"
            class="form-control"
            id="judulbuku"
            name="judul"
            placeholder="PHP untuk Pemula"
            value="<?=$buku['judul']?>"
            required
          />
        </div>

        <div class="col-md-4">
          <label for="inputState" class="form-label">Jenis</label>
          <select id="inputState" class="form-select" name="jenis">
            <option selected>Jenis Buku...</option>
            <option <?php if ($buku['jenis']=='Buku Text') {echo 'selected';}?>>Buku Text</option>
            <option <?php if ($buku['jenis']=='Majalah') {echo 'selected';}?>> Majalah</option>
            <option <?php if ($buku['jenis']=='Kamus') {echo 'selected';}?> >Kamus</option>
            <option <?php if ($buku['jenis']=='Jurnal') {echo 'selected';}?>>Jurnal</option>
          </select>
        </div>

        <div class="col-md-4">
          <label for="inputState" class="form-label">Kategori Buku</label>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="teknologiinformasi"
              name="kategori_rpl"
              value="1"
              <?php if ($buku['kategori_rpl']==1) {echo 'checked';}?>
            />
            <label class="form-check-label" for="teknologiinformasi">
              Teknologi Informasi
            </label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="elektronika"
              name="kategori_elektronika"
              value="1"
              <?php if ($buku['kategori_elektronika']==1) {echo 'checked';}?>

            />
            <label class="form-check-label" for="elektronika">
              Elektronika
            </label>
          </div>
        </div>

        <div class="col-md-4">
          <label for="inputState" class="form-label">Ketersediaan</label>
          <div class="form-check">
            <input
              class="form-check-input"
              type="radio"
              name="ketersediaan"
              id="flexRadioDefault1"
              value="1"
              <?php if ($buku['ketersediaan']==1) {echo 'checked';}?>

            />
            <label class="form-check-label" for="flexRadioDefault1">
              Tersedia
            </label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="radio"
              name="ketersediaan"
              for="flexRadioDefault2"
              value="0"
              <?php if ($buku['ketersediaan']==0) {echo 'checked';}?>
            />
            <label class="form-check-label" for="flexRadioDefault2">
              Kosong
            </label>
          </div>
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
      </form>
    </div>

    <div class="container">
      <footer
        class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 mx-5 border-top fixed-bottom"
      >
        <p class="col-md-4 mb-0 text-body-secondary">© 2024 Company, Inc</p>
        <a
          href="/"
          class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none"
        >
          <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>

        <ul class="nav col-md-4 justify-content-end">
          <li class="nav-item">
            <a href="#" class="nav-link px-2 text-body-secondary">Beranda</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link px-2 text-body-secondary">Buku</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link px-2 text-body-secondary">Anggota</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link px-2 text-body-secondary">FAQs</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link px-2 text-body-secondary">Tentang</a>
          </li>
        </ul>
      </footer>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="assets/js/app.js"></script>
  </body>
</html>
