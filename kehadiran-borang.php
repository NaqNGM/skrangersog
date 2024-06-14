<?php
// mula fungsi session 
session_start();

// panggil fail header, connection dan guard_admin 
include('header.php');
include('connection.php');
include('kawalan-admin.php');

// dapatkan maklumat aktiviti dari pangkalan data 
$arahan_sql_aktiviti = "select * from aktiviti where id_aktiviti
='".$_GET['id_aktiviti']."'";
$laksana_aktiviti = mysqli_query($condb,$arahan_sql_aktiviti);
$n = mysqli_fetch_array($laksana_aktiviti);

?>

<h3>Pengesahan Kehadiran Ahli</h3>

Nama aktiviti : <?= $n['nama_aktiviti'] ?> <br>
Tarikh | Masa : <?= $n['tarikh_aktiviti']." | ".$n['masa_mula'] ?><br>
<br><br>

<?php include('butang-saiz.php'); ?>
<form action='kehadiran-proses.php?id_aktiviti=<?= $_GET['id_aktiviti'] ?>'
method='POST'> 
<table border='1' id='saiz' width='100%'>
    <tr>
        <td>Bil</td>
        <td>Nama</td>
        <td>Nokp</td>
        <td>Pasukan</td>
        <td>Kehadiran</td>
    </tr>

<?php

// arahan untuk mendapatkan data kehadiran setiap ahli 
$arahan_sql_kehadiran = "SELECT
ahli.nokp, ahli.nama,
pasukan.jawatan, pasukan.nama_pasukan,
kehadiran.id_aktiviti
FROM ahli
LEFT JOIN pasukan
ON ahli.id_pasukan  =  pasukan.id_pasukan
LEFT JOIN kehadiran
On ahli.nokp        =  kehadiran.nokp
AND kehadiran.id_aktiviti='".$_GET['id_aktiviti']."'
ORDER BY ahli.nama";

// laksana arahan untuk proses data 
$laksana_kehadiran  =  mysqli_query($condb,$arahan_sql_kehadiran);
$bil=0;

// ambil dan paparkan semua data kehadiran yang ditemui
while ($m=mysqli_fetch_array($laksana_kehadiran)){  ?>
    <tr> 
        <td><?= ++$bil; ?></td>
        <td><?= $m['nama'] ?></td>
        <td><?= $m['nokp'] ?></td>
        <td><?= $m['jawatan']." ".$m['nama_pasukan'] ?> </td>
        <td><?php
        
        if($m['id_aktiviti'] != null)
        {
            $tanda='checked';
        } else
        $tanda="";
        ?>
        
        <input <?= $tanda ?> type='checkbox' name='kehadiran[]'
        value='<?= $m['nokp'] ?> ' style='width:30px; height:30px;'>
        </td>
    </tr>
    <?PHP 
}
?>
<tr>
    <td colspan='4'></td>
    <td><input type='submit' value='Simpan'></td>
</tr>
</table>
</form>
<?php include ('footer.php'); ?>