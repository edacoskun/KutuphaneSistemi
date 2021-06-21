<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "kutuphane";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

$filtre = "";
if (isset($_GET["uye_id "])) {
    $filtre .= "and uye_id  like '" . $_GET["uye_id "] . "%' ";
}
if (isset($_GET["uye_name"])) {
    $filtre .= "and uye_name like '" . $_GET["uye_name"] . "%' ";
}
if (isset($_GET["uye_surname"])) {
    $filtre .= "and uye_surname like '" . $_GET["uye_surname"] . "%' ";
}
if (isset($_GET["address_id"])) {
    $filtre .= "and address_id like '" . $_GET["address_id"] . "%' ";
}
if (isset($_GET["uye_email"])) {
    $filtre .= "and konum like '" . $_GET["uye_email"] . "%' ";
}


$sql = "
		SELECT * FROM uye


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
<p><a href="yonetici_anasayfa.html">Geri Dön</a> 


    <hr>
    <table class="liste">
    <h3>ÜYE LİSTESİ</h3> 
        <thead>
            <tr>
                <th>ÜYE ID</th>
                <th>ÜYE AD</th>
                <th>ÜYE SOYAD</th>
                <th>ÜYE EMAİL</th>
                <th colspan="2">İŞLEMLER</th>

            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($cvp)) { ?>
            <?php
            $kitap_kategoriler = "";

            $sql_query = "SELECT * FROM uye 
                          WHERE uye.uye_id = '".$row['uye_id']."' ";

            $getir = mysqli_query($conn, $sql_query);
       
            ?>
                <tr>
                    <td><?= $row["uye_id"]; ?></td>
                    <td><?= $row["uye_name"]; ?></td>
                    <td><?= $row["uye_surname"]; ?></td>
                    <td><?= $row["uye_email"]; ?></td>
                    <td><button type="button" style="background-color: #6495ed;"><a href="delete-process.php?uye_id=<?= $row["uye_id"]; ?>">SİL</a></button></td>
                    <td><button type="button" style="background-color: #6495ed;"><a href="guncelle.php?uye_id=<?= $row["uye_id"]; ?>">GÜNCELLE</a></button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php
}
?>
</body>