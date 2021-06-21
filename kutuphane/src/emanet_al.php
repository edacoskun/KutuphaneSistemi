<?php
include("baglanti.php");

if(isset($_GET['uye_id']) && isset($_GET['kitap_id'])){

    $kitap_id=$_GET["kitap_id"];
    $uye_id=$_GET["uye_id"];
    $emanet="SELECT * FROM emanet ";

    $sonuc=mysqli_query($connection,$emanet);

    if($sonuc)
        {   
            $delete_emanet="DELETE FROM emanet WHERE uye_id=$uye_id";
            $update_kitap="UPDATE kitap SET stok=stok+1 WHERE kitap_id=$kitap_id";
            $update_uye="UPDATE uye SET durum=1 WHERE uye_id=$uye_id";
            echo "<script>alert('Kitap geri alındı')</script>";
            $sonuc_emanet=mysqli_query($connection,$delete_emanet);
            $sonuc_kitap=mysqli_query($connection,$update_kitap);
            $sonuc_uye=mysqli_query($connection,$update_uye);
             echo "<script>alert('Kitap geri alındı')</script>";
             header("Location: kitap_listesi.php");
             exit();
        }
    else{
            die("\n Kitap geri alma başarısız".mysqli_connect_error());
    }
    
}

?>