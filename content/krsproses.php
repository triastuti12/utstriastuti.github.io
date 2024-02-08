<?php

function ambilkrs($kode_mk, $nama_mk, $sks) {
    global $con;
    $sql = $con->prepare("INSERT INTO matakuliah (kode_mk, nama_mk, sks) VALUES (?, ?, ?)");
    $sql->bind_param("iss", $kode_mk, $nama_mk, $sks);
    return $sql->execute();
}
?>
<?php

function tampilkansks() {
    global $con;
    $sql = "SELECT matakuliah.kode_mk, matakuliah.nama_mk, matakuliah.sks, krs.kelas
            FROM krs 
            JOIN matakuliah ON krs.kode = kode_mk";
    
    $result = $con->query($sql);

    if ($result === false) {
        die("Error in execution: " . $con->error);
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}
?>
