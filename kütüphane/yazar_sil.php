<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "kutuphane";

$conn = new mysqli($servername, $username, $password, $db);


$sql = "
       DELETE FROM yazar WHERE yazar_id = ".$_GET["id"]."
	   ";
$sql2 = "
		DELETE FROM kitap_yazar WHERE yazar_id = ".$_GET["id"]."
	    ";
$sql3 = "
		DELETE FROM kitap WHERE kitap_yazari = ".$_GET["id"]."
	    ";

$cvp = mysqli_query($conn, $sql);
$cvp = mysqli_query($conn, $sql2);
$cvp = mysqli_query($conn, $sql3);

header("Location: yazar_listesi.php");
?>