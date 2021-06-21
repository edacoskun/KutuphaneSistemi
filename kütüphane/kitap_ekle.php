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
else{
    
    $ISBN = $_POST["ISBN"];
    $kitap_adi = $_POST["kitap_adi"];
    $kitap_yazari = $_POST["kitap_yazari"];
    $kitap_stok = $_POST["kitap_stok"];
	if ($kitap_yazari == 0){
		 echo'<script language = "javascript">';
          echo'alert("Yazar Seçiniz !!.");';
          echo'window.location.href="kitap_islemleri.php";';
          echo'</script>';
	}
		
$kategoriler = $_POST["kategoriler"];
$yazarlar = $_POST["yazarlar"];

    
    $kitap_yayinevi = $_POST["kitap_yayinevi"];
    $add = "INSERT INTO kitap (ISBN, kitap_adi, kitap_yayinevi,stok) 
            VALUES ('$ISBN','$kitap_adi','$kitap_yayinevi','$kitap_stok')";
   
      if ($conn->query($add)) {
		  $kitap_id = $conn->insert_id;
		  
		foreach ($kategoriler as $value)
			{
				$query = "INSERT INTO kitap_kategori (kitap_id,kategori_id) VALUES ($kitap_id,$value)";

				$conn->query($query);
			}

            foreach ($yazarlar as $value)
			{
                $query="INSERT INTO kitap_yazar(kitap_id, yazar_id) VALUES ($kitap_id,$value)";

				$conn->query($query);
			}
		  
          echo'<script language = "javascript">';
          echo'alert("Kitap ekleme işlemi tamamlandı.");';
          echo'</script>';
          header("Location: yonetici_anasayfa.html");
                exit();

          
      } 
      else{
          echo'<script language = "javascript">';
          echo'alert("Kitap ekleme işlemi BAŞARISIZ !!");';
          echo'window.location.href="kitap_islemleri.php";';
          echo'</script>';
      }

}
?>


