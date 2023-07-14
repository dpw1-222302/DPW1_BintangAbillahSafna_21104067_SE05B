<?php
session_start();
include '../../connect.php';


// Periksa apakah ada data yang dikirimkan melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user_id = $_POST['user_id'];
  $role_id = $_POST['role'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $no_hp = $_POST['no_hp'];
  $email = $_POST['email'];

  // Query untuk mengubah data pengguna di tabel user
  $query = "UPDATE user SET role_id='$role_id', nama_lengkap='$nama_lengkap', no_hp='$no_hp', email='$email' WHERE user_id='$user_id'";
  $result = $conn->query($query);

  if ($result) {
    // Jika perubahan berhasil, redirect ke halaman pengguna
    header("Location: ../user.php");
    exit;
  } else {
    echo "Error executing query: " . $conn->error;
  }
}
?>