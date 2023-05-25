<?php
session_start();

// Mengatur waktu kadaluwarsa cookies (dalam detik)
$cookieExpiration = 3600; // Contoh: 1 jam

// Fungsi untuk mengunggah file ke direktori yang ditentukan
function uploadFile($file)
{
    $targetDir = 'uploads/';
    $targetFile = $targetDir . basename($file['name']);
    
    // Memeriksa apakah file sudah diunggah dengan sukses
    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        return $targetFile;
    } else {
        return false;
    }
}

// Memeriksa apakah ada file yang diunggah
if (isset($_FILES['file'])) {
    $uploadedFile = uploadFile($_FILES['file']);
    
    if ($uploadedFile) {
        echo "File berhasil diunggah ke: " . $uploadedFile;
    } else {
        echo "Gagal mengunggah file.";
    }
}

// Memeriksa apakah ada data yang dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menyimpan data dari form ke dalam sesi
    $_SESSION['name'] = $_POST['name'];
    
    // Menyimpan data dari form ke dalam cookies
    setcookie('email', $_POST['email'], time() + $cookieExpiration);
    
    echo " Data berhasil disimpan. " . "<br>";
}

// Menampilkan data dari sesi
if (isset($_SESSION['name'])) {
    echo "Nama: " . $_SESSION['name'] . "<br>";
}

// Menampilkan data dari cookies
if (isset($_COOKIE['email'])) {
    echo "Email: " . $_COOKIE['email'] . "<br>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Upload, Session, dan Cookies</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" required><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        
        <label for="file">File:</label>
        <input type="file" name="file" id="file" required><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
