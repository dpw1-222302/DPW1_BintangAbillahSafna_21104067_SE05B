<?php
  session_start();
  include '../connect.php';
  $query = "SELECT * FROM user JOIN role ON user.role_id = role.role_id WHERE user.user_id = {$_SESSION['user_id']}";
  $datas = $conn->query($query);
  $data = $datas->fetch_assoc();
  
  // Periksa apakah peran pengguna adalah admin atau penjual
  if ($data['name'] != 'admin') {
    // Jika bukan admin, tampilkan pesan peringatan
    echo '<script>alert("Akses Dilarang. Hanya admin yang diperbolehkan mengakses halaman ini.");</script>';
    echo '<script>window.location.href = "index.php";</script>';
    exit;
  }
  
  

  // Fungsi untuk mendapatkan data pengguna
  function getDataPengguna()
  {
      global $conn;
      $query = "SELECT * FROM user";
      $result = $conn->query($query);

      if ($result) {
          $penggunas = $result->fetch_all(MYSQLI_ASSOC);
          return $penggunas;
      } else {
          echo "Error executing query: " . $conn->error;
          return [];
      }
  }
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role_id = $_POST['role'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk menyimpan data pengguna baru ke tabel user
    $query = "INSERT INTO user (role_id, nama_lengkap, no_hp, email, password) VALUES ('$role_id', '$nama_lengkap', '$no_hp', '$email', '$password')";
    $result = $conn->query($query);

    if ($result) {
      // Jika penyimpanan berhasil, redirect ke halaman pengguna
      header("Location: user.php");
      exit;
    } else {
      echo "Error executing query: " . $conn->error;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>
  <body>
    <!-- Sidebar -->
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                <a class="nav-link active" href="transaksi.php">Transaksi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="user.php">Pengguna</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="produk.php">Produk</a>
              </li>
            </ul>
          </div>
        </nav>
        <!-- Content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between align-items-center">
            <h2>Pengguna</h2>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDataModal"> Tambah Data </button>
          </div>
          <div class="table-responsive mt-3">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Role</th>
                  <th>Nama Lengkap</th>
                  <th>No. HP</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
                // Mengambil data pengguna
                $penggunas = getDataPengguna();
                
                foreach ($penggunas as $user):?> <tr>
                  <td> <?= $user['role_id'] ?> </td>
                  <td> <?= $user['nama_lengkap'] ?> </td>
                  <td> <?= $user['no_hp'] ?> </td>
                  <td> <?= $user['email'] ?> </td>
                  <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editDataModal<?= $user['user_id'] ?>">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusDataModal<?= $user['user_id'] ?>">Hapus</button>
                  </td>
                </tr>

                <!-- Modal ubah data -->
                <div class="modal fade" id="editDataModal<?= $user['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel<?= $user['user_id'] ?>" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editDataModalLabel<?= $user['user_id'] ?>">Ubah Data Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="user/ubah.php" method="POST">
                          <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role">
                              <option value="1" <?= $user['role_id'] == 1 ? 'selected' : '' ?>>Admin</option>
                              <option value="2" <?= $user['role_id'] == 2 ? 'selected' : '' ?>>User</option>
                              <option value="3" <?= $user['role_id'] == 3 ? 'selected' : '' ?>>Penjual</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input required type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $user['nama_lengkap'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="no_hp">No. HP</label>
                            <input required type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $user['no_hp'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input required type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
                          </div>
                          <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Modal hapus data -->
                <div class="modal fade" id="hapusDataModal<?= $user['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapusDataModalLabel<?= $user['user_id'] ?>" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="hapusDataModalLabel<?= $user['user_id'] ?>">Konfirmasi Penghapusan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">Apakah Anda yakin ingin menghapus pengguna ini?</div>
                      <div class="modal-footer">
                        <form action="user/hapus.php" method="POST">
                          <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Modal tambah data -->
    <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Pengguna</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="POST">
              <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role">
                  <option value="1">Admin</option>
                  <option value="2">Penjual</option>
                  <option value="3">User</option>
                </select>
              </div>
              <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input required type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
              </div>
              <div class="form-group">
                <label for="no_hp">No. HP</label>
                <input required type="text" class="form-control" id="no_hp" name="no_hp">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input required type="email" class="form-control" id="email" name="email">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input required type="password" class="form-control" id="password" name="password">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>