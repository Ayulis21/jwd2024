function cekPengarang() {
  let pengarang = document.forms["formBuku"]["pengarang"].value;
  if (pengarang == "") {
    alert("Pengarang tidak boleh kosong");
    // menghentikan pengiriman
    return false;
  }
  // mengizinkan pengiriman form jika kondisi terpenuhi
  return true;
}

function cekJumlahHurufKode() {
  let input = document.getElementById("kodebuku").value;
  if (input.length > 5) {
    alert("kode maksimal 5 huruf");
  }
}
