<?php

// mulakan fungsi session 
session_start();

// semak kewujudan data post 
if(!empty($_POST))
{
    include('connection.php');

    // arahan SQL (query) untuk simpan data aktiviti baru 
    $arahan_sql_simpan = "insert into aktiviti
    ( nama_aktiviti, tarikh_aktiviti,  masa_mula)
    values
    ('".$_POST['nama_aktiviti']."','".$_POST['tarikh_aktiviti']."',
'".$_POST['masa_mula']."')";

    // laksanakan arahan SQL simpan data aktiviti baru 
    $laksana_arahan_simpan = mysqli_query($condb,$arahan_sql_simpan);

    // uji jika proses simpan data berjaya atau tidak 
    if($laksana_arahan_simpan)
    {
        // jika data berjaya disimpan. papar popup dan buka fail aktiviti-daftar-borang 
        echo"<script>alert('Pendaftaran Aktiviti Berjaya.');
        window.location.href='senarai-aktiviti.php'; </script>";
    }
    else
    {
        // jika data tidak berjaya disimpan. papar popup dan buka fail aktiviti-daftar-borang 
        echo"<script>alert('Pendaftaran Gagal');
        window.location.href='aktiviti-daftar-borang.php'; </script>";
    }
}
else
{
    // jika user buka fail ini tanpa isi data 
    // papar popup dan buka fail aktiviti-daftar-borang 
    echo"<script>alert('Sila lengkapkan maklumat');
    window.location.href='aktiviti-daftar-borang.php'; </script>";
}
?>