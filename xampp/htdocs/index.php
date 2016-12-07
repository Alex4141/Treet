<?php
	session_start();
	include 'NavBar.php';
?>

<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/candyicon.png" alt="">
                    <div class="intro-text">
                        <span class="name">Treet</span>
                        <hr class="star-light">
						<span class="skills">
						Feel like a kid in a candy store. 
						All over again.
						</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Shops Grid Section -->
    <section id="Shops">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" style="text-align: center">
                    <h2>Shops</h2>
                    <hr class="star-primary">
                </div>
            </div>
			<div class="row" style="padding-top: 40px; text-align: center">
				<a href="./Shop_Mars.php">
					<img src="img/Mars-candy-logo.png" class="img-responsive" alt="">
				</a>
			</div>
			<div class="row" style="padding-top: 40px; text-align: center">
				<a href="./Shop_Hershey.php">
					<img src="img/hershey-logo.png" class="img-responsive" alt="">
				</a>
			</div>
			<div class="row" style="padding-top: 40px; text-align: center">
				<a href="./Shop_Nestle.php">
					<img src="img/nestle-logo.png" class="img-responsive" alt="">
				</a>
			</div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="About">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" style="text-align: center">
                    <h2>About</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row intro-text">
                <div style="text-align: center">
                    <p>Treet provides for all your bulk-candy buying needs!</p>
                    <p>We were founded by a group of students in late 2016.</p>
                </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" style="text-align: center">
                    <h2>Contact Me</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
    
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>