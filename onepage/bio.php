<?php
if($stmt = $conn->prepare("SELECT text FROM aboutme WHERE id = 1")) {
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($text);
		$stmt->fetch();
		$stmt->close();
    }
}
?>
<div class="container biografie-container text-center mt-5">
		<img class="rounded-circle" src="<?php echo $profilepic ?>" width="150" height="150">
			<h2>Over Mij <?php echo $open;?></h2>
		</div>
<section class="container" id="biografie">
		<div class="row">
			<span class="maxw"><?php echo $text;?></span>
		</div>
	</section>