<?php
require('php/database.php');
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php require("components/style.php"); ?>
	<title><?php echo $open;?> - Contact</title>
</head>

<body>
	<header class="contact-header">
		<div class="container text-center">
			<h1>Contact</h1>
			<p>Heeft u vragen? Contacteer ons. We reageren zo snel mogelijk terug.</p>
		</div>
	</header>
	<?php require("components/navbar.php"); ?>
	<section class="container mb-5 card card-body" id="contact">
		<div class="row">
                    <div class="col-lg-6 mx-auto">
                        <form id="contactForm" name="sentMessage" novalidate="novalidate">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Name</label>
                                    <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Email Address</label>
                                    <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Phone Number</label>
                                    <input class="form-control" id="phone" type="tel" placeholder="Phone Number" required="required" data-validation-required-message="Please enter your phone number." />
                                    <p class="help-block text-danger"></p>
                                </div>
							</div>
							<div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Subject</label>
                                    <input class="form-control" id="subject" type="text" placeholder="Subject" required="required" data-validation-required-message="Please enter your Subject." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Message</label>
                                    <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br />
                            <div id="success"></div>
                            <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Send</button></div>
                        </form>
                    </div>
                <div class="col-md-3 mx-auto mt-5 text-center">
				<ul class="list-unstyled mb-0">
					<li><i class="icon fas fa-map-marker-alt fa-2x"></i>
						<p><?php echo $adres;?></p>
					</li>

					<li><i class="icon fas fa-phone mt-4 fa-2x"></i>
						<p><?php echo $phone;?></p>
					</li>

					<li><i class="icon fas fa-envelope mt-4 fa-2x"></i>
						<p><?php echo $emailen;?></p>
					</li>

                    <li><i class="icon fas fa-envelope mt-4 fa-2x"></i>
						<a style="color: #0d6efd;" href="<?php echo $porto;?>"><p>Check Mijn Portfolio</p></a>
					</li>
				</ul>
			</div>
                </div>
            </div>
	</section>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<?php
    require("components/footer.php");
    require("components/scripts.php"); ?>
	<script src="js/mail/jqBootstrapValidation.js"></script>
	<script src="js/mail/contact_me.js"></script>
</body>

</html>