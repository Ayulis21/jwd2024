<?php
// $semua_buku=[
//   [
//     'kode'=>'B2341',
//     'judul'=>'PHP pemula',
//     'cover'=>'cover.jpg',
//     'pengarang'=>'andi dika',
//     'penerbit'=>'gramedia',
//     'jenis'=>'textbook',
//     'kategori'=>'IT, elektronika',
//     'ketersediaan'=>'ada',
//     'harga'=>500,
//     'jumlah'=>10,
//   ],
//   [
//     'kode'=>'B1234',
//     'judul'=>'Android',
//     'cover'=>'cover1.jpg',
//     'pengarang'=>'andi dika',
//     'penerbit'=>'gramedia',
//     'jenis'=>'textbook',
//     'kategori'=>'IT, elektronika',
//     'ketersediaan'=>'ada',
//     'harga'=>500,
//     'jumlah'=>10,
//   ],
// ];

$conn = mysqli_connect("localhost", "root","", "jwd2024");
$semua_buku = mysqli_query($conn, "SELECT * FROM buku2");
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
      <div class="row">
        <div class="col-sm-8">
          <h2>Data Buku</h2>
        </div>
        <div class="col-sm-4 text-end">
          <a href="tambahbuku.html"
            ><button type="button" class="btn btn-primary">
              Tambah Buku
            </button></a
          >
        </div>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode</th>
            <th scope="col">Judul</th>
            <th scope="col">Jenis</th>
            <th scope="col">Kategori</th>
            <th scope="col">Ketersediaan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i = 1;
            foreach($semua_buku as $buku){
          ?>          
          <tr>
            <th scope="row">
              <?= $i;?>
            </th>
            <td><?=$buku['kode']?></td>
            <td><?= $buku['judul']?></td>
            <td><?= $buku['jenis']?></td>
            <td>
              <?php
                $kategori = "";
                if($buku['kategori_rpl']==1){
                  $kategori = $kategori.'RPL'.",";
                } if($buku['kategori_elektronika']==1){
                  $kategori = $kategori." ".'Elektronika';
                }
                echo $kategori;
              ?>
            </td>
            <td>
              <?= 
                $buku['ketersediaan'] == 1 ? 'Tersedia' : 'Tidak Tersedia';
                // $buku['ketersediaan']
              ?>

            </td>
            <td>
              <a href="ubahbuku.php?kodebuku=<?=$buku['kode']?>"><button type="submit" class="btn btn-primary">Ubah</button></a>
              <a href="hapusbuku.php?kodebuku=<?=$buku['kode']?>"><button type="submit" class="btn btn-danger">Hapus</button></a>
            </td>
          </tr>
          <?php
          $i++;
            };
          ?>
        </tbody>
      </table>
    </div>

    <div class="container">
      <footer
        class="d-flex flex-wrap justify-content-between align-items-center py-3 fixed-bottom my-4 mx-5 border-top"
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
  </body>
</html>
