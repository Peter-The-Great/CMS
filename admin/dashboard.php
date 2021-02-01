<?php
session_start();
require('../php/database.php');
if (!isset($_SESSION["loggedin"])) {
	header("Location: ../index.php");
	exit();
}
$sql = "SELECT id,title,date FROM project ORDER BY date DESC;";
$result = $conn->query($sql);
$username = $_SESSION['name'];
$id = $_SESSION['id'];

?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php require("style.php"); ?>
	<title>De Colomnist Admin - Dashboard</title>
</head>
<nav class="navbar navbar-expand-md navbar-fixed-top navbar-light bg-light main-nav">
	<div class="container">
		<ul class="nav mx-auto">
			<li class="nav-item">
				<a class="nav-link active text-dark" href="dashboard.php">Posts</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-secondary" href="biografie.php">Biografie</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-secondary" href="Profile.php">Profiel</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-secondary" href="../php/login/logout.php">Logout</a>
			</li>
		</ul>
	</div>
</nav>
<div class="container">
	<?php echo '<a href="createpost.php" class="btn btn-success mt-5"><i class="fas fa-user-plus"></i> Post Aanmaken</a>' ?>
	<div class="center-div">
		<table class="table mt-2">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Titel</th>
					<th scope="col">Datum</th>
					<th scope="col"></th>
					<th scope="col"></th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>

				<?php
				foreach ($result as $item) {
					echo "<td>" . $item["id"] . "</td>" . "<td>" . $item["title"] . "</td><td>" . $item["date"] . "</td></td><td><a href='../post.php?id=" . $item['id'] . "' class='btn btn-info'><i class='fas fa-eye'></i></a></td><td><a href='changepost.php?id=" . $item['id'] . "' class='btn btn-warning'><i class='fas fa-user-edit'></i></a></td><td><a href='../php/removepost.php?id=" . $item["id"] . "' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a></td></tr>";
				}
				?>
			</tbody>
		</table>

	</div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php require("scripts.php"); ?>

</html>