<?php
require_once('dbconn.php');

try {
    $sql = "DELETE FROM beverage WHERE bevID = :bevID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':bevID', $_GET['bevID'], PDO::PARAM_STR);
    $stmt->execute();
    header('Location: manageproduct.php');
} catch(PDOException $e) {
    echo "ERROR: ". $e->getMessage();
}

$conn = null;
?>
