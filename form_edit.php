<!-- form_edit.php -->
<?php
include 'config.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Query untuk mengambil data berdasarkan ID
$stmt = $mysqli->prepare("SELECT * FROM buku WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

// Jika data tidak ditemukan, hentikan eksekusi
if (!$data) {
    die("Data buku tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mata Kuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h3>Edit Data Buku</h3>
    
    <form action="proses_edit.php" method="POST">
        <!-- Input hidden untuk menyimpan ID -->
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        
        <label for="nama">ISBN:</label><br>
        <input type="text" id="isbn" name="isbn" 
               value="<?php echo htmlspecialchars($data['isbn']); ?>" required><br><br>
        
        <label for="judul">Judul buku:</label><br>
        <input type="text" id="judul" name="judul" 
               value="<?php echo htmlspecialchars($data['judul']); ?>" required><br><br>
        
        <label for="pengarang">Pengarang:</label><br>
        <input type="text" id="pengarang" name="pengarang" 
               value="<?php echo htmlspecialchars($data['pengarang']); ?>" required><br><br>

        <label for="penerbit">Penerbit:</label><br>
        <input type="text" id="penerbit" name="penerbit" 
               value="<?php echo htmlspecialchars($data['penerbit']); ?>" required><br><br>
        
        <label for="tahun_terbit">Tahun Terbit:</label><br>
        <input type="number" id="tahun_terbit" name="tahun_terbit"
               value="<?php echo $data['tahun_terbit']; ?>" required><br><br>
        
        <button type="submit">Update Data</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>