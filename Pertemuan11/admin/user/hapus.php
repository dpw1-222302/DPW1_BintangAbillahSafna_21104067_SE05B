<?php
session_start();
include '../../connect.php';

// Periksa apakah ada data yang dikirimkan melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user_id = $_POST['user_id'];

  // Query untuk menghapus pengguna dari tabel user
  $query = "DELETE FROM user WHERE user_id='$user_id'";
  $result = $conn->query($query);

  if ($result) {
    // Jika penghapusan berhasil, redirect ke halaman pengguna
    header("Location: ../user.php");
    exit;
  } else {
    echo "Error executing query: " . $conn->error;
  }
}
?>