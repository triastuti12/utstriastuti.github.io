<?php

$nim = $_SESSION["nim"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_mk = $_POST["kode_mk"];
    $kelas = $_POST["kelas"];

    $sql_check = "SELECT * FROM krs WHERE nim = :nim AND kode_mk = :kode_mk";

    try {
        $stmt_check = $con->prepare($sql_check);
        $stmt_check->bindParam(':nim', $nim);
        $stmt_check->bindParam(':kode_mk', $kode_mk);
        $stmt_check->execute();

        if ($stmt_check->rowCount() > 0) {
            echo "<script>
                alert('Mata Kuliah sudah dipilih sebelumnya.');
                window.location.href = 'index.php?page=krs'        
               </script>";
        } else {
            $sql_simpan = "INSERT INTO krs (nim, kode_mk, kelas) VALUES (:nim, :kode_mk, :kelas)";
            
            try {
                $stmt_simpan = $con->prepare($sql_simpan);
                $stmt_simpan->bindParam(':nim', $nim);
                $stmt_simpan->bindParam(':kode_mk', $kode_mk);
                $stmt_simpan->bindParam(':kelas', $kelas);

                if ($stmt_simpan->execute()) {
                    echo "<script>
                alert('pengambilan Mata Kuliah berhasil');
                window.location.href = 'index.php?page=krs'        
               </script>";
                } else {
                    echo "<script>
                alert('Gagal menyimpan data.');
                window.location.href = 'index.php?page=krs'        
               </script>";
                   
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
