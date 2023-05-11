<?php
require_once('dbconn.php');

$stmt = $conn->prepare("INSERT INTO beverage (bevtitle, bevdesc, bevprice, bevcategory, bevimg) VALUES (:title, :description, :price, :category, :image)");
$stmt->bindParam(':title', $_POST['newbevtitle']);
$stmt->bindParam(':description', $_POST['newbevdesc']);
$stmt->bindParam(':price', $_POST['newbevprice'], PDO::PARAM_INT);
$stmt->bindParam(':category', $_POST['newbevcategory']);

if(isset($_FILES['newbevimg']) && $_FILES['newbevimg']['error'] == 0) {
    $file_name = $_FILES['newbevimg']['name'];
    $file_size = $_FILES['newbevimg']['size'];
    $file_tmp = $_FILES['newbevimg']['tmp_name'];
    $file_type = $_FILES['newbevimg']['type'];
  
    $fp = fopen($file_tmp, 'r');
    $content = fread($fp, filesize($file_tmp));
    fclose($fp);

    $stmt->bindParam(':image', $content, PDO::PARAM_LOB);
} else {
    $stmt->bindValue(':image', NULL, PDO::PARAM_NULL);
}
$stmt->execute();
header('Location: manageproduct.php');

$conn = null;
?>
