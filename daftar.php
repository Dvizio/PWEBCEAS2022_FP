
<!DOCTYPE html>
<head>
  <title>Aplikasi CRUD dengan PHP</title>
  <link rel="stylesheet" href="css/stylee.css" type="text/css" media="all" />
 
</head>
<body>
<div class="container">
  <h1 class="form-title">Tambah Data Siswa</h1>
  <form method="post" action="proses_simpan.php" enctype="multipart/form-data">
  <table cellpadding="8">
  <tr>
    <td>NIK</td>
    <td><input type="number" name="nik"></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td><input type="text" name="nama"></td>
  </tr>
  <tr>
    <td>Jenis Kelamin</td>
    <td>
    <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
    <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
    </td>
  </tr>
  <tr>
    <td>Tempat Lahir</td>
    <td><input type="text" name="tempat"></td>
    <td>Tanggal Lahir</td>
    <td><input type="date" name="tanggal"></td>
  </tr>
  <tr>
    <td>No Telfon</td>
    <td><input type="text" name="telp"></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td><textarea name="alamat"></textarea></td>
  </tr>
  <tr>
    <td>Foto</td>
    <td><input type="file" name="foto"></td>
  </tr>
  <tr>
    <td>KTP</td>
    <td><input type="file" name="ktp"></td>
  </tr>
  </table>
  
  <hr>
  <button type="submit" class="btn btn-primary" value="Daftar" name="Daftar">Daftar</button>
  <a href="welcome.php"><input type="button" class="btn btn-danger" value="Batal"></a>
  </form>
</div>
</body>
</html>