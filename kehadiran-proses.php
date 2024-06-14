<?php
// Panggil fail connection 
include('connection.php');

// padam data kehadiran yg lama agar dpt masukkan yg baru 
$sqlpadam=mysqli_query($condb,"delete from kehadiran where id_aktiviti='".$_GET['id_aktiviti']."'");

$masa=date("H:i:s");
foreach ($_POST['kehadiran'] as $nokp)
{
    // simpan semula data kehadiran yg baru 
    $simpandata=mysqli_query($condb,"insert into kehadiran
    (nokp,id_aktiviti,masa_hadir) values
    ('$nokp','".$_GET['id_aktiviti']."','$masa') ");
}

echo"<script>alert('Kemaskini Kehadiran Selesai');
window.location.href='kehadiran-borang.php?id_aktiviti=".$_GET['id_aktiviti']."';
</script>";

?>