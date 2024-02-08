<?php

$nim = $_SESSION["nim"];

if (isset($_GET['kode_mk']) && is_numeric($_GET['kode_mk'])) {
    $kode_mk = $_GET['kode_mk'];

    $sql_hapus_krs = "DELETE FROM krs WHERE nim = :nim AND kode_mk = :kode_mk";

    try {
        $stmt_hapus_krs = $con->prepare($sql_hapus_krs);
        $stmt_hapus_krs->bindParam(':nim', $nim);
        $stmt_hapus_krs->bindParam(':kode_mk', $kode_mk);
        $result_hapus_krs = $stmt_hapus_krs->execute();

        if ($result_hapus_krs) {
            echo "<script>
                alert('mata kuliah berhasil dihapus');
                window.location.href = 'index.php?page=krs'        
               </script>";
        } else {
            echo "<script>
                alert('Gagal menghapus mata kuliah.');
                window.location.href = 'index.php?page=krs'        
               </script>";
        }
        echo "<script>
                alert('mata kuliah berhasil dihapus');
                window.location.href = 'index.php?page=krs'        
               </script>";
       
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Kode Mata Kuliah tidak tersedia atau tidak valid.";
}
?>
