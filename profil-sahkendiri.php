<?php
session_start();
# memanggil fail connection dan
include('connection.php');

$masa=date("H:i:s");

# Menyemak kewujudan data GET id_aktiviti
if(!empty($_GET['id_aktiviti']) and !empty($_SESSION['nokp']))
{

    # Arahan Simpan data kehadiran
    $sql = "insert into kehadiran (id_aktiviti,nokp,masa_hadir)
    values ('".$_GET['id_aktiviti']."', '".$_SESSION['nokp']."','masa') ";

    # Laksana arahan Simpan
    $simpandata=mysqli_query($condb,$sql);

    # Menguji proses simpan
    if($simpandata){
        echo "<script>
            alert('Kehadiran Telah Disahkan');
            window.location.href='profil.php';
        </script>";
    }
    else {
        echo "<script>
            alert('Kehadiran GAGAL disahkan. Sila Ke Meja Urusetia');
            window.location.href='profil.php';
        </script>";
    }
}
else
{
    echo "<script>
        alert('Akses secara terus');
        window.location.href='logout.php';
    </script>";
}
?>