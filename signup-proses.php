<?php
//  memulakan fungsi session
session_start();

// menyemak kewujudan data post
if(!empty($_POST))
{
    // memanggil fail connection.php
    include ('connection.php');

    // memanggil data yang dihantar dari fail signup-borang.php
    $nama = $_POST['nama'];
    $nokp = $_POST['nokp'];
    $id_pasukan = $_POST['id_pasukan'];
    $katalaluan = $_POST['katalaluan'];


    // data validation : had atas had bawah
    // nokp yang dimasukkan hendaklah 12 digit dan tidak mempunyai huruf atau simbol
    if(strlen($nokp) !=12 or !is_numeric($nokp))
    {
        die ("<script>alert ('Ralat pada No. Kad Pengenalan');
        window.location.href='signup-borang.php'; </script>");
    }

    // menyemak adakah nokp yang dimasukkan telah wujud dalam pangkalan data
    $arahan_sql_semak = "select* from ahli where nokp='$nokp' limit 1";
    $laksana_arahan_semak = mysqli_query($condb,$arahan_sql_semak);
    if(mysqli_num_rows($laksana_arahan_semak)==1)
    {
        // jika nokp yang dimasukkan telah wujud. aturcara akan dihentikan.
        die("<script>alert ('RALAT NOKP. Nokp yang dimasukkan telah diwujudkan');
        window.location.href='signup_borang.php'; </script>");
    } 

    // arahan SQL (query) untuk menyimpan data ahli baru
    $arahan_sql_simpan = "insert into ahli
    (nokp, nama, id_pasukan, katalaluan, tahap)
    values
    ('$nokp', '$nama', '$id_pasukan', '$katalaluan', 'AHLI BIASA') ";

    // melaksanakan arahan SQL menyimpan data ahli baru
    $laksana_arahan_simpan = mysqli_query($condb,$arahan_sql_simpan);

    // menguji jika proses menyimpan data berjaya atau tidak
    if($laksana_arahan_simpan)
    {
        // jika data berjaya disimpan. papar popup dan buka fail ahli-login-borang
        echo "<script>alert('Pendaftaran berjaya. Sila login masuk');
        window.location.href='login-borang.php'; </script>";
    }
    
    else
    {
        // jika data tidak berjaya disimpan. papar popup dan buka fail signup-borang
        echo"<script>alert('Pendaftaran gagal');
        window.location.href='signup-borang.php'; </script>";
    }
}
else
{
    // jika pengguna buka fail ini tanpa mengisi data.
    // papar popup dan buka fail signup-borang.php
    echo"<script>alert('Sila lengkapkan maklumat');
    window.location.href='signup-borang.php'; </script>";
}
?>