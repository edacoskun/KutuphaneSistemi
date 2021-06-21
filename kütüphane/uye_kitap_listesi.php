<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "kutuphane";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

$filtre = "";
if (isset($_GET["kitap_adi"])) {
    $filtre .= "and kitap_adi like '" . $_GET["kitap_adi"] . "%' ";
}
if (isset($_GET["isbn"])) {
    $filtre .= "and ISBN like '" . $_GET["isbn"] . "%' ";
}


$sql = "
		SELECT * FROM kitap
	
		
		WHERE 1=1 $filtre 
		ORDER BY kitap_id DESC
	";

    //echo $sql;die;


$cvp = mysqli_query($conn, $sql);
if (!$cvp) {
    echo '<br>Hata: ' . mysqli_error($conn);
} else {
?>

<style>

body{
   background:url("raf.jpg");
   background-size: 100% 100%;
   margin:0 auto; 
   color: black;
   margin: 10;
}

h3{
    color: white;
    font-size: 30px;
    text-align: center;
}
table, th, td {
  border: 2px solid black;
  border-collapse: collapse;
  background-color: white;
  padding: 10px;
  text-align: left;
}
th{
    background-color: #6495ed;
}
.a{
    width: 200px;
    height:35px;
}
.liste{
    margin-left: auto;
    margin-right: auto;
}
.buton{
   color: white;
   margin-top: 1%;
   width: 8%;
   outline: none;
   height: 4vh;
   border-radius: 5px;
   border: none;
   background: linear-gradient(90deg, rgba(29,129,130,1) 0%, #14191d 100%);
}
.buton:hover{
   opacity: 0.7;
}
.buton:active{
   opacity: 0.8;
}

</style>
<body>
 
    <form class="arama">
        <input value="<?= isset($_GET["kitap_adi"]) ? $_GET["kitap_adi"] : ""; ?>" type="text" class="a" name="kitap_adi" placeholder="Kitap Adı ile Ara">
        <input value="<?= isset($_GET["isbn"]) ? $_GET["isbn"] : ""; ?>" type="text" name="isbn" class="a" placeholder="ISBN ile Ara">
        <button class= "buton" value="LİSTELE" style= "font-size: large;">LİSTELE</button>
    </form>
    <hr>
    <table class="liste">
    <h3>KİTAP LİSTESİ</h3> 
        <thead>
            <tr>
                <th>KİTAP ID</th>
                <th>ISBN</th>
                <th>KİTAP ADI</th>
                <th>KİTAP YAZARI</th>
                <th>KATEGORİ</th>
                
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($cvp)) { ?>
            <?php
            $kitap_kategoriler = "";

            $sql_query = "SELECT * FROM kitap_kategori 
			              INNER JOIN kategori
						  ON kategori.kategori_id = kitap_kategori.kategori_id
                          WHERE kitap_kategori.kitap_id = '".$row['kitap_id']."' ";

            $getir = mysqli_query($conn, $sql_query);
            while ($kategori_row = mysqli_fetch_array($getir)) { 
                $kitap_kategoriler .= $kategori_row["kategori_adi"]. ", ";
            }
            $kitap_kategoriler = rtrim($kitap_kategoriler,", ");


            $kitap_yazarlar = "";

            $sql_query = "SELECT * FROM kitap_yazar 
			              INNER JOIN yazar
						  ON yazar.yazar_id = kitap_yazar.yazar_id
                          WHERE kitap_yazar.kitap_id = '".$row['kitap_id']."' ";

            $getir = mysqli_query($conn, $sql_query);
            while ($yazar_row = mysqli_fetch_array($getir)) { 
                $kitap_yazarlar .= $yazar_row["yazar_adi"]." ".$yazar_row["yazar_soyadi"].  ", ";
            }
            $kitap_yazarlar = rtrim($kitap_yazarlar,", ");

            ?>
                <tr>
                    <td><?= $row["kitap_id"]; ?></td>
                    <td><?= $row["ISBN"]; ?></td>
                    <td><?= $row["kitap_adi"]; ?></td>
                    <td><?= $kitap_yazarlar; ?></td>
                    <td><?= $kitap_kategoriler ?></td>
                    
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
}
?>
</body>