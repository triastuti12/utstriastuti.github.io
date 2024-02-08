<style>
    .card-header{
      background-color: #5d8939;
      color: white;
  }
  
  .custom-btn-blue{
      background-color: #5d8939;
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
            <path fill="#5d8939" fill-opacity="1" d="M0,224L40,229.3C80,235,160,245,240,245.3C320,245,400,235,480,213.3C560,192,640,160,720,144C800,128,880,128,960,154.7C1040,181,1120,235,1200,261.3C1280,288,1360,288,1400,288L1440,288L1440,0L1400,0C1360,0,1280,0,
            1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,
            0C160,0,80,0,40,0L0,0Z"></path>
        </svg>
        <div class='container'>
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h1 class='mt-2 text-center'>SEMESTER :</h1>
                        </div>
                        <div class="card-body">
                            <form action="index.php?page=semesproses" method="POST">
                                <div class="mb-3">
                                    <label for="">TAHUN :</label>
                                    <input type="text" class="form-control" name="tahun" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="">SESMESTER :</label>
                                    <input type="text" class="form-control" name="semester" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="">STATUS:</label>
                                    <input type="text" class="form-control" name="status" autocomplete="off">
                                </div>
                                <div class="mb-3 d-grid">
                                    <button class="btn custom-btn-blue" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mt-2 mb-2 text-center">DATA SEMESTER</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>TAHUN</th>
                                            <th>SEMESTER</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = $con->query("SELECT * FROM semester");
                                        while ($row = $sql->fetch()) {
                                            echo "<tr>
                                                    <td>$row[tahun]</td>
                                                    <td>$row[semester]</td>
                                                    <td>$row[status]</td>    
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
        </div>
    </section>