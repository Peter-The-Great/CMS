<?php
require('php/database.php');
session_start();
if (!isset($_GET['id'])) {
	header("Location: ../index.php");
	return false;
}

if ($stmt = $conn->prepare("SELECT title,text,headimage FROM projects WHERE id = ?")) {
	$stmt->bind_param("i", $_GET["id"]);
	$stmt->execute();
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
		$stmt->bind_result($title, $text, $image);
		$stmt->fetch();
	} else {
		header("Location: ../index.php");
	}
	$stmt->close();
}

?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php require("components/style.php"); ?>
	<title><?php echo $open;?> - <?php echo $title; ?></title>
</head>

<body>
	<header style="background-image: url(<?php echo $image ?>) !important;">
		<div class="container text-center">
			<h1><?php echo $title; ?></h1>
		</div>
	</header>
	<?php require("components/navbar.php"); ?>
	<section class="container" id="biografie">
		<div class="row">
			<span class="maxw"><?php echo $text; ?></span>
			<br><br>
			<a class="maxw mb-1" href="index.php">← Terug naar homepage</a>
			<?php if(isset($_SESSION["loggedin"])) {
				echo "<a class='maxw mt-3' href='admin/dashboard.php'>← Terug naar dashboard</a>";
				} ?>
		</div>

	</section>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<?php require("components/scripts.php"); ?>
</body>

</html>