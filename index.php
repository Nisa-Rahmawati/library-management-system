<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Buku</h2>
    
    <!-- Tombol untuk tambah data baru -->
    <a href="form_tambah.php">Tambah Buku Baru</a><br><br>
    
    <!-- Form pencarian -->
    <form method="GET">
        <input type="text" name="search" placeholder="Cari nama buku..." 
                value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <button type="submit">Cari</button>
        <a href="index.php">Reset</a>
    </form><br>
    
    <?php
    include 'config.php';

    // inisiasi koneksi
    
    // Ambil kata kunci pencarian jika ada
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    
    // Query berdasarkan pencarian
    if (!empty($search)) {
        // Jika ada pencarian, cari mata kuliah yang namanya mengandung kata kunci
        $query = "SELECT * FROM buku WHERE judul LIKE ? ORDER BY judul ASC";
        $stmt = $mysqli->prepare($query);
        $searchParam = "%" . $search . "%";
        $stmt->bind_param("s", $searchParam);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        // Jika tidak ada pencarian, tampilkan semua data
        $query = "SELECT * FROM buku ORDER BY judul ASC";
        $result = $mysqli->query($query);
    }
    ?>
    
    <!-- Tabel untuk menampilkan data -->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>ISBN</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $no = 1;
                // Loop untuk menampilkan setiap baris data
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" .  $no++ . "</td>";
                    echo "<td>" .  htmlspecialchars($row["isbn"]) . "</td>";
                    echo "<td>" .  htmlspecialchars($row["judul"]) . "</td>";
                    echo "<td>" .  htmlspecialchars($row["pengarang"]) . "</td>";
                    echo "<td>" .  htmlspecialchars($row["penerbit"]) . "</td>";
                    echo "<td>" .  $row["tahun_terbit"] . "</td>";
                    echo "<td>";
                    echo "<a href='form_edit.php?id=" . $row["id"] . "'>Edit</a> | ";
                    echo "<a href='hapus.php?id=" . $row["id"] . "' 
                            onclick='return confirm(\"Yakin hapus buku ini?\")'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data mata kuliah</td></tr>";
            }
            ?>
        </tbody>
    </table>
    
    <?php $mysqli->close(); ?>
</body>
</html>