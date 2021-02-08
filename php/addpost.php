<?php

session_start();
require('database.php');
if (!isset($_SESSION["loggedin"])) {
	header("Location: ../index.php");
	exit();
}

// Insert into DATABASE
if(isset($_POST["title"], $_POST["text"], $_POST["subtext"], $_FILES['image'])){
$image = $_FILES['image'];
$Tijdelijk = $image['tmp_name'];
$imagenaam = $image['name'];
$type = $image['type'];
$map = 'uploads/';
$Toegestaan = array("image/jpg","image/jpeg","image/png","image/gif");

if (in_array($type,$Toegestaan)){
    move_uploaded_file($Tijdelijk, "../".$map.$imagenaam);
}else{
    header("Location: createpost.php?error=nietgeupload");
}
$afbeelding = $map.$imagenaam;
    if ($stmt = $conn->prepare("INSERT INTO project (id, title, subtext, text, headimage) values (NULL,?, ?, ?, ?)")) {
        $stmt->bind_param("ssss", $_POST['title'], $_POST['subtext'], $_POST['text'], $afbeelding);
        $stmt->execute();
        header("Location: ../admin/dashboard.php");
    } 
    else {
        header('Location: ../admin/createpost.php?error=mysql');
    } 
} else {
    header('Location: ../admin/createpost.php?error=fields');
}