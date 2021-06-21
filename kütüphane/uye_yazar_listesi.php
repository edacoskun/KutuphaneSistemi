<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "kutuphane";

?>
<html>
<head><meta charset="utf-8"></head>


<style>

body{
   background:url("raf.jpg");
   background-size: 100% 100%;
   margin:0 auto; 
   color: black;
   margin: 10;
}

h3{
    color: white;
    font-size: 30px;
    text-align: center;
}
table, th, td {
  border: 2px solid black;
  border-collapse: collapse;
  background-color: white;
  padding: 10px;
  text-align: left;
}
th{
    background-color: #6495ed;
}
.a{
    width: 200px;
    height:35px;
}
.liste{
    margin-left: auto;
    margin-right: auto;
}
.buton{
   color: white;
   margin-top: 1%;
   width: 8%;
   outline: none;
   height: 4vh;
   border-radius: 5px;
   border: none;
   background: linear-gradient(90deg, rgba(29,129,130,1) 0%, #14191d 100%);
}
.buton:hover{
   opacity: 0.7;
}
.buton:active{
   opacity: 0.8;
}

</style>

<body>


<form class="arama">
        <input value="<?= isset($_GET["yazar_adi"]) ? $_GET["yazar_adi"] : ""; ?>" type="text" class="a" name="yazar_adi" placeholder="Yazar Adı ile Ara">
        <input value="<?= isset($_GET["yazar_soyadi"]) ? $_GET["yazar_soyadi"] : ""; ?>" type="text" name="yazar_soyadi" class="a" placeholder="Yazar Soyadı ile Ara">
        <button class= "buton" value="LİSTELE" style= "font-size: large;">LİSTELE</button>
</form>

<?php
//mysql baglanti kodunu ekliyoruz
include("baglanti.php");

//sorguyu hazirliyoruz

$filtre = "";
if (isset($_GET["yazar_adi"])) {
    $filtre .= "and yazar_adi like '" . $_GET["yazar_adi"] . "%' ";
}
if (isset($_GET["yazar_soyadi"])) {
    $filtre .= "and yazar_soyadi like '" . $_GET["yazar_soyadi"] . "%' ";
}


$sql = "
		SELECT * FROM yazar
		WHERE 1=1 $filtre 
		ORDER BY yazar_id DESC
	";

    //echo $sql;die;


$cevap = mysqli_query($connection, $sql);
if (!$cevap) {
    echo '<br>Hata: ' . mysqli_error($connection);
} 



//sorgudan gelen tüm kayitlari tablo içinde yazdiriyoruz.
//önce tablo başlıkları oluşturalım
echo "<h3>Yazar Listesi</h3>";
echo "<table border=1 class='liste'>";
echo "<tr><th>Yazar ID</th><th>Adı</th><th>Soyadı</th></tr>";

//veritabanından gelen cevabı satır satır alıyoruz.
while($gelen=mysqli_fetch_array($cevap))
{
    // veritabanından gelen değerlerle tablo satırları oluşturalım
    echo "<tr><td>".$gelen['yazar_id']."</td>";
    echo "<td>".$gelen['yazar_adi']."</td>";
    echo "<td>".$gelen['yazar_soyadi']."</td>";

                    
    "</tr>";    
}
// tablo kodunu bitirelim.
echo "</table>";

//veritabani baglantisini kapatiyoruz.
mysqli_close($connection);

?>
</body>
</html>