<?php
session_start();
include 'confik/koneksi.php';

// Tangkap data semester dari formulir
$semester = $_POST['semester'];

// Ambil informasi tahun dan semester aktif dari tabel Semester
$sql_semester_aktif = "SELECT tahun FROM semester WHERE status = 'Aktif'";
$stmt_semester_aktif = $con->prepare($sql_semester_aktif);
$stmt_semester_aktif->execute();
$row_semester_aktif = $stmt_semester_aktif->fetch(PDO::FETCH_ASSOC);

// Jika ada data semester aktif, gunakan nilai default, jika tidak, gunakan nilai kosong
$tahun_aktif = isset($row_semester_aktif['tahun']) ? $row_semester_aktif['tahun'] : '';

// Simpan data semester dan tahun ke dalam tabel Semester
$sql_update_semester_aktif = "UPDATE semester SET semester = :semester, tahun = :tahun WHERE status = 'Aktif'";
$stmt_update_semester_aktif = $con->prepare($sql_update_semester_aktif);
$stmt_update_semester_aktif->bindParam(':semester', $semester);
$stmt_update_semester_aktif->bindParam(':tahun', $tahun_aktif);
$stmt_update_semester_aktif->execute();

// Kembalikan ke halaman KRS
header('Location: index.php');
exit();
?>
