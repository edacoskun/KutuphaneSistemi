<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "kutuphane";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);


$sql = "
       DELETE FROM kitap WHERE kitap_id = ".$_GET["id"]."
	   ";
$sql2 = "
		DELETE FROM kitap_kategori WHERE kitap_id = ".$_GET["id"]."
	    ";

$cvp = mysqli_query($conn, $sql);
$cvp = mysqli_query($conn, $sql2);

header("Location: kitap_listesi.php");
?>