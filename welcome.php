<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }

    include 'config.php';

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        echo "<h1> Welcome " . $row['name'];
        echo"</h1>";
        echo "<h2>Status :" . $row['Status'];
        echo "</h2>";
        if($row['Status'] == "Belum Mendaftar"){
            echo "<br><a href='daftar.php'>Daftar</a>";
        }
        else if($row['Status'] == "Pending"){
            echo "<br>anda sudah mendaftar silahkan menunggu untuk verifikasi";
        }
        else if($row['Status'] == "Ditolak"){
            echo "<br>Pendaftaran anda ditolak silahkan mendaftar kembali untuk memperbaiki data anda <a href='daftar.php'>Daftar</a>";
        }
        else{
            echo "<br>anda sudah terdaftar";
        }

        echo "<br><a href='logout.php'>Logout</a>";
    }
?>