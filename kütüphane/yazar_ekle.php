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
    
    $yazar_adi = $_POST["yazar_adi"];
    $yazar_soyadi = $_POST["yazar_soyadi"];
	if ($yazar_adi == 0 && $yazar_soyadi == 0){
		  echo'<script language = "javascript">';
          echo'alert("Yazar Giriniz !!.");';
          echo'window.location.href="yazar_islemleri.php";';
          echo'</script>';
	}
		
    $yazarlar = $_POST["yazarlar"];

    
    $add = "INSERT INTO yazar (yazar_adi, yazar_soyadi) 
            VALUES ('$yazar_adi','$yazar_soyadi')";
   
      if ($conn->query($add)) {
		  $kitap_id = $conn->insert_id;
		  
		foreach ($yazar as $value)
			{
				$query = "INSERT INTO kitap_yazar (kitap_id,yazar_id) VALUES ($yazar_id,$value)";
				$conn->query($query);
			}
		  
          echo'<script language = "javascript">';
          echo'alert("Yazar ekleme işlemi tamamlandı.");';
          echo'</script>';
          header("Location: yonetici_anasayfa.html");
                exit();

          
      } 
      else{
          echo'<script language = "javascript">';
          echo'alert("Yazar sistemde kayıtlı!");';
          echo'window.location.href="yazar_islemleri.php";';
          echo'</script>';
      }

}
?>