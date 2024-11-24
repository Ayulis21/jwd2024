<?php
print_r($_POST);
$nomorBpom = $_POST['nomorBpom'];
$namaProduk = $_POST['namaProduk'];
$jenisProduk = $_POST['jenisProduk'];
$hargaProduk = $_POST['hargaProduk'];
$ketersediaanProduk = $_POST['ketersediaanProduk'];

// File handling
$gambarProduk = $_FILES['gambarProduk'];
$namaFile = $gambarProduk['name'];
$tmpName = $gambarProduk['tmp_name'];
$folderTujuan = '../images/' . $namaFile; // Sesuaikan dengan direktori penyimpanan Anda

// Move uploaded file to desired directory
if (move_uploaded_file($tmpName, $folderTujuan)) {
    echo "File berhasil diunggah.";
} else {
    echo "Gagal mengunggah file.";
}

// Koneksi ke database
$db = mysqli_connect("localhost", "root", "", "latihanjwdsaya");

// Update data produk ke database
$query = "UPDATE produk SET 
            namaProduk='$namaProduk',
            jenisProduk='$jenisProduk',
            hargaProduk='$hargaProduk',
            gambarProduk='$namaFile',
            ketersediaanProduk='$ketersediaanProduk'
          WHERE nomorBpom='$nomorBpom'";

mysqli_query($db, $query);

// Cek apakah data berhasil diupdate
$jumlahBerhasil = mysqli_affected_rows($db);
if ($jumlahBerhasil > 0) {
    echo "
        <script>
            alert('Data berhasil diupdate!');
            document.location.href = '../index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data gagal diupdate!');
            document.location.href = '../index.php';
        </script>
    ";
}
