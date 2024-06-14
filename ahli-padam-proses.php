<?php
//  mulakan fungsi session 
session_start();

// panggil fail kawalan-admin.php 
include('kawalan-admin.php');

// semak kewujudan data GET nokp ahli 
if(!empty($_GET))
{
    // panggil fail connection 
    include('connection.php');

    // arahan SQL untuk padam data ahli berdasarkan nokp yg dihantar 
    $arahan   = "delete from ahli where nokp='".$_GET['nokp']."'";

    // laksanakan arahan SQL padam data dan uji proses padam data 
    if(mysqli_query($condb,$arahan))
    {
        // jika data berjaya dipadam 
        echo "<script>alert('Padam data berjaya');
        window.location.href='senarai-ahli.php';</script>";
    }
    else
    {
        // jika data gagal 
        echo "<script>alert('Padam data gagal');
        window.location.href='senarai-ahli.php';</script>";
    }
}
else
{
    // jika data GET tidak wujud (empty) 
    die("<script>alert('Ralat! akses secara terus');
    window.location.href='senarai-ahli.php';</script>");
}
?>