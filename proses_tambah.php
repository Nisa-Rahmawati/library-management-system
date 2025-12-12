<?php
// proses_tambah.php
include 'config.php';

if ($_POST) {
    // Ambil data dari form
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];

    // Validasi input (pastikan tidak kosong)
    if (empty($isbn) || empty($judul) || empty($pengarang) || empty($penerbit) || empty($tahun_terbit)) {
        die("Semua field harus diisi!");
    }
    
    // Query INSERT untuk menambah data baru
    $query = "INSERT INTO buku (isbn, judul, pengarang, penerbit, tahun) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssssi",$isbn, $judul, $pengarang, $penerbit, $tahun_terbit);
    
    // Eksekusi query
    if ($stmt->execute()) {
        echo "<script>
                alert('Data mata kuliah berhasil ditambahkan!');
                window.location.href = 'index.php';
                </script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $mysqli->close();
}
?>