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
            $query2 = "SELECT * FROM users where id = '{$siswa['id']}'";
            $result = mysqli_query($conn, $query2);
            $row = mysqli_fetch_array($result);
            $status = $row['Status'];
            if($status == 'Pending'){
                echo "<form action='' method='post'>";
                echo "<td><button name='approve' class='btn' type='submit'>approve</button>";
                echo " <button name='deny' class='btn' type='submit'>Deny</button></td>";
                echo "</form>";
            }
            else{
                echo "<td>'Approved'</td>";
            }
            if (isset($_POST['approve'])) {
                $sql = "UPDATE users SET Status = 'Approve' WHERE id = '{$siswa['id']}'";
                $query3 = mysqli_query($conn, $sql);
            }
            else if (isset($_POST['deny'])) {
                //delete
                $sql = "UPDATE users SET Status = 'Ditolak' WHERE id = '{$siswa['id']}'";
                $sql = "DELETE FROM calon_peserta WHERE id={$siswa['id']}";
                $query4 = mysqli_query($conn, $sql);
            }

        }
        ?>
    </tr>

    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

    </body>
</html>