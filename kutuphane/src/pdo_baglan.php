<?php



try
{
    $kutuphane =new PDO("mysql:host=localhost;dbname=kutuphane2","root","");

}
catch(PDOException $mesaj){
    echo $mesaj->getMessage();
}



?>