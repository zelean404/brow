<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login Page</title>

    <style>
        .card {
            background-color: #f0f0f0;
            margin-top: 70px;
        }

        .card-title {
            text-align: center;
        }
        .jdlLogin {
            text-align: center;
        }

        #submitLogin {
            width: 280px;
            /* padding: 10px; */
        }
    </style>
  </head>


  <body>
    <center>
    <div class="card" style="width: 30rem;">
        <div class="card-body">
            <h4 class="card-title">Aplikasi Pengolahan Bahan Baku BROW</h4>
            <p class="jdlLogin">Login</p> <hr><br>

            <form action="proses_login.php" method="POST">
                <div class="mb-4 mt-2">
                    <input type="email" class="form-control" id="username" name="username" placeholder="Username">
                </div>

                <div class="mb-4">
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary" id="submitLogin" name="submitLogin">Submit</button>
            </form>
        </div>
    </div>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>