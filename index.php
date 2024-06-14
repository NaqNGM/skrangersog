<?php
# memulakan fungsi session
session_start();

# Memanggil fail header.php
include("header.php");
?>
<table width='100%' >
    <tr>
        <td width='40%' bgcolor='FFD67D' >
            <!-- ubah nama fail banner.jpg mengikut nama gambar anda -->
            <img src='Rangers-OG.jpg' width='100%'>
        </td>
        <style>
            h1
            
            {
                font-family: "Cursive";
            }
            </style>
            <style> 
            h1
            {
            text-align: center;
            }
            </style>
            <style>
            h1
            {
                font-size: 70;
            }
            </style>
            <style> 
            h1 
            {
                color: khaki; 
            }
            </style>
            <style> 
            body 
            {
                background-color:white;
            }
            </style>
        <td align='center' bgcolor='F0E68C'>
            <h3>Daftar Sebagai Ahli Kelab</h3>
            <h3>Klik Pautan Dibawah Untuk Mendaftar</h3>
            <a href='signup-borang.php'>Daftar Sini</a>
        </td>
    </tr>
</table>
<?php include ('footer.php'); ?>