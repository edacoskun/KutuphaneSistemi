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

$sql2 = "SELECT * FROM kategori";
$kategoriler = [];
$cvp = mysqli_query($conn, $sql2);
if(!$cvp){
	echo '<br>Hata: ' .mysqli_error($conn);
}else{

    while ($row = mysqli_fetch_array($cvp))
    {
        $kategoriler[] = $row;
    }
}

$sql3 = "SELECT * FROM yazar";
$yazarlar = [];
$cvp = mysqli_query($conn, $sql3);
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
    <link rel="stylesheet" href="kitaptasarim.css"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Kitap Ekle</title>

    <style>
        .container-yazar { border:2px solid #ccc; width:300px; height: 100px; overflow-y: scroll; margin-left:15%;margin-top:5%;background-color:black;}
        .yazar-baslik {color:white;}
        .container-yazar-baslik {margin-top:5%;}
    </style>
</head>
<body>
<div style="height:auto!important;" class="add">
    <div style="text-align:center;">
        <h2 id="white" class="h1-1">Kitap Ekleme</h2>
        <form action="kitap_ekle.php"  target="kitap_ekle.php" method="POST">
            <input id="white" name="ISBN" class="hold" type="text" placeholder="ISBN"/>
            <input id="white" name="kitap_adi" class="hold2" type="text" placeholder="Adı"/>

            <div class="container-yazar-baslik">
                <h6 class="yazar-baslik">Yazar Seçiniz:</h6>
            </div>
			<div class="container-yazar">
                <?php foreach ($yazarlar as $value) { ?>
                    <input type="checkbox" id="yazar_<?=$value['yazar_id'];?>" name="yazarlar[]" value="<?=$value['yazar_id'];?>">
                    <label style="color:white;" for="yazar_<?=$value['yazar_id'];?>"><?=$value['yazar_adi'];?><?=" "?><?=$value['yazar_soyadi'];?></label><br>
                <?php } ?>
            </div>

			<hr>
			<?php foreach ($kategoriler as $value) { ?>
            <input type="checkbox" id="kategori_<?=$value['kategori_id'];?>" name="kategoriler[]" value="<?=$value['kategori_id'];?>">
            <label style="color:white;" for="kategori_<?=$value['kategori_id'];?>"><?=$value['kategori_adi'];?></label><br>
			
			<?php } ?>
			
            <input id="white" name="kitap_yayinevi" class="hold2" type="text"  placeholder="Yayınevi"/>
            <input id="white" name="kitap_stok" class="hold2" type="text"  placeholder="Adet"/>
        
       
        
        <a href="kitap_ekle.php"><input style="margin-bottom:20px;font-size: 20px;" type="submit" class="btn-1" value="EKLE" id="white" placeholder="Kitap Ekle"/></a>
        
           
    </form>
    </div>     
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>    
</html>