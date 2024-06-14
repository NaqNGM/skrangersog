<?php
// memulakan fungsi session 
session_start();

// panggil fail kawalan-admin.php 
include('kawalan-admin.php');

// semak kewujudan data POST 
if(!empty($_POST))
{
    // panggil fail connection.php 
    include('connection.php');

    // pengesahan data (validation) nokp ahli 
    if(strlen($_POST['nokp']) != 12 or !is_numeric($_POST['nokp']))
    {
        die("<script>alert('Ralat Nokp');
        window.history.back();</script>");
    }

    // arahan SQL (query) untuk kemaskini maklumat ahli 
    $arahan     = "update ahli set
    nama        = '".$_POST['nama']."',
    nokp        = '".$_POST['nokp']."',
    katalaluan  = '".$_POST['katalaluan']."',
    id_pasukan  = '".$_POST['id_pasukan']."',
    tahap       = '".$_POST['tahap']."'
    where
    nokp        = '".$_GET['nokp_lama']."' ";

    // laksana dan semak proses kemaskini 
    if(mysqli_query($condb,$arahan))
    {
        // kemaskini berjaya 
        echo "<script>alert('Kemaskini Berjaya');
        window.location.href='senarai-ahli.php';</script>";

    }
    else
    {
        // kemaskini gagal 
        echo "<script>alert('Kemaskini Gagal');
        window.location.href='senarai-ahli.php';</script>";
    }
}
else
{
    // jika data GET tidak wujud. kembali ke fail senarai-ahli.php 
    die("<script>alert('sila lengkapkan data');
    window.location.href='senarai-ahli.php';</script>");
}
?>