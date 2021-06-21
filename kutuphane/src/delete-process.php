<?php
include_once 'baglanti.php';
$sql = "DELETE FROM uye WHERE uye_id='" . $_GET["uye_id"] . "'";
if (mysqli_query($connection, $sql)) {
    echo "Record deleted successfully";
    header('Location: yonetici_anasayfa.html');
        exit();
} else {
    echo "Error deleting record: " . mysqli_error($connection);
}
mysqli_close($connection);
?>