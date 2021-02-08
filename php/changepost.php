<?php
session_start();
require('database.php');
if (!isset($_SESSION["loggedin"])) {
	header("Location: ../index.php");
	exit();
}

// Insert into DATABASE
if(isset($_POST["title"], $_POST["text"], $_POST["subtext"], $_POST['Huidige_Afbeelding'])){
    
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
    $sql = "UPDATE project SET title=?, subtext=?, text=? WHERE id=?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssi", $_POST['title'], $_POST['subtext'], $_POST['text'], $_GET['id']);
        $stmt->execute();
        //$stmt->close();
        header("Location: ../admin/dashboard.php");
    }
    else {
        header('Location: ../admin/changepost.php?error=mysql');
    }
} 
elseif ($Afbeeldingnaam != $Huidig && in_array($type, $Toegestaan)) {
        unlink($unlink.$Huidig);
        move_uploaded_file($Tijdelijk, "../".$map.$Afbeeldingnaam);
        $sql = "UPDATE project SET title=?, subtext=?, text=?, headimage=? WHERE id=?";
        $imagenew = $map.$Afbeeldingnaam;
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssssi", $_POST['title'], $_POST['subtext'], $_POST['text'], $imagenew, $_GET['id']);
            $stmt->execute();
            //$stmt->close();
            header("Location: ../admin/dashboard.php");
        }
        else {
            echo "Iets met de image";
            exit();
            header('Location: ../admin/changepost.php?error=mysql');
        }
    }else {
        header('Location: ../admin/changepost.php?error=image_niet_geupload');
    }
}else {
    header('Location: ../admin/changepost.php?error=fields');
}
?>