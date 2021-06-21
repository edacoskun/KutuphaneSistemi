<?php
require('baglanti.php');

$id=$_REQUEST['uye_id'];
$query = "SELECT * from uye where uye_id='".$id."'"; 
$result = mysqli_query($connection, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="style2.css" />
</head>
<body>
<div class="form">
<p><a href="uye_listele.php">Geri Dön</a> 


<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$uye_id=$_REQUEST['uye_id'];
$uye_name =$_REQUEST['uye_name'];
$uye_surname =$_REQUEST['uye_surname'];
$uye_email =$_REQUEST['uye_email'];
$uye_sifre = $_REQUEST['uye_sifre'];

$update="UPDATE uye SET uye_name='".$uye_name."',
uye_surname='".$uye_surname."', uye_email='".$uye_email."',  uye_sifre='".$uye_sifre."' WHERE uye_id='".$uye_id."'";
mysqli_query($connection, $update) or die(mysqli_error());


}else {
?>
<div>

<form name="form" method="post" action=""> 
<h1>Kayıt Güncelleme</h1>
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['uye_id'];?>" />
<p><input type="text" name="uye_name" placeholder="Ad" 
required value="<?php echo $row['uye_name'];?>" /></p>
<p><input type="text" name="uye_surname" placeholder="Soyad" 
required value="<?php echo $row['uye_surname'];?>" /></p>
<p><input type="email" name="uye_email" placeholder="E-mail" 
required value="<?php echo $row['uye_email'];?>" /></p>
<p><input type="password" name="uye_sifre" placeholder="Şifre" 
required value="<?php echo $row['uye_sifre'];?>" /></p>
<p><input name="submit" type="submit" value="Güncelle" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>