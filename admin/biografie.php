<?php
session_start();
require('../php/database.php');
if (!isset($_SESSION["loggedin"])) {
    header("Location: ../index.php");
    exit();
}

if($stmt = $conn->prepare("SELECT text FROM bio WHERE id = 1")) {
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($text);
        $stmt->fetch();
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.discordapp.com/attachments/618095047711391757/713383608932368434/default.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
    <!-- Script Tiny CME -->
    <script src="https://cdn.tiny.cloud/1/swq7hpikkqwjjze9ad6mykwgy37w7e1mlvbbslqdqokoedyw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    

    <title>De Colomnist Admin - Biografie</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-fixed-top navbar-light bg-light main-nav">
        <div class="container">
            <ul class="nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-secondary active" href="dashboard.php">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark active" href="biografie.php">Biografie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="../php/login/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-2">
        <form method="POST" action="../php/changebiografie.php">
            <div class="form-group">
                <label for="text">Biografie Tekst</label>
                <textarea name="text" id="text"><?php echo $text;?></textarea required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-dark">
            </div>
            <?php
                if (isset($_GET['error=mysql'])) {
                    echo "<span style='color: rgb(0,185,255);'>The biography wasn't send correctly.</span>";
                }
                if (isset($_GET['error=fields'])) {
                    echo "<span style='color: rgb(0,185,255);'>The biography wasn't send correctly.</span>";
                }
                ?>
        </form>
    </div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/24c24daece.js"></script>
    <script>
        tinymce.init({
            selector: '#text',
            height: '480',
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic forecolor backcolor | alignleft aligncenter ' +
                'alignright alignjustify | link unlink | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    </script>
</body>
</html>