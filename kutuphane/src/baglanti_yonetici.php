<?php
$connection = mysqli_connect('localhost','root','','kutuphane') or die ("baglantı saglanamadi");
mysqli_select_db($connection,'kutuphane') or die ("veri tabanı baglantisi saglanamadi.");

if(isset($_SESSION['login'])){
    if($_SESSION['login']==5){
        $calisan_id = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($_SESSION['calisan_id']))));
        
        $calisanquery = mysql_query("SELECT * FROM calisan WHERE calisan_id='".$calisan_id."'");
        
        while($calisansonuc = mysql_fetch_array($calisanquery)){
            $calisan_email = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($calisansonuc['calisan_email']))));
            $calisan_sifre= addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($calisansonuc['calisan_sifre']))));
           
        }
    }
}

?>