<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
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
            echo "<td><a href = 'foto/".$siswa['foto']."'> Foto</a> <a href = 'ktp/".$siswa['ktp']."'> KTP</a></td>";
            echo "<td>Approve Deny</td>";
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