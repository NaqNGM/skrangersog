<!-- tajuk sistem. Akana dipaparkan disebelah atas -->
<h1>Rangers OG</h1>
<p>Sistem Pengesahan Kehadiran Ahli</p>
<hr>

<?PHP if(!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "ADMIN") { ?>
    <!-- admin : dipaparkan sekiranya admin telah login -->
      <a href='index.php'                >Laman Utama</a>
      <a href='profil.php'               >Profil</a>
      <a href='kehadiran-rekod.php'      >Kaunter Kehadiran</a>
      <a href='senarai-ahli.php'         >Senarai Ahli</a>
      <a href='senarai-aktiviti.php'     >Senarai Aktiviti</a>
      <a href='kehadiran-laporan.php'    >Laporan Kehadiran</a>
      <a href='logout.php'               >Logout</a>
      <hr>
<?php } elseif(!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "AHLI BIASA"){ ?>
    <!-- Menu ahli biasa : dipaparkan sekiranya ahli telah login -->
      <a href='index.php'                >Laman Utama</a>
      <a href='profil.php'               >Profil</a>
      <a href='logout.php'               >Logout</a>
      <hr>
<?php } else { ?>
    <!-- menu Laman Utama : dipaparkan sekiranya admin atau ahli tidak login -->
      <a href='index.php'                >Laman Utama</a>
      <a href='login-borang.php'         >Daftar Masuk Ahli</a>
    <hr>
<?php } ?>  