<?php
include_once 'baglanti.php';
$sql = "DELETE FROM kutuphane WHERE kutuphane_id='" . $_GET["kutuphane_id"] . "'";
if (mysqli_query($connection, $sql)) {
    echo "Record deleted successfully";
    header('Location: delete_kutuphane.php');
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($connection);
}
mysqli_close($connection);
?>