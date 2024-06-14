<?php
// mula fungsi session 
session_start();

// panggil fail kawalan-admin 
include('kawalan-admin.php');

// semak kewujudan data GET id_aktiviti 
if(!empty($_GET))
{
    // panggil fail connection 
    include('connection.php');

    // arahan SQL untuk padam data aktiviti berdasarkan id_aktiviti yg dihantar 
    $arahan = "delete from aktiviti where
               id_aktiviti = '".$_GET['id_aktiviti']."'";

    // laksana arahan SQL padam data dan uji proses padam data 
    if(mysqli_query($condb,$arahan))
    {
        // jika data berjaya dipadam 
        echo "<script>alert('Padam data berjaya');
        window.location.href='senarai-aktiviti.php';</script>";
    }
    else
    {
        // jika data gagal dipadam 
        echo "<script>alert('Padam data gagal');
        window.location.href='senarai-aktiviti.php';</script>";
    }
}
else
{
    // jika data GET tidak wujud 
    die("<script>alert('Ralat! akses secara terus');
    window.location.href='senarai-aktiviti.php';</script>");
}
?>