<pre>
<?php
print_r($_POST);
$nomorBpom = $_GET['nomorBpom'];
$db = mysqli_connect("localhost", "root", "", "latihanjwdsaya");
$query = "DELETE FROM produk WHERE nomorBpom='$nomorBpom'";
mysqli_query($db, $query);

// cek kondisi dengan menampilkan alert
$jumlahBerhasil = mysqli_affected_rows($db);
if ($jumlahBerhasil > 0) {
    echo "
            <script>
                alert('data berhasil dihapus!');
                document.location.href = '../index.php';
            </script>
        ";
} else {
    echo "
            <script>
                alert('data gagal dihapus!');
                document.location.href = '../index.php';
            </script>
        ";
}
?>
</pre>