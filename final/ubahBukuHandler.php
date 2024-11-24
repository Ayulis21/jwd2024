<pre>
    <?php
        print_r($_POST);
        $kode = $_POST['kode'];
        // $pengarang = $_POST['pengarang'];
        $judul = $_POST['judul'];
        // $penerbit = $_POST['penerbit'];
        $jenis = $_POST['jenis'];

        if(isset($_POST['kategori_rpl'])){
            $kategori_rpl = $_POST['kategori_rpl'];
        } else {
            $kategori_rpl = 0;
        }
        
        if(isset($_POST['kategori_elektronika'])){
            $kategori_elektronika = $_POST['kategori_elektronika'];
        } else{
            $kategori_elektronika = 0;
        }
        
        $ketersediaan = $_POST['ketersediaan'];
        // $harga = $_POST['harga'];
        // $jumlah = $_POST['jumlah'];
        // $total = $_POST['total'];
        // $cover = $_POST['cover'];

        $conn = mysqli_connect("localhost", "root", "", "jwd2024");
        $query="UPDATE buku2 SET judul='$judul',jenis='$jenis',kategori_rpl='$kategori_rpl',kategori_elektronika='$kategori_elektronika',ketersediaan='$ketersediaan' WHERE kode='$kode'";
        
        mysqli_query($conn, $query);
        $jumlahBerhasil=mysqli_affected_rows($conn);
    if( $jumlahBerhasil > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
			</script>
		";
	}
    ?>
</pre>