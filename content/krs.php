   <style>
    .card-header{
        background-color: #5d8939;
        color: white;  
    }

    .custom-btn-blue {
            background-color: #5d8939; 
            color: white; 
        }

    .card {
    background-color: #c7f3a3;
    }
    
   .card-body p {
    font-weight: bold;
    text-align: center;
    }

    .form-group{
      font-weight: bold;  
    }

    .muka{
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #c7f3a3;
    }

    svg {
        margin-bottom: -100px; 
    }
    .muka{

    }
        
</style>
<section class="muka">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 130 1440 320" height="50px%" width="100%"><path fill="#5d8939" fill-opacity="1" d="M0,224L40,229.3C80,235,160,245,240,245.3C320,245,400,235,480,213.3C560,192,640,160,720,144C800,128,880,128,960,154.7C1040,181,1120,235,1200,261.3C1280,288,1360,288,1400,288L1440,288L1440,0L1400,0C1360,0,1280,0,
    1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,
    0C160,0,80,0,40,0L0,0Z"></path></svg>
    <section class="nama text-center">
      <img src="img/tri astuti.jpeg" alt="dede" width="300" class="rounded-circle img-thumbnail" />
      <h1 class=" mt-2 text-center font-weight-normal ">Tri AStuti</h1>
      <p class="lead">Stikom Ambon</p>
    </section>
 <div class='container'>
        <div class='row justify-content-center'>
            <div class='col-8'>
                <div class='card '>
                    <div class="card-header">
                        <h1 class='mt-2 text-center'>Halaman Utama KRS</h1>
                    </div>
                    <div class='card-body'>
                        <div class='row'>
                            <div class='col-6'>
                                
                                <p>NIM:
                                    <?php echo $row_info['nim']; ?>
                                </p>
                                <p>Nama:
                                    <?php echo $row_info['nama']; ?>
                                </p>
                            </div>
                            <div class='col-6'>
                                
                                <p>Tahun Aktif:
                                    <?php echo $tahun_aktif; ?>
                                </p>
                                <p>Semester Aktif:
                                    <?php echo $semester_aktif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class='card mt-4 ml-2'>
                        <form action='index.php?page=krssimpan' method='post'>
                            <div class='form-group'>
                                <label for='selectMatakuliah'>Daftar MK:</label>
                                <select class='form-select ml-1' id='selectMatakuliah' name='kode_mk' required>
                                    <?php
                                    while ($row_matakuliah = $stmt_matakuliah->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option value='" . $row_matakuliah['kode_mk'] . "'>" . $row_matakuliah['nama_mk'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class='form-group'>
                                <label for='selectKelas'>Kelas:</label>
                                <select class='form-select ml-1' id='selectKelas' name='kelas' required>
                                    <option value='A'>A</option>
                                    <option value='B'>B</option>
                                </select>
                            </div>
                            <button type='submit' class='btn custom-btn-blue mb-2'>Simpan</button>
                        </form>

                    </div>
                </div>
                <div class='card mt-4'>
                    <div class='card-body'>
                        <h2 class='mt-2 text-center'>Data Pengambilan KRS</h2>
                        <?php
                        // Ambil dan tampilkan daftar mata kuliah yang sudah dipilih dari tabel "krs"
                        $sql_krs = "SELECT matakuliah.kode_mk, matakuliah.nama_mk, krs.kelas, matakuliah.sks FROM krs JOIN matakuliah ON krs.kode_mk = matakuliah.kode_mk WHERE krs.nim = :nim";
                        $stmt_krs = $con->prepare($sql_krs);
                        $stmt_krs->bindParam(':nim', $nim);
                        $stmt_krs->execute();

                        if ($stmt_krs->rowCount() > 0) {
                            echo "<table class='table table-bordered'>";
                            echo "<thead class='bg-dark text-white text-center'>";
                            echo "<tr>";
                            echo "<th>Kode MK</th>";
                            echo "<th>Nama MK</th>";
                            echo "<th>Kelas</th>";
                            echo "<th>SKS</th>";
                            echo "<th>Aksi</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row_krs = $stmt_krs->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . $row_krs['kode_mk'] . "</td>";
                                echo "<td>" . $row_krs['nama_mk'] . "</td>";
                                echo "<td>" . $row_krs['kelas'] . "</td>";
                                echo "<td>" . $row_krs['sks'] . "</td>";
                                echo "<td><a href='index.php?page=krsdelete&kode_mk=" . $row_krs['kode_mk'] . "' class='btn btn-danger btn-sm'><i class='bi bi-trash3-fill'></i></a></td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                        } else {
                            echo "Belum ada mata kuliah yang dipilih.";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 20 1440 320">
       <path
         fill="#EFF7DD"
         fill-opacity="1"
         d="M0,224L34.3,208C68.6,192,137,160,206,149.3C274.3,139,343,149,411,160C480,171,549,181,617,192C685.7,203,754,213,823,208C891.4,203,960,181,1029,154.7C1097.1,128,1166,96,1234,90.7C1302.9,85,1371,107,1406,117.3L1440,128L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"
       ></path>
     </svg>
  </section>