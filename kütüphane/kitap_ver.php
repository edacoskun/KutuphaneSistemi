<?php

include("baglanti.php");

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


$cvp = mysqli_query($connection, $sql);
if (!$cvp) {
    echo '<br>Hata: ' . mysqli_error($conn);
} else {
?>

<style>

body{
   background:url("raf.jpg");
 /*  background-color: #DADADE;*/
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
  border:2px solid black;
  /*border-color:#DADADE;*/
  border-collapse: collapse;
  background-color: white;
  padding: 10px;
  text-align: left;
  /*border-radius: 15px;*/
}
th{
    background-color: #487194;
}


.a{
    width: 200px;
    height:35px;
}
.liste{
    margin-left: auto;
    margin-right: auto;
}

.div{
    width: 80%;
    height: 35px;
    background-color: #BA9B8E;
   /* text-align: left;*/
    font-size: 30px;
    border-radius: 10px;
    align: center;
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
    <h3>ÜYE LİSTESİ</h3> 
        <thead>
            <tr>
                <th >Üye Id</th>
                <th>Üye Ad</th>
                <th>Üye Soyad</th>
                <th>Kitap Ver </th>

            </tr>
        </thead>
        <tbody>
        

        <?php

        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $kitap="SELECT * FROM kitap WHERE kitap_id =".$_GET["id"]."";
            $cevap = mysqli_query($connection, $kitap);
            $gelen=mysqli_fetch_array($cevap);
            
        }
        ?>

        <center>
        <div class="div" >

                <p align="center"><?=  $gelen['kitap_adi'] ?></strong> isimli kitap seçildi!</p>
        
        </div><br><br>
        
        </center>
        

        <?php while ($row = mysqli_fetch_array($cvp)) { ?>

        <?php

            $sql_query = "SELECT * FROM uye 
                          WHERE uye.uye_id = '".$row['uye_id']."' ";

            $getir = mysqli_query($connection, $sql_query);
       
        ?>
                <tr>
                    <td><?= $row["uye_id"]; ?></td>
                    <td><?= $row["uye_name"]; ?></td>
                    <td><?= $row["uye_surname"]; ?></td>
                    <td>
                        <?php if($row["durum"] == 0){
                            echo "Öncelikle kitabınızı teslim edin";
                        }
                        else{
                            ?>
                            <button  type="button" style="background-color: #6495ed;">
                            <a href="emanet_ver.php?uye_id=<?= $row["uye_id"]; ?>&kitap_id=<?= $gelen["kitap_id"]; ?>" >
                               <font color="white"> <b>Emanet Ver</b></font> 
                            </a></button>
                        <?php } ?> 
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
}
?>
</body>