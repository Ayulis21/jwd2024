<?php
print_r($_POST);

// Mengambil data dari form
$nomorBpom = $_POST['nomorBpom'];
$namaProduk = $_POST['namaProduk'];
$jenisProduk = $_POST['jenisProduk'];
$hargaProduk = $_POST['hargaProduk'];
$gambarProduk = $_FILES['gambarProduk'];
$ketersediaanProduk = $_POST['ketersediaanProduk'];

// Penanganan file gambar
$namaFile = $gambarProduk['name'];
$tmpName = $gambarProduk['tmp_name'];
$folderTujuan = '../images/' . $namaFile;

// Pindahkan file yang diunggah ke direktori tujuan
if (move_uploaded_file($tmpName, $folderTujuan)) {
    echo "File berhasil diunggah.";
} else {
    echo "Gagal mengunggah file.";
}

// Menghubungkan dengan database
$db = mysqli_connect("localhost", "root", "", "latihanjwdsaya");

// Tambah data ke database
$query = "INSERT INTO produk (nomorBpom, namaProduk, jenisProduk, hargaProduk, gambarProduk, ketersediaanProduk) VALUES ('$nomorBpom', '$namaProduk', '$jenisProduk', '$hargaProduk', '$namaFile', '$ketersediaanProduk')";
print_r($query);

// // Menjalankan query
mysqli_query($db, $query);

// Cek kondisi dengan menampilkan alert
$jumlahBerhasil = mysqli_affected_rows($db);
if ($jumlahBerhasil > 0) {
    echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = '../index.php';
            </script>
        ";
} else {
    echo "
            <script>
                alert('Data gagal ditambahkan: " . mysqli_error($db) . "');
                document.location.href = '../index.php';
            </script>
        ";
}

// Menutup koneksi ke database
mysqli_close($db);
