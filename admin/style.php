<?php
$profileid = 1;
$profilequery = $conn->prepare("SELECT `profile`, `openname` FROM `users` WHERE `ID` = ?");
    $profilequery->bind_param("i", $profileid);
	$profilequery->execute();
	$profilequery->store_result();
if ($profilequery->num_rows > 0) {
    $profilequery->bind_result($profilepic, $open);
    $profilequery->fetch();
}else{
    $profilequery->error_list();
}
$profilequery->close();
?>
<link rel="shortcut icon" type="image/x-icon" href="../<?php echo $profilepic ?>">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/fontawsome.css">
<link rel="stylesheet" type="text/css" href="../css/custom.css">
<link rel="stylesheet" type="text/css" href="../css/start-bootstrap-styles.css">