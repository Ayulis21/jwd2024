<?php
$db = mysqli_connect("localhost", "root", "", "latihanjwdsaya");

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek apakah email sudah terdaftar
    $checkQuery = "SELECT * FROM users WHERE email = '$email'";
    $checkResult = mysqli_query($db, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $error = "Email sudah terdaftar!";
    } else {
        // Insert data ke dalam tabel users
        $query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        if (mysqli_query($db, $query)) {
            header("Location: login.php"); // Arahkan ke halaman login setelah berhasil daftar
        } else {
            $error = "Pendaftaran gagal, coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - LATIHAN JWD SAYA</title>
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
            <a href="login.php"><button type="button" class="btn btn-outline-primary me-2">Login</button></a>
        </div>
    </header>
    <!-- akhir header -->

    <!-- konten registrasi -->
    <div class="container my-5">
        <h2>Sign Up</h2>
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
            <button type="submit" name="register" class="btn btn-primary">Daftar</button>
        </form>
    </div>
    <!-- konten akhir -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>