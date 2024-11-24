<pre>
    <?php
        $kode = $_GET['kodebuku'];
        $conn = mysqli_connect("localhost", "root", "", "jwd2024");
        $query="DELETE FROM buku WHERE kode='$kode'";
        mysqli_query($conn, $query);
        $jumlahBerhasil=mysqli_affected_rows($conn);
        print($query);
    if( $jumlahBerhasil > 0 ) {
		echo "
			<script>
				alert('data berhasil dihapus!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal dihapus!');
				document.location.href = 'index.php';
			</script>
		";
	}
    ?>
</pre>