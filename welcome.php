<html>
<head>
<title>Welcome</title>
<style type="text/css">
table {
margin: 8px;
}

:root {
  --header-height: 3.5rem;

  /*========== Colors ==========*/
  --first-color: hsl(207, 100%, 70%);
  --button-color: hsl(0, 0%, 17%);
  --button-color-alt: hsl(0, 0%, 21%);
  --title-color: hsl(0, 0%, 15%);
  --text-color: hsl(0, 0%, 35%);
  --text-color-light: hsl(0, 0%, 55%);
  --body-color: hsl(0, 0%, 99%);
  --container-color: #fff;
  --border-color: hsl(0, 0%, 94%);

  /*========== Font and typography ==========*/
  --body-font: 'Roboto', sans-serif;
  --biggest-font-size: 2rem;
  --h1-font-size: 1.5rem;
  --h2-font-size: 1.25rem;
  --h3-font-size: 1rem;
  --normal-font-size: .938rem;
  --small-font-size: .813rem;
  --smaller-font-size: .75rem;

  /*========== Font weight ==========*/
  --font-medium: 500;
  --font-bold: 700;

  /*========== Margenes Bottom ==========*/
  --mb-0-5: .5rem;
  --mb-0-75: .75rem;
  --mb-1: 1rem;
  --mb-1-5: 1.5rem;
  --mb-2: 2rem;
  --mb-2-5: 2.5rem;
  --mb-3: 3rem;

  /*========== z index ==========*/
  --z-tooltip: 10;
  --z-fixed: 100;
}

@media screen and (min-width: 968px) {
  :root {
    --biggest-font-size: 2.5rem;
    --h1-font-size: 2.25rem;
    --h2-font-size: 1.5rem;
    --h3-font-size: 1.25rem;
    --normal-font-size: 1rem;
    --small-font-size: .875rem;
    --smaller-font-size: .813rem;
  }
}


body {
  margin: 60;
  background-color: var(--body-color);
  color: var(--text-color);
  /*For animation dark mode*/
  transition: .4s;
}
.home__btns {
  display: flex;
  align-items: center;
}
body {
  margin: 0;
  background-color: var(--body-color);
  color: var(--text-color);
  /*For animation dark mode*/
  transition: .4s;
}
</style>
</head>
<body>
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
    }
?>
<div class="home__btns">
                            <button class="button home__button" onclick="window.location.href='logout.php'">Logout</button>
</div>
</body>
</html>
