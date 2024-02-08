<?php

$tahun = htmlspecialchars($_POST['tahun']);
$semester = htmlspecialchars($_POST['semester']);
$status = htmlspecialchars($_POST['status']);

if(empty($tahun) || empty($semester) || empty($status)){
        echo "<script>
        alert('Data harus diisi');
        window.location.href = 'index.php?page=semester'        
        </script>";   
}else{
       $cek = $con->prepare("SELECT *FROM semester WHERE status = ?");
       $cek->bindparam(1, $status);
       $cek->execute();

       $jml = $cek->rowCount();

       if ($jml == 0){
        
        $sql = "INSERT INTO semester VALUES (?, ?, ?)";
        
        //bind
        $simpan = $con->prepare($sql); 
        $simpan->bindparam(1, $tahun);
        $simpan->bindparam(2, $semester);
        $simpan->bindparam(3, $status);

       //exec
       $simpan->execute();
       
       echo "<script>
              alert('Data Berhasil Disimpan');
              window.location.href = 'index.php?page=semester'        
        </script>";
        
       }else{
           echo "<script>
           alert('Kode sudah ada silakan di perbaiki!!');
           window.location.href = 'index.php?=page=semester'        
           </script>";
       }


}




