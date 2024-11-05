<?php 
include("database/konekdb.php");
// ------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $umur = $_POST['umur'];
    $jumlah = $_POST['jumlah'];
    if ($jumlah <= 0) {
        echo "<script>alert('Jumlah tidak boleh kurang dari 1.');</script>";
    } else {
        $sql = "INSERT INTO hewan (nama, jenis, umur, jumlah) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute([$nama, $jenis, $umur, $jumlah])) {
            header('Location: index.php');
            exit;
    }
  }
}
// ----------
$id_hewan = $_GET['hapus_id'] ?? null;
if ($id_hewan) {
    $sql = "DELETE FROM hewan WHERE id_hewan = ?";
    $stmt = $conn->prepare($sql);
   
    if ($stmt->execute([$id_hewan])) {
        header('Location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Hewan</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <h1 style="text-align: center;">Data Hewan</h1>
    <div class="container table-container">
        <table>
            <tr>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Umur</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
            <?php
            $sql = "SELECT * FROM hewan";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            // Menampilkan data
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>{$row['nama']}</td>
                        <td>{$row['jenis']}</td>
                        <td>{$row['umur']}</td>
                        <td>{$row['jumlah']}</td>
                        <td>
                            <a href='edit.php?id_hewan={$row['id_hewan']}' class='edit-btn'>Edit</a>
                            <a href='?hapus_id={$row['id_hewan']}' class='delete-btn' onclick='
                            return confirm(\"Apakah Anda yakin ingin menghapus hewan ini?\")'>Hapus</a>
                        </td>
                      </tr>";
            }
            ?>
        </table>
    </div>

    <div class="container form-container">
        <h2>Tambah Data Hewan</h2>
        <form action="" method="POST">
            <input type="text" name="nama" placeholder="Nama Hewan" required>
            <input type="text" name="jenis" placeholder="Jenis" required>
            <input type="text" name="umur" placeholder="Umur" required>
            <input type="number" name="jumlah" placeholder="Jumlah" min="1" required>
            <button type="submit" class="submit-btn">Tambah</button>
        </form>
    </div>
</body>
</html>