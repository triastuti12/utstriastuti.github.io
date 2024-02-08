<?php
session_start();
require_once 'confik/koneksi.php';

$nim = $_SESSION["nim"];


$sql_semester_aktif = "SELECT tahun, semester FROM semester WHERE status = 'Aktif'";
$stmt_semester_aktif = $con->prepare($sql_semester_aktif);
$stmt_semester_aktif->execute();
$row_semester_aktif = $stmt_semester_aktif->fetch(PDO::FETCH_ASSOC);


$tahun_aktif = isset($row_semester_aktif['tahun']) ? $row_semester_aktif['tahun'] : '';
$semester_aktif = isset($row_semester_aktif['semester']) ? $row_semester_aktif['semester'] : '';


$sql_info = "SELECT nim, nama FROM mahasiswa WHERE nim = :nim";
$stmt_info = $con->prepare($sql_info);
$stmt_info->bindParam(':nim', $nim);
$stmt_info->execute();
$row_info = $stmt_info->fetch(PDO::FETCH_ASSOC);


$jenis_semester = ($semester_aktif == 'Ganjil') ? 'Ganjil' : 'Genap';


$sql_matakuliah = "SELECT kode_mk, nama_mk, semester FROM matakuliah WHERE semester = :jenis_semester OR semester = 'Pilihan'";
$stmt_matakuliah = $con->prepare($sql_matakuliah);
$stmt_matakuliah->bindParam(':jenis_semester', $jenis_semester);
$stmt_matakuliah->execute();
?>

<?php
if (empty($_SESSION['nim'])) {
    echo "<script>
            alert('login dlu!');
            window.location.href = 'login.php'        
    </script>";
} else {
    # code...
    $nim = $_SESSION['nim'];
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tri Astuti</title>
    <link rel="stylesheet" href="bootstra/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
  .body{
     background: url('img/bts.jpg') center center/cover no-repeat;
  }
</style>
<body>

<nav class="navbar navbar-expand-lg navbar-dark p-3" style="background-color: #5d8939">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?page=homee" style="font-weight: bold" style="background-color: #5d8939">Tri Astuti</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-5">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?page=krs">KRS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?page=matakuliah">MATA KULIAH <i class="bi bi-book"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?page=semester">SEMESTER <i class="bi bi-list-ul"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?page=mahasiswa">MAHASISWA <i class="bi bi-person-vcard"></i></a>
                    </li>
                </ul>
                <div class="ml-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout <i class="bi bi-box-arrow-left"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
      <div class="content">
        <?php
        $page=  @$_GET['page'];

        if (empty($page)) {
            include "content/krs.php";
        } else {
            include "content/$page.php";
        }

        ?>
    </div> 
   <script src="bootstra/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php } ?>
