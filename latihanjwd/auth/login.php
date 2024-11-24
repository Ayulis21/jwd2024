<?php
// session_start();
$db = mysqli_connect("localhost", "root", "", "latihanjwdsaya");

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Query untuk mencocokkan email dan password
  $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($db, $query);

  if (mysqli_num_rows($result) > 0) {
    $_SESSION['user'] = $email;
    header("Location: index.php"); // Arahkan ke halaman utama setelah login berhasil
  } else {
    $error = "Email atau password salah!";
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - LATIHAN JWD SAYA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
  <!-- header awal -->
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <div class="col-md-3 mb-2 mb-md-0"></div>
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="../index.php" class="nav-link px-2 link-secondary">Home</a></li>
      <li><a href="../Crud Produk/detailProduk.php" class="nav-link px-2">Data Produk</a></li>
      <li><a href="../promo/promo.php" class="nav-link px-2">Promo</a></li>
      <li><a href="../promo/promo.php" class="nav-link px-2">FAQs</a></li>
      <li><a href="../promo/promo.php" class="nav-link px-2">About</a></li>
    </ul>
    <div class="col-md-3 text-end">
      <a href="register.php"><button type="button" class="btn btn-outline-primary me-2">Sign Up</button></a>
    </div>
  </header>
  <!-- akhir header -->

  <!-- konten login -->
  <div class="container my-5">
    <h2>Login</h2>
    <?php if (isset($error)) {
      echo "<div class='alert alert-danger'>$error</div>";
    } ?>
    <form method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" required>
      </div>
      <button type="submit" name="login" class="btn btn-primary">Login</button>
    </form>
  </div>
  <!-- konten akhir -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>