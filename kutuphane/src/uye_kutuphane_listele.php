<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "kutuphane";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

$filtre = "";
if (isset($_GET["kutuphane_id "])) {
    $filtre .= "and kutuphane_id  like '" . $_GET["kutuphane_id "] . "%' ";
}
if (isset($_GET["kutuphane_adi"])) {
    $filtre .= "and kutuphane_adi like '" . $_GET["kutuphane_adi"] . "%' ";
}
if (isset($_GET["address_id"])) {
    $filtre .= "and address_id like '" . $_GET["address_id"] . "%' ";
}




$sql = "
		SELECT * FROM kutuphane


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
    
    <hr>
    <table class="liste">
    <h3>KÜTÜPHANE LİSTESİ</h3> 
        <thead>
            <tr>
                <th>KÜTÜPHANE ID</th>
                <th>KÜTÜPHANE ADİ</th>
                

            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($cvp)) { ?>
            <?php
            $kitap_kategoriler = "";

            $sql_query = "SELECT * FROM kutuphane 
                          WHERE kutuphane.kutuphane_id = '".$row['kutuphane_id']."' ";

            $getir = mysqli_query($conn, $sql_query);
       
            ?>
                <tr>
                    <td><?= $row["kutuphane_id"]; ?></td>
                    <td><?= $row["kutuphane_adi"]; ?></td>
                    
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
}
?>
</body>