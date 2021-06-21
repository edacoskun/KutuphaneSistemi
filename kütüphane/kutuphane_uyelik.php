
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

$sql2 = "SELECT * FROM kutuphane";
$kutuphaneler = [];
$sql3 = "SELECT * FROM adres";
$adresler = [];

$cvp = mysqli_query($conn, $sql2);
$cvp2 = mysqli_query($conn, $sql3);

if($cvp2){
    while ($row2 = mysqli_fetch_array($cvp2))
    {
        $adresler[] = $row2;
    }
    
}

if(!$cvp){
	echo '<br>Hata: ' .mysqli_error($conn);
}else{

    while ($row = mysqli_fetch_array($cvp))
    {
        $kutuphaneler[] = $row;
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
    <title>Sign Up</title>
</head>
<body>
<div class="signup">

    <form action="kutuphane_uyelik.php" method="post">

        <center>
        <h2 id="white" class="h1-1">Kayıt Ol</h2>
            <input id="white" class="hold" type="text" name="name" placeholder="Kullanıcı Adı"/>
            <input id="white" class="hold" type="text" name="surname" placeholder="Kullanıcı Soyadı"/>

            <select id="white" name="adres_secim" class="hold2">
			<option value="0" disabled selected>-- İl Seçin </option>
			<?php foreach ($adresler as $value) { ?>
			<option value="<?=$value["adres_id"];?>"><?=$value["il"];?> </option>
			<?php } ?>
			</select>


            <select id="white" name="kutuphane_secim" class="hold2">
			<option value="0" disabled selected>-- Kutuphane Seçin </option>
			<?php foreach ($kutuphaneler as $value) { ?>
			<option value="<?=$value["kutuphane_id"];?>"><?=$value["kutuphane_adi"];?> </option>
			<?php } ?>
			</select>
            

            <input id="white" class="hold2" type="email"  name="mail" placeholder="E-mail"/>
            <input id="white" class="hold2" type="password" name="password1" placeholder="Parola"/>
            
           
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
if(isset($_POST["name"],$_POST["surname"],$_POST["mail"],$_POST["password1"]))
{
    $ad=$_POST["name"];
    $soyad=$_POST["surname"];
    $adres=$_POST["adres_secim"];
    $mail=$_POST["mail"];
    $kutuphane=$_POST["kutuphane_secim"];
    $sifre=$_POST["password1"];

    $ekle="INSERT INTO uye ( uye_name,uye_surname, 
    address_id, uye_email, uye_sifre,kutuphane_id) 
    
    VALUES ('".$ad."','".$soyad."','".$adres."','".$mail."','".$sifre."','".$kutuphane."')";

    
    $sonuc=mysqli_query($connection,$ekle);
        if($sonuc)
        {
             echo "<script>alert('Uyelik basariyla olusturuldu')</script>";
             header("Location: uye_sayfasi.php");
                exit();
        }
        else{
            die("uyelik basarisiz".mysqli_connect_error());
        }

    }

    

?>