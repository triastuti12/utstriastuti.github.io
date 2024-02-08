<?php
session_start();
include 'confik/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST["nim"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM mahasiswa WHERE nim = :nim AND password = :password AND status = 'Aktif'";
    
    try {
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $_SESSION["nim"] = $nim;
            echo "<script>
                alert('login berhasil');
                window.location.href = 'index.php'        
               </script>";
        } else {
            echo "<script>
                alert('Login Gagal. Pastikan NIM dan Password benar. Atau status Anda tidak aktif');
                window.location.href = 'login.php'        
               </script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
