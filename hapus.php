<?php
// hapus.php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Ambil judul buku untuk pesan konfirmasi
    $stmt = $mysqli->prepare("SELECT judul FROM buku WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    
    if (!$data) {
        die("Data mata kuliah tidak ditemukan!");
    }
    
    // Query DELETE untuk menghapus data
    $stmt = $mysqli->prepare("DELETE FROM buku WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "<script>
                alert('buku " . htmlspecialchars($data['judul']) . " berhasil dihapus!');
                window.location.href = 'index.php';
                </script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $mysqli->close();
} else {
    // Jika tidak ada ID, redirect ke halaman utama
    header("Location: index.php");
    exit();
}
?>