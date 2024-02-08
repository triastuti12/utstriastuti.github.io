<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aplikasi KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .custom-card-header {
            background-color: #696969;
            color: white; 
        }

        .custom-btn-blue {
            background-color: #696969; 
            color: white; 
        }

        .card{
            background: url('img/seokjin.jpg') center center/cover no-repeat; 
        }
      
        .custom-text-white {
            color: white;
        }
        
    </style>
</head>

<body class="text-center">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header custom-card-header">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">

                        <form action="logincek.php" method="post">
                            <div class="mb-3">
                                <label for="nim" class="custom-text-white">NIM:</label>
                                <input type="text" class="form-control" id="nim" name="nim" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="custom-text-white">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn custom-btn-blue">login</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
