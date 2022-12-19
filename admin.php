<?php include("welcome.php"); ?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/styles.css" type="text/css" media="all" />
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
    <header>
        <h3>Siswa yang sudah mendaftar</h3>
    </header>
    <br>

    <table border="1">
    <thead>
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>TTL</th>
            <th>No telp</th>
            <th>Berkas</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM calon_peserta";
        $query = mysqli_query($conn, $sql);

        while($siswa = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$siswa['NIK']."</td>";
            echo "<td>".$siswa['nama']."</td>";
            echo "<td>".$siswa['alamat']."</td>";
            echo "<td>".$siswa['jenis_kelamin']."</td>";
            echo "<td>".$siswa['tempat'].$siswa['tanggal_lahir']."</td>";
            echo "<td>".$siswa['No_Telfon']."</td>";
            if($row['Status'] == "Pending")
                echo "<td><a href = > Approve</a><a href=> Deny</a></td>";
            if($row['Status'] == "Success")
                echo "<td>Approved</td>";
            echo "<td>";
            echo "</td>";

            echo "</tr>";
        }
        ?>


    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

    </body>
</html>