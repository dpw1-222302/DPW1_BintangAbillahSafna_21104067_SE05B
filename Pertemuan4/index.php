<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Tugas pertemuan 4 Praktikum DPW</title>
</head>
<body>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
              <a class="nav-link" href="#">Sign in</a>
              <a class="nav-link" href="#">Log in</a>
              <a class="nav-link disabled">About</a>
            </div>
          </div>
        </div>
      </nav>

      <main>
        <div class="container text-center">
            <div class="row">
                <div class="col">

                </div>
                <div class="col">
                    <br>
                    <h1>Sign in</h1>
                    <p>Silahkan Buat Akun Pertama Anda Terlebih Dahulu</p>
                    <br>

                    <form action="result.php" method="post">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                            </div>
                            <div class="col-md-5">

                            </div>
                            <div class="col-md-5">
                                <label for="exampleFormControlInput1" class="form-label">Depan</label>
                                <input type="text" name="nama_depan" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="col-md-5">
                                <label for="exampleFormControlInput1" class="form-label">Belakang</label>
                                <input type="text" name="nama_belakang" class="form-control" id="exampleFormControlInput1">
                            </div>
                        </div>
                        <br>
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            </div>
                            <div class="col-md-10">
                                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@gmail.com">
                            </div>
                        </div>
                        <br>
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="inputPassword6" class="col-form-label">Password</label>
                            </div>
                            <div class="col-md-10">
                                <input type="password" name="password" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline">
                            </div>
                            <div class="col-auto">
                                <span id="passwordHelpInline" class="form-text">
                                    <i>*Must be 8-20 characters long, no less</i>
                                </span>
                            </div>
                        </div>
                        <br>
                        <input class="btn btn-primary" type="submit" name="submit" value="Sign in">                          
                    </form>
                </div>
                <div class="col">

                </div>
            </div>
        </div>
      </main>
      <footer>
        <div class="text-center" style="margin-top: 70px; margin-bottom: 50px;">
            <small>Copyright &copy; 21104067_Bintang Abillah Safna | All rights
            reserved.</small>
        </div>
      </footer>
</body>
</html>