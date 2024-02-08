<?php

$kode_mk = htmlspecialchars($_POST['kode_mk']);
$nama_mk = htmlspecialchars($_POST['nama_mk']);
$semester = htmlspecialchars($_POST['semester']);
$sks = htmlspecialchars($_POST['sks']);

if(empty($kode_mk) || empty($nama_mk) || empty($semester) || empty($sks)){
        echo "<script>
        alert('Data harus diisi');
        window.location.href = 'index.php?page=matakuliah'        
        </script>";   
}else{
       $cek = $con->prepare("SELECT *FROM matakuliah WHERE kode_mk = ?");
       $cek->bindparam(1, $kode_mk);
       $cek->execute();

       $jml = $cek->rowCount();

       if ($jml == 0){
        
        $sql = "INSERT INTO matakuliah VALUES (?, ?, ?, ?)";
        
        //bind
        $simpan = $con->prepare($sql); 
        $simpan->bindparam(1, $kode_mk);
        $simpan->bindparam(2, $nama_mk);
        $simpan->bindparam(3, $semester);
        $simpan->bindparam(4, $sks);

       //exec
       $simpan->execute();
       
       echo "<script>
              alert('Data Berhasil Disimpan');
              window.location.href = 'index.php?page=matakuliah'        
        </script>";
        
       }else{
           echo "<script>
           alert('Kode sudah ada silakan di perbaiki!!');
           window.location.href = 'index.php?=page=matakuliah'        
           </script>";
       }


}




