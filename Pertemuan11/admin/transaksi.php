<?php
    session_start();
    include '../connect.php';

    $query = "SELECT * FROM transaksi 
            INNER JOIN user ON transaksi.user_id = user.user_id
            INNER JOIN produk ON transaksi.produk_id = produk.produk_id";
    $result = $conn->query($query);

    // Mengecek apakah query berhasil dieksekusi
    if ($result) {
        $transaksis = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "Error executing query: " . $conn->error;
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
          <h2>Transaksi</h2>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Pembeli</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Quantity</th>
                  <th>Tanggal</th>
                  <th>Total Harga</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($transaksis as $transaksi): ?>
                  <tr>
                    <td><?php echo $transaksi['nama_lengkap']; ?></td>
                    <td><?php echo $transaksi['nama']; ?></td>
                    <td><?php echo $transaksi['harga']; ?></td>
                    <td><?php echo $transaksi['quantity']; ?></td>
                    <td><?php echo $transaksi['tanggal']; ?></td>
                    <td><?php echo $transaksi['total_harga']; ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>