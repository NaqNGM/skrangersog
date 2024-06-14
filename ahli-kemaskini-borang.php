<?php
// memulakan fungsi session 
session_start();

// panggil fail header, fail kawalan-admin dan fail connection
include('header.php');
include('kawalan-admin.php');
include('connection.php');

// semak kewujudan data GET. jika data GET empty, buka fail senarai-ahli 
if(empty($_GET)) {
    die("<script>window.location.href='senarai-ahli.php';</script>");
}
?>

<h3>kemaskini ahli baru</h3>
<form action='ahli-kemaskini-proses.php?nokp_lama=<?=$_GET['nokp'] ?>' method='POST'> 
nama 
<input type='text' name='nama' value='<?= $_GET['nama'] ?>' required><br>

nokp
<input type='text' name='nokp' value='<?= $_GET['nokp'] ?>' required><br> 

katalaluan
<input type='text' name='katalaluan' value='<?= $_GET['katalaluan'] ?>' required><br> 

Tahap
<select name='tahap'><br>
<option value='<?= $_GET['tahap'] ?>'> <?= $_GET['tahap'] ?> </option>
<?php
// proses paparkan senarai tahap dalam bentuk drop down list 
$arahan_sql_tahap= "select tahap from ahli group by tahap order by tahap";
$laksana_arahan_tahap= mysqli_query($condb, $arahan_sql_tahap);
while($n=mysqli_fetch_array($laksana_arahan_tahap))
{
    if($n['tahap'] != $_GET['tahap']){
        echo "<option value='".$n['tahap']."'>
        ".$n['tahap']."
        </option>";
    }
}
?>
</select> <br>

jawatan
<select name='id_pasukan'><br>
<option value='<?= $_GET['id_pasukan'] ?>'> 
<?= $_GET ['jawatan']."".$_GET['nama_pasukan'] ?>
</option>
<?php
// proses paparkan senarai kelas dalam bentuk drop down list 
$arahan_sql_pilih       =    "select* from pasukan";
$laksana_arahan_pilih   =   mysqli_query($condb, $arahan_sql_pilih);
while($m=mysqli_fetch_array($laksana_arahan_pilih))
{
   if($m['id_pasukan'] != $_GET['id_pasukan']){
    echo "<option value='".$m['id_pasukan']."'>
        ".$m['jawatan']."".$m['nama_pasukan']."
        </option>";
   }
}
?>
</select> <br>

<input type='submit' value='Kemaskini'>

</form>
<?php include ('footer.php'); ?>
