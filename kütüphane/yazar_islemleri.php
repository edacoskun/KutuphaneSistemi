<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "kutuphane";

// Create connection
$conn = new mysqli($servername, $username, $password ,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql2 = "SELECT * FROM yazar";
$yazarlar = [];
$cvp = mysqli_query($conn, $sql2);
if(!$cvp){
	echo '<br>Hata: ' .mysqli_error($conn);
}else{

    while ($row = mysqli_fetch_array($cvp))
    {
        $yazarlar[] = $row;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="yazartasarim.css"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Yazar Ekle</title>
</head>
<body>
<p><a href="yonetici_anasayfa.html">Geri Dön</a> 
<div style="height:auto!important;" class="add">
    <div style="text-align:center;">
        <h2 id="white" class="h1-1">Yazar Ekleme</h2>
        <form action="yazar_ekle.php"  target="yazar_ekle.php" method="POST">
            <input id="white" name="yazar_adi" class="hold" type="text" placeholder="Yazar Adı"/>
            <input id="white" name="yazar_soyadi" class="hold2" type="text" placeholder="Yazar Soyadı"/>
			
        
       <hr>
        
        <a  href="yazar_ekle.php"><input style="margin-bottom:20px;font-size: 20px;" type="submit" class="btn-1" value="EKLE" id="white" placeholder="Yazar Ekle"/></a>
        
           
       </form>
    </div>     
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>    
</html>