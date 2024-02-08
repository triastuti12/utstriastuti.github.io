    <style>
    .custom-navbar {
        background-color: #5d8939;
    }

    .custom-navbar .navbar-nav .nav-link {
        color: white;
    }

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
        
</style>
<section class="muka">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 130 1440 320" height="50px%" width="100%"><path fill="#5d8939" fill-opacity="1" d="M0,224L40,229.3C80,235,160,245,240,245.3C320,245,400,235,480,213.3C560,192,640,160,720,144C800,128,880,128,960,154.7C1040,181,1120,235,1200,261.3C1280,288,1360,288,1400,288L1440,288L1440,0L1400,0C1360,0,1280,0,
    1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,
    0C160,0,80,0,40,0L0,0Z"></path></svg>
    <div class='container'>
        <div class='row justify-content-center'>
            <div class='col-8'>
                <div class='card '>
                    <div class="card-header">
                        <h1 class='mt-2 text-center'>mata kuliah</h1>
                    </div>
                    <div class='card mt-4 ml-2'>
                        <form action='index.php?page=matkulproses' method='post'>
                            <div class='form-group'>
                                <label for="">KODE MK :</label>
                                <input type="text" class="form-control" name="kode_mk" autocomplete="off"> 
                            </div>
                            <div class='form-group'>
                                <label for="">NAMA MK :</label>
                                <input type="text" class="form-control" name="nama_mk" autocomplete="off"> 
                            </div>
                            <div class='form-group'>
                                <label for="">SEMESTER :</label>
                                <input type="text" class="form-control" name="semester" autocomplete="off"> 
                            </div>
                            <div class='form-group'>
                                <label for="">SKS :</label>
                                <input type="text" class="form-control" name="sks" autocomplete="off"> 
                            </div>
                            <div class="mb-3 d-grid">
                            <button type='submit' class='btn custom-btn-blue mb-2'>Simpan</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class='card mt-4'>
                    <div class='card-body'>                     
                        <h1 class='mt-2 text-center'>data mata kuliah</h1>
                           <table class="table table-bordered table-striped table-hover">
                     <thead>
                 <tr>
                   <th>kode mk</th>
                   <th>nama mk</th>
                   <th>semester</th>
                   <th>sks</th>
                   
        </tr>
     </thead>
     <tbody>
      <?php
    $sql = $con->query("SELECT * FROM matakuliah");
    while ($row = $sql->fetch()) {
        echo "<tr>
                    <td>$row[kode_mk]</td>
                    <td>$row[nama_mk]</td>
                    <td>$row[semester]</td>
                    <td>$row[sks]</td>
                   
                </tr>";
    }
    ?>
     </tbody>           
    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 20 1440 320">
       <path
         fill="#EFF7DD"
         fill-opacity="1"
         d="M0,224L34.3,208C68.6,192,137,160,206,149.3C274.3,139,343,149,411,160C480,171,549,181,617,192C685.7,203,754,213,823,208C891.4,203,960,181,1029,154.7C1097.1,128,1166,96,1234,90.7C1302.9,85,1371,107,1406,117.3L1440,128L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"
       ></path>
     </svg>
  </section>
</html>
