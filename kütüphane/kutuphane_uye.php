<?php
require_once("baglanti_uyegirisi.php");                            
session_start();

if(isset($_GET['step'])){
$step = mysqli_real_escape_string($connection,trim($_GET['step']));
}else{
    $step = "";
}

if(isset($_GET['error'])){
    $error = mysqli_real_escape_string($connection,trim($_GET['error']));
    }else{
        $error = "";
    }

switch($step){
  
    case "":
        if(isset($_SESSION['login'])){
            if($_SESSION['login'] == 5){
                header("Location: kutuphane_uye.php");
                exit();
            }
        }
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="tasarm2.css"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Might</title>
</head>
<body>

    <?php
    if($error == "1"){
        echo '<div class="alert alert-danger" role="alert">Email hesabı hatalı</div>';
    }elseif($error == "2"){
        echo '<div class="alert alert-warning" role="alert">Şifre veya email alanı boş.</div>';
    }
    ?>

<div class="login">



<form action="kutuphane_uye.php?step=basarili" method="POST">

    <center>
        <h2 id="white" class="h1-1">Oturum Aç</h2>
        <input id="white" class="hold2" type="email" name="email1"  placeholder="E-mail"/>
        <input id="white" class="hold2" type="password" name="pass" placeholder="Parola"/>
        
        <br><br>
        
        <a href="yonetici_giris.php">Yönetici Girişi</a><br>
        <a href="kutuphane_uyelik.php">Uye Ol</a><br>

       
    </center>
    <center>
        <a href="uye_sayfasi.php"><input type="submit" class="btn-1" name="login" value="Giriş" id="white" placeholder="submit"/></a>
    </center>
    </form>
    
</div>     
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>    
</html>


<?php

    break;

    case "basarili":

        if(isset($_POST['login'])){

            $mail = addslashes(strip_tags(mysqli_real_escape_string($connection,htmlspecialchars($_POST['email1']))));
            $sifre = addslashes(strip_tags(mysqli_real_escape_string($connection,htmlspecialchars($_POST['pass']))));

           if($mail == "" OR $sifre =="" OR $mail == " " OR $sifre == " "){

            header('Location : kutuphane_uye.php?error=2');
            exit();

           }else{

            if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
               
                $uyeler = mysqli_query($connection,"SELECT * FROM uye WHERE uye_email = '".$mail."' AND uye_sifre = '".$sifre."'");
                $bul= mysqli_num_rows($uyeler);

                if($bul > 0){
                    $query = mysqli_query($connection,"SELECT * FROM uye WHERE uye_email = '".$mail."' AND uye_sifre = '".$sifre."'");

                    while($sonuc = mysqli_fetch_array($query)){

                        $_SESSION['uye_id'] = $sonuc['uye_id'];
                        $_SESSION['login'] = 5;
                        header('Location: uye_sayfasi.php');
                        exit();

                    }
                }

            }
            else{
                header('Location : kutuphane_uye.php?error=1');
                exit();
            }
        }

           }
       
        break;
    }

?>


