<?php 
include("database/konekdb.php");

$id_hewan = $_GET['id_hewan'] ?? null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $umur = $_POST['umur'];
    $jumlah = $_POST['jumlah'];
    
    if ($jumlah <= 0) {
        echo "<script>alert('Jumlah tidak boleh kurang dari 1.');</script>";
    } else {
        $sql = "UPDATE hewan SET nama = ?, jenis = ?, umur = ?, jumlah = ? WHERE id_hewan = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt->execute([$nama, $jenis, $umur, $jumlah, $id_hewan])) {
            header('Location: index.php');
            exit;
    }
 }
}
// Ambil data hewan untuk ditampilkan di form
$sql = "SELECT * FROM hewan WHERE id_hewan = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_hewan]);
$hewan = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Hewan</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body><h1 style="text-align: center;">Edit Data Hewan</h1>
<div class="container form-container">
    <form action="" method="POST">
        <input type="text" name="nama" value="<?php echo $hewan['nama']; ?>" placeholder="Nama" required>
        <input type="text" name="jenis" value="<?php echo $hewan['jenis']; ?>" placeholder="Jenis" required>
        <input type="text" name="umur" value="<?php echo $hewan['umur']; ?>" placeholder="Umur" required>
        <input type="number" name="jumlah" value="<?php echo $hewan['jumlah']; ?>" placeholder="Jumlah" min="1" required>
        <button type="submit" class="submit-btn">Perbarui</button>
    </form>
    <!-- <a href="index.php" class="edit-btn">Kembali</a> -->
</div>
    </div>
</body>
</html>

