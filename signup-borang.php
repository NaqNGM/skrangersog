<?php
# memulakan fungsi SESSION
session_start();

# memanggil fail header.php & fail connection.php
include('header.php');
include('connection.php');
?>

<!-- Tajuk antaramuka-->
<h3> Pendaftaran ahli Baru </h3>

<!-- Borang pendaftaran ahli Baru-->
<form action= 'signup-proses.php' method='POST'>
    Nama ahli <input type='text'      name='nama'         required> <br>
    Nokp ahli <input type='text'      name='nokp'         required> <br>
    Pasukan   <select name='id_pasukan'> <br>
              <option selected disabled value>Sila Pilih Pasukan</option>
            <?php
            # Proses memaparkan senarai pasukan dalam bentuk drop down list
            $arahan_sql_pilih       =  "select* from pasukan";
            $laksana_arahan_pilih   =  mysqli_query($condb,$arahan_sql_pilih);
            while($m=mysqli_fetch_array($laksana_arahan_pilih))
            {
                echo "<option value='".$m['id_pasukan']."'>
                ".$m['nama_pasukan']."
                </option>";
            }
            ?>
            </select><br>
    katalaluan <input type='password'  name='katalaluan'   required> <br>
               <input type='submit'    value='Daftar'>
</form>
<?php include ('footer.php');?>