<?php

    $vt_sunucu="localhost";
    $vt_kullanici="root";
    $vt_sifre="";
    $vt_adi="kutuphane";

    $connection=mysqli_connect($vt_sunucu,$vt_kullanici,$vt_sifre,$vt_adi);

    if(!$connection)
    {
        die("veritabani baglantisi basarisiz".mysqli_connect_error());
    
    }
    else{
       
    }

?>