<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="tasarm2.css"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Sign Up</title>
</head>
<body>
<div class="signup">

    <form action="kutuphane_ekle.php" method="post">

        <center>
            <h2 id="white" class="h1-1">Kutuphane Ekle</h2>
            <input id="white" class="hold" type="text" name="k_adi" placeholder="Kütüphane Adı"/>
            <input id="white" class="hold" type="text" name="adres" placeholder="Adres"/>
            
        </center>

        <center>
            <a href="kutuphane_uye.php"><input type="submit" class="btn-1" value="Kaydol" id="white" placeholder="submit"/></a>
        </center>
    </form>
    
</div>     
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>    
</html>

<?php

	include("baglanti.php");
    if(isset($_POST["k_adi"],$_POST["adres"]))
    {
        $ad=$_POST["k_adi"];
        $adres=$_POST["adres"];

        

        $ekle="INSERT INTO kutuphane ( address_id,kutuphane_adi) 
        
        VALUES ('".$adres."','".$ad."')";

        $sonuc=mysqli_query($connection,$ekle);
        if($sonuc)
        {
             echo "<script>alert('Kutuphane eklendi')</script>";
             header("Location: yonetici_anasayfa.html");
                exit();
        }
        else{
            die("Kutuphane EKLENEMEDİ !!!".mysqli_connect_error());
        }

    }

    

?>