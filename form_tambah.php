<!-- form_tambah.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h3>Tambah Data Buku</h3>
    
    <form action="proses_tambah.php" method="POST">
        <label for="isbn">ISBN:</label><br>
        <input type="text" id="isbn" name="isbn" required><br>

        <label for="judul">Judul Buku:</label><br>
        <input type="text" id="judul" name="judul" required><br>
        
        <label for="pengarang">Pengarang Buku:</label><br>
        <input type="text" id="pengarang" name="pengarang" required><br>

        <label for="penerbit">Penerbit Buku:</label><br>
        <input type="text" id="penerbit" name="penerbit" required><br>
        
        <label for="tahun_terbit">Tahun Terbit:</label><br>
        <input type="number" id="tahun_terbit" name="tahun_terbit" required><br><br>
        
        <button type="submit">Simpan Data</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>