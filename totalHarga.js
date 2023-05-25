function hitungTotalHarga() {
    // Daftar barang dan jumlahnya
    var barangA = {
        harga: 10000,
        jumlah: 5
    };

    var barangB = {
        harga: 15000,
        jumlah: 3
    };

    var barangC = {
        harga: 20000,
        jumlah: 2
    };

    // Menghitung total harga
    var totalHarga = (barangA.harga * barangA.jumlah) + (barangB.harga * barangB.jumlah) + (barangC.harga * barangC.jumlah);

    // Menampilkan hasil
    var resultElement = document.getElementById("result");
    resultElement.innerHTML = "Total harga pembelian adalah: " + totalHarga;
}
