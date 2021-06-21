<?php
include("baglanti.php");

if(isset($_GET['uye_id']) && isset($_GET['kitap_id'])){

    $kitap_id=$_GET['kitap_id'];
    $uye_id=$_GET['uye_id'];
    $emanet="INSERT INTO emanet ( uye_id, kitap_id)
    VALUES ('".$uye_id."' , '".$kitap_id."')";


    $sonuc=mysqli_query($connection,$emanet);

    if($sonuc)
        {   
            $update_kitap="UPDATE kitap SET stok=stok-1 WHERE kitap_id=$kitap_id";
            $update_uye="UPDATE uye SET durum=0 WHERE uye_id=$uye_id";
            echo "<script>alert('Emanet verildi')</script>";
            $sonuc_kitap=mysqli_query($connection,$update_kitap);
            $sonuc_uye=mysqli_query($connection,$update_uye);
             echo "<script>alert('Emanet verildi')</script>";
             header("Location: kitap_listesi.php");
             exit();
        }
    else{
            die("\n emanet başarısız".mysqli_connect_error());
    }
    
}

?>