<?php
session_start();
require('database.php');
if (!isset($_SESSION["loggedin"])) {
	header("Location: ../index.php");
	exit();
}
// Update into DATABASE
if(isset($_POST["username"],$_POST["openname"],$_POST["email"],$_POST["Huidige_Afbeelding"])){
    
    $Huidig = $_POST['Huidige_Afbeelding'];
    $Afbeelding = $_FILES['image'];
    $Tijdelijk = $Afbeelding['tmp_name'];
    $Afbeeldingnaam = $Afbeelding['name'];
    $type = $Afbeelding['type'];
    $map = "uploads/";
    $unlink = "../";
    $Toegestaan = array("image/jpg","image/jpeg", "image/png", "image/gif");
    $sql = "";
    
    if (empty($Afbeelding) || $Afbeelding['size'] == 0) {
        $sql = "UPDATE users SET `username`=?, `openname`=?, `email`=?,`adres`=?,`phone`=? WHERE id=1";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssss", $_POST["username"], $_POST["openname"], $_POST["email"], $_POST["adres"], $_POST["phone"]);
    
        $stmt->execute();
        $stmt->close();
        header("Location: ../admin/dashboard.php");
    } 
    else {
        header('Location: ../admin/profile.php?error=mysql');
    } 
}
elseif ($Afbeeldingnaam != $Huidig && in_array($type, $Toegestaan)) {
    unlink($unlink.$Huidig);
    move_uploaded_file($Tijdelijk, "../".$map.$Afbeeldingnaam);
    $newimg = $map.$Afbeeldingnaam;
    $sql = "UPDATE users SET `username`=?, `openname`=?, email=?, `adres`=?,`phone`=?, `profile`=? WHERE id=1";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssss", $_POST["username"], $_POST["openname"], $_POST["email"], $_POST["adres"], $_POST["phone"], $newimg);
        $stmt->execute();
        $stmt->close();
        header("Location: ../admin/dashboard.php");
    } 
    else {
        header('Location: ../admin/profile.php?error=mysql');
    } 
}else{
    header('Location: ../admin/profile.php?error=image_niet_geupload');
}

}
else {
    header('Location: ../admin/profile.php?error=fields');
}
?>