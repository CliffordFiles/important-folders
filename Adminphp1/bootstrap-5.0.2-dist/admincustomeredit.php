<?php
require_once('dbconn.php');

try{
    $sql = "UPDATE registration SET firstname = :newfirstname, lastname = :newlastname, email = :newemail, username = :newusername, userstatus = :userstatus, address = :newaddress, mobilenumber = :newmobilenumber WHERE regID = :regID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':regID', $_GET['regID'], PDO::PARAM_STR);
    $stmt->bindParam(':newfirstname', $_GET['newfirstname'], PDO::PARAM_STR);
    $stmt->bindParam(':newlastname', $_GET['newlastname'], PDO::PARAM_STR);
    $stmt->bindParam(':newemail', $_GET['newemail'], PDO::PARAM_STR);
    $stmt->bindParam(':newusername', $_GET['newusername'], PDO::PARAM_STR);
    $stmt->bindParam(':userstatus', $_GET['userstatus'], PDO::PARAM_STR);
    $stmt->bindParam(':newaddress', $_GET['newaddress'], PDO::PARAM_STR);
    $stmt->bindParam(':newmobilenumber', $_GET['newmobilenumber'], PDO::PARAM_STR);
    $stmt->execute();
    header('Location: managecustomer.php');
}
catch(PDOException $e){
    echo "ERROR: ". $e->getMessage();
}
$conn = null;
?>