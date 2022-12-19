<?php
// Load file koneksi.php
include('welcome.php');
// Ambil Data yang Dikirim dari Form
if(isset($_POST['Daftar'])){
  $nik = $_POST['nik'];
  $nama = $_POST['nama'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $alamat = $_POST['alamat'];
  $tempat = $_POST['tempat'];
  $tanggal = $_POST['tanggal'];
  $telp = $_POST['telp'];
  $direktoriktp = "ktp/";
  $id = $row['id'];
  $ktp_name = $_FILES['ktp']['name'];
  move_uploaded_file($_FILES['ktp']['tmp_name'], $direktoriktp.$ktp_name);
  $direktorifoto = "foto/";
  $foto_name = $_FILES['foto']['name'];
  move_uploaded_file($_FILES['foto']['tmp_name'], $direktorifoto.$foto_name);
  
  // Proses upload
// Cek apakah gambar berhasil diupload atau tidak
    // Proses simpan ke Database
    $sql = $pdo->prepare("INSERT INTO calon_peserta(nik, id,nama,alamat, jenis_kelamin,tempat,tanggal_lahir, No_telfon,foto,ktp) VALUES(:nik,:id,:nama,:alamat,:jk,:tempat,:tanggal,:telp,:foto,:ktp)");
    $sql->bindParam(':nik', $nik);
    $sql->bindParam(':nama', $nama);
    $sql->bindParam(':jk', $jenis_kelamin);
    $sql->bindParam(':alamat', $alamat);
    $sql->bindParam(':tempat', $tempat);
    $sql->bindParam(':tanggal', $tanggal);
    $sql->bindParam(':telp', $telp);
    $sql->bindParam(':foto', $foto_name);
    $sql->bindParam(':ktp', $ktp_name);
    $sql->bindParam(':id', $id);


    $sql->execute(); // Eksekusi query insert
    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      header("location: index.php"); // Redirect ke halaman index.php
    }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='welcome.php'>Kembali Ke Form</a>";
    }
}
else{
  echo ('????');
}
?>