<?php
// memulakan fungsi session 
session_start();

// memanggil fail header, kawalan-admin
include('header.php');
include('kawalan-admin.php');
?>

<!-- Tajuk laman -->
<h3> Muat Naik Data ahli (*.txt)</h3>

<!-- Borang untuk muat naik fail -->
<form action='' method='POST' enctype='multipart/form-data'> 

    <h3><b>Sila Pilih Fail txt yang ingin diupload</b></h3>
    <input type='file' name='data_ahli'>
    <button type='submit' name='btn-upload'>Muat Naik</button>

</form>
<?php include('footer.php'); ?>

<!-- Bahagian memproses data yang dimuat naik -->
<?PHP 
// data validation : memyemak kewujudan data dari borang
if (isset($_POST['btn-upload']))
{
    // memanggil fail connection 
    include('connection.php');

    // mengambil nama sementara fail 
    $namafailsementara=$_FILES["data_ahli"]["tmp_name"];

    // mengambil nama fail 
    $namafail=$_FILES["data_ahli"]['name'];

    // mengambil jenis fail 
    $jenisfail=pathinfo($namafail,PATHINFO_EXTENSION);

//  menguji jenis fail dan sail fail 
if($_FILES["data_ahli"]["size"]>0 AND $jenisfail=="txt")
{
    // buka fail yang diambil 
    $fail_data_ahli=fopen($namafailsementara,"r");

    // mendapatkan data dari fail baris demi baris 
    while (!feof($fail_data_ahli))
    {
        // ambil data sebaris sahaja bg setiap pusingan 
        $ambilbarisdata= fgets($fail_data_ahli);

        // pecahkan baris data ikut tanda pipe 
        $pecahkanbaris= explode("|",$ambilbarisdata);

        // selepas pecahan tdi akan diumpukkan kepada 5 
        list($nokp,$nama,$id_pasukan,$katalaluan,$tahap) = $pecahkanbaris;

        // arahan SQL untuk simpan data 
        $arahan_sql_simpan="insert into ahli
        (nokp,nama,id_pasukan,katalaluan,tahap) values
        ('$nokp','$nama','$id_pasukan','$katalaluan','$tahap')";

        // masukkan data kedalam jadual ahli
        $laksana_arahan_simpan=mysqli_query($condb, $arahan_sql_simpan);
        echo"<script>alert('import fail Data Selesai');
        window.location.href='senarai-ahli.php';
        </script>";
    }
// tutup fail txt yg dibuka 
fclose($fail_data_ahli);
}
else
{
    // jika fail yg diupload kosong atau salah format 
    echo "<script>alert('hanya fail berformat txt sahaja dibenarkan');</script>";
}
}
?>