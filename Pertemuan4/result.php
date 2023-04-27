<?php
    if (isset($_POST['submit'])) {
        $nd = $_POST['nama_depan'];
        $nb = $_POST['nama_belakang'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        echo "<div id='result'>Terima kasih, $nd, email Anda ($email) telah terkirim.</div>";
    }    
?>