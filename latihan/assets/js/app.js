function cekPengarang() {
  let pengarang = document.forms["formBuku"]["pengarang"].value;
  if (pengarang == "") {
    alert("Pengarang tidak boleh kosong");
  }
}

function updateTotal() {
  harga = document.getElementById("hargaBuku").value;
  jumlah = document.getElementById("jumlahBuku").value;
  total = harga * jumlah;

  document.getElementById("totalBuku").value = total;
}
