<?php 
$server = "SATRIOWISNU\\SQLEXPRESS"; 
$database = "pendataan_hewan";
$user = "";  
$pass = ""; 

try {
    $conn = new PDO("sqlsrv:server=$server;Database=$database;", $user, $pass);
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
    exit; 
}
?>
