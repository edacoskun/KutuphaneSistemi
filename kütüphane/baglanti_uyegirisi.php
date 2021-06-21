<?php
$connection = mysqli_connect('localhost','root','','kutuphane') or die ("baglantı saglanamadi");
mysqli_select_db($connection,'kutuphane') or die ("veri tabanı baglantisi saglanamadi.");

if(isset($_SESSION['login'])){
    if($_SESSION['login']==5){
        $uye_id = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($_SESSION['uye_id']))));
        
        $uyequery = mysql_query("SELECT * FROM uye WHERE uye_id='".$uye_id."'");
        
        while($uyesonuc = mysql_fetch_array($uyequery)){
            $uye_name = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($uyesonuc['uye_ad']))));
            $uye_surname = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($uyesonuc['uye_surname']))));
            $uye_mail = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($uyesonuc['uye_mail']))));
            $uye_adres = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($uyesonuc['uye_adres']))));
        }
    }
}

?>