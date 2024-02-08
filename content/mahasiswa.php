<style>
  .card-header{
      background-color:#5d8939;
      color: white;
  }

  .custom-btn-blue{
      background-color:#5d8939; 
      color: white; 
  }

  .card {
    background-color: #c7f3a3; 
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
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 130 1440 320" height="50px%" width="100%">
            <path fill="#5d8939" fill-opacity="1"
                d="M0,224L40,229.3C80,235,160,245,240,245.3C320,245,400,235,480,213.3C560,192,640,160,720,144C800,128,880,128,960,154.7C1040,181,1120,235,1200,261.3C1280,288,1360,288,1400,288L1440,288L1440,0L1400,0C1360,0,1280,0, 1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,
                0C160,0,80,0,40,0L0,0Z"></path>
        </svg>
        <div class='container'>
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mt-2 text-center">MAHASISWA :</h3>
                        </div>
                        <div class="card-body">
                            <form action="index.php?page=mahasiswapros" method="POST">
                                <div class="form-group">
                                    <label for="">NIM :</label>
                                    <input type="text" class="form-control" name="nim" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="">NAMA :</label>
                                    <input type="text" class="form-control" name="nama" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="">PASSWORD :</label>
                                    <input type="text" class="form-control" name="password" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="">STATUS</label>
                                    <select class="form-control" name="status">
                                        <option>aktif</option>
                                        <option>pasif</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button class="btn custom-btn-blue" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mt-2 mb-2 text-center">DATA MAHASISWA</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>nim</th>
                                            <th>nama</th>
                                            <th>Level</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $sql = $con->query("SELECT * FROM mahasiswa");
                                            while ($row = $sql->fetch()) {
                                                echo "<tr>
                                                        <td>$no</td>
                                                        <td>$row[nim]</td>
                                                        <td>$row[nama]</td>
                                                        <td>$row[status]</td>
                                                    </tr>";
                                                $no++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>