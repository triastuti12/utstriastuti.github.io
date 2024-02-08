<?php
$nim = htmlspecialchars($_POST['nim']);
$nama = htmlspecialchars($_POST['nama']);
$password = htmlspecialchars($_POST['password']);
$status = htmlspecialchars($_POST['status']);
$pass_hash = password_hash($password, PASSWORD_DEFAULT);

if (empty($nim) || empty($nama)|| empty($password) || empty($status)) {
    echo "<script>
                alert('Data harus diisi');
                window.location.href = 'index.php?page=mahasiswa'        
        </script>";
} else {
    //cek username
    $cek = $con->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
    $cek->bindParam(1, $nim);
    $cek->execute();

    $jml = $cek->rowCount();

    if ($jml == 0) {
        //simpan
        $sql = "INSERT INTO mahasiswa (nim, nama,  password, status) VALUES (?, ?, ?, ?)";

        $simpan = $con->prepare($sql);
        //bind
        $simpan->bindParam(1, $nim);
        $simpan->bindParam(2, $nama);
        $simpan->bindParam(3, $pass_hash);
        $simpan->bindParam(4, $status);
        //exec
        $simpan->execute();

        echo "<script>
                        alert('Data Berhasil Disimpan');
                        window.location.href = 'index.php?page=mahasiswa'        
                </script>";
    } else {
        echo "<script>
                        alert('Username sudah ada!!');
                        window.location.href = 'index.php?page=mahasiswa'        
                </script>";
    }
}
