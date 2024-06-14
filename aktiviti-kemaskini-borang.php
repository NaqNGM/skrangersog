<?php
// mula fungsi session 
session_start();

// panggil fail header, kawalan-admin dan connection 
include('header.php');
include('kawalan-admin.php');
include('connection.php');

// semak kewujudan data GET. jika data GET empty, buka fail senarai-aktiviti 
if(empty($_GET)) {
    die("<script>window.location.href='senarai-aktiviti.php';</script>");
}

// dapatkan maklumat aktiviti dari pangkalan data 
$arahan_sql_pilih = "select * from aktiviti where id_aktiviti
='".$_GET['id_aktiviti']."' ";
$laksana_arahan   = mysqli_query($condb,$arahan_sql_pilih);
$m  =   mysqli_fetch_array($laksana_arahan);

?>

<h3>Kemaskini Aktiviti Baru </h3>

<form action='aktiviti-kemaskini-proses.php?id_aktiviti=<?= $m['id_aktiviti'] ?>'
method='POST'> 

nama_aktiviti
<input type='text' name='nama_aktiviti' value='<?=$m['nama_aktiviti'] ?>'
required><br>

tarikh_aktiviti
<input type='date' name='tarikh_aktiviti' min='<?= date("Y-m-d")?>' value='<?=
$m['tarikh_aktiviti'] ?>' required><br>

masa_mula 
<input type='text' name='masa_mula' value='<?= $m['masa_mula'] ?>' required><br>

<input type='submit' value='Kemaskini'>

</form>
<?php include('footer.php'); ?>