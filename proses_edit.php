<?php
// proses_edit.php
include 'config.php';

if ($_POST) {
    // Ambil data dari form
    $id = $_POST['id'];
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];
    
    // Validasi input
    if (empty($isbn) || empty($judul) || empty($pengarang) || empty($penerbit) || empty($tahun_terbit)) {
        die("Semua field harus diisi!");
    }
    
    // Query UPDATE untuk mengubah data
    $query = "UPDATE buku SET isbn = ?, judul = ?, pengarang = ?, penerbit = ?, tahun_terbit = ? WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssssii", $isbn, $judul, $pengarang, $penerbit, $tahun_terbit, $id);
    
    // Eksekusi query update
    if ($stmt->execute()) {
        echo "<script>
                alert('Data buku berhasil diupdate!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $mysqli->close();
}
?>