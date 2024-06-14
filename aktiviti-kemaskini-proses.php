<?php
// mula fungsi session 
session_start();

// panggil fail kawalan-admin 
include('kawalan-admin.php');

// semak kewujudan data POST 
if(!empty($_POST))
{
    // panggil fail connection 
    include('connection.php');

    // arahan SQL (query) untuk kemaskini maklumat aktiviti 
    $arahan         = "update aktiviti set
    nama_aktiviti   = '".$_POST['nama_aktiviti']."',
    tarikh_aktiviti = '".$_POST['tarikh_aktiviti']."',
    masa_mula       = '".$_POST['masa_mula']."'
    where 
    id_aktiviti     = '".$_GET['id_aktiviti']."' ";

    // laksanakan dan semak proses kemaskini 
    if(mysqli_query($condb,$arahan))
    {
        // kemaskini berjaya 
        echo"<script>alert('Kemaskini Berjaya');
        window.location.href='senarai-aktiviti.php';</script>";

    }
    else 
    {
        // kemaskini gagal 
        echo"<script>alert('Kemaskini Gagal');
        window.history.back();</script>";
    }
}
else
{
    // jika data GET tidak wujud. kembali ke fail senarai-aktiviti 
    die("<script>alert('Sila lengkapkan data');
    window.location.href='senarai-aktiviti.php';</script>");
}
?>