function cekInputNamaProduk() {
  let namaProduk = document.forms["formProduk"]["namaProduk"].value;
  if (namaProduk == "") {
    alert("Nama Produk Harus Diisi");
    return false; // menghentikan pengiriman form
  }
  return true; // mengizinkan pengiriman form jika kondisi terpenuhi
}

function cekJumlahHurufKode() {
  var nomorBpom = document.getElementById("inputNomorBPOM").value;
  if (nomorBpom.length > 10) {
    alert("Nomor BPOM tidak boleh lebih dari 10 karakter");
    document.getElementById("inputNomorBPOM").value = nomorBpom.substring(
      0,
      10
    ); // Memotong input menjadi 10 karakter
  }
}
