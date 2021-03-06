<?php
session_start();
require('php/database.php');
$sql = "SELECT id,title,subtext,text,headimage FROM projects ORDER BY date DESC LIMIT 6;";
$result = $conn->query($sql);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php require("components/style.php"); ?>
	<title><?php echo $open;?> - Home</title>
</head>

<body>
	<header>
		<div class="container text-center">
			<h1><?php echo $open;?></h1>
			<p>Software Developer - Web Developer - Student</p>
		</div>
	</header>
	<?php require("components/navbar.php"); ?>
	<section id="article">
		<div class="container">
			<div class="row">
			<?php
                foreach ($result as $item) {
                $image = $item['headimage'];
                echo "
                <div class='colum col-sm-12 col-md-6 col-lg-4'>
				<article class='card' style='background-image: url(";
				echo $image; 
				echo "); '>
                    <div class='card-body'>
                        <h2>".$item['title']."</h2>
                        <p>".$item['subtext']."</p>
                        <p class='read'><a class='stretched-link' href='post.php?id=".$item['id']."'>Lees verder...</a></p>
                    </div>
                </article>
                </div>";
                }
                ?>
			</div>
		</div>
	</section>
	<?php
	require("onepage/bio.php");
	require("onepage/contact.php");
	require("components/footer.php");
	?>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<?php require("components/scripts.php"); ?>
	<script src="js/mail/jqBootstrapValidation.js"></script>
	<script src="js/mail/contact_me.js"></script>
</body>

</html>