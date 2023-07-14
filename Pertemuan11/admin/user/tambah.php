<?php
  include "../../connect.php";
    // Periksa apakah ada data yang dikirimkan melalui metode POST
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

