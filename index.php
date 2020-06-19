<?php
//index.php

$message = '';

function clean_text($string)
{
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}

if(isset($_POST["submit"]))
{


	$path = 'upload/' . $_FILES["resume"]["name"];
	move_uploaded_file($_FILES["resume"]["tmp_name"], $path);
	$message = '
		<h3 align="center">Customer Details</h3>
		<table border="1" width="100%" cellpadding="5" cellspacing="5">
			<tr>
				<td width="30%">Name</td>
				<td width="70%">'.$_POST["name"].'</td>
			</tr>
			<tr>
				<td width="30%">Address</td>
				<td width="70%">'.$_POST["address"].'</td>
			</tr>
			<tr>
				<td width="30%">Email Address</td>
				<td width="70%">'.$_POST["email"].'</td>
			</tr>


			<tr>
				<td width="30%">Phone Number</td>
				<td width="70%">'.$_POST["mobile"].'</td>
			</tr>
			<tr>
				<td width="30%">Additional Information</td>
				<td width="70%">'.$_POST["additional_information"].'</td>
			</tr>
		</table>
	';

	require 'class/class.phpmailer.php';
	require 'class/class.exception.php';
require 'class/class.smtp.php';
	$mail = new PHPMailer;
	$mail->IsSMTP();								//Sets Mailer to send message using SMTP
	$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
	$mail->Port = '587';								//Sets the default SMTP server port
	$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
	$mail->Username = 'apnidawaa19@gmail.com';					//Sets SMTP username
	$mail->Password = 'apnidawaavaranasi';					//Sets SMTP password
	$mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
	$mail->From = $_POST["email"];					//Sets the From email address for the message
	$mail->FromName = $_POST["name"];				//Sets the From name of the message
	$mail->AddAddress('apnidawaa19@gmail.com', 'Gmail');		//Adds a "To" address
	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML
	$mail->AddAttachment($path);					//Adds an attachment from a path on the filesystem
	$mail->Subject = 'Apnidawaa prescription';				//Sets the Subject of the message
	$mail->Body = $message;							//An HTML or plain text message body
	if($mail->Send())								//Send an Email. Return true on success or false on error
	{
		$message = '<div class="alert alert-success">Application Successfully Submitted</div>';
		unlink($path);
	}
	else
	{
		$message = '<div class="alert alert-danger">There is an Error</div>';
	}
}

?>




<!DOCTYPE html>
<html lang="en">
   <!-- Basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- Site Metas -->
   <title>Apni dawaa</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- Site Icons -->
   <link rel="shortcut icon" href="images/fevicon.ico.png" type="image/x-icon" />
   <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- Site CSS -->
   <link rel="stylesheet" href="style.css">
   <!-- Colors CSS -->
   <link rel="stylesheet" href="css/colors.css">
   <!-- ALL VERSION CSS -->
   <link rel="stylesheet" href="css/versions.css">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="css/custom.css">
   <!-- Modernizer for Portfolio -->
   <script src="js/modernizer.js"></script>
   <!-- [if lt IE 9] -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<style>
.myDiv {
  border: 5px outset red;
  background-color: lightblue;
  text-align: center;
}
</style>

   </head>
   <body class="clinic_version">
      <!-- LOADER -->
      <div id="preloader">
         <img class="preloader" src="images/loaders/heart-loading2.gif" alt="">


			 </div>
		 <!-- END LOADER -->
		 <header>
				<div class="header-top wow fadeIn">
					 <div class="container">
							<a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="image"></a>
							<div class="right-header">
								 <div class="header-info">
										<div class="info-inner">
											 <span class="icontop"><img src="images/phone-icon.png" alt="#"></span>
											 <span class="iconcont"><a href="tel:+917839226481">7839226481</a></span>
										</div>
										<div class="info-inner">
											 <span class="icontop"><i class="fa fa-envelope" aria-hidden="true"></i></span>
											 <span class="iconcont"><a data-scroll href="apnidawaa19@gmail.com">apnidawaa</a></span>
										</div>
										<div class="info-inner">
											 <span class="icontop"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
											 <span class="iconcont">  <div class="main">

														 <div class="clock">
																 <span id="hours">02:</span>
																 <span id="minutes">30:</span>
																 <span id="seconds">23</span>
														 </div>

												 </div>
											 </span>
										</div>
								 </div>
							</div>
					 </div>
				</div>
				<div class="header-bottom wow fadeIn">
					 <div class="container">
							<nav class="main-menu">
								 <div class="navbar-header">
										<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i class="fa fa-bars" aria-hidden="true"></i></button>
								 </div>

								 <div id="navbar" class="navbar-collapse collapse">
											<ul class="nav navbar-nav">
												 <li><a class="active" href="#index">Home</a></li>
												 <li><a data-scroll href="#about">About us</a></li>
												 <li><a data-scroll href="#service">Order</a></li>

												 <li><a data-scroll href="#price">Our services</a></li>

												 <li><a data-scroll href="#getintouch">Contact</a></li>
											</ul>
									 </div>
								</nav>

									 <div id="custom-search-input">



												 <marquee  >We provide contactless delivery to ensure zero contact.</marquee>


												 </span>
											</div>
									 </div>
								</div>
						 </div>
					</div>
			 </header>
		 <div id="home" class="parallax first-section wow fadeIn" data-stellar-background-ratio="0.4" style="background-image:url('images/slider-bg.png');">
				<div class="container">
					 <div class="row">
							<div class="col-md-12 col-sm-12">
								 <div class="text-contant">
										<h2>
											 <span class="center"><span class="icon"><img src="images/icon-logo.png" alt="#" /></span></span>
											 <a href="" class="typewrite" data-period="2000" data-type='[ "#Stay Home", "#Stay Safe"]'>
											 <span class="wrap"></span>
											 </a>
										</h2>
								 </div>
							</div>
					 </div>
					 <!-- end row -->
				</div>
				<!-- end container -->
		 </div>
		 <!-- end section -->
		 <div id="time-table" class="time-table-section">
				<div class="container">
					 <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="row">
								 <div class="service-time one" style="background:#2895f1;">
										<span class="info-icon"><i class="fa fa-ambulance" aria-hidden="true"></i></span>
										<h3>Delivery service</h3>

										<p> Now, you can order your medicines online through websites , You can also avail cash on delivery service across locations in  Varanasi, the minimum order is Rs 10.
								 </div>
							</div>
					 </div>

					 <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<div class="row">
								 <div class="service-time three" style="background:#0060b1;">
										<span class="info-icon"><i class="fa fa-hospital-o" aria-hidden="true"></i></span>
										<h3>Support</h3>
										<p>The delivery of medicines to other cities will be dispacthed within
24 hours and delivered under 72 hours.

24X7 delivery of contraceptive and sanitary napkins,<br>


</p>
								 </div>
							</div>
					 </div>
				</div>
		 </div>


		 <div id="service" class="services wow fadeIn">
				<div class="container">
					 <div class="row">
						 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<div class="appointment-form">


					<h3 align="center">Order Now </h3>
		<div class="form">
				<?php print_r($message); ?>

				<form method="post" enctype="multipart/form-data">
		<fieldset>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Enter Name</label>
								<input type="text" name="name" placeholder="Enter Name" class="form-control" required />
							</div>

							<div class="form-group">
								<label>Enter Address</label>
								<textarea name="address" placeholder="Enter Address" class="form-control" required></textarea>
							</div>
							<div class="form-group">
								<label>Enter Email </label>
								<input type="email" name="email" class="form-control" placeholder="Enter Email Address" required />
							</div>


						</div>
						<div class="col-md-6">
							<div class="form-group">

							</div>
							<div class="form-group">
								<label>Enter Mobile Number</label>
								<input type="text" name="mobile" placeholder="Enter Mobile Number" class="form-control" pattern="\d*" required />
							</div>
							<div class="form-group">
								<label>Upload your prescription</label>
								<input type="file" name="resume" accept=".jpg,.jpeg,.doc,.docx, .pdf" required />
							</div>
							<div class="form-group">
								<label>Enter Additional Information</label>
								<textarea name="additional_information" placeholder="Enter Additional Information" class="form-control" required rows="8"></textarea>
							</div>
						</div>
					</div>
					<div class="form-group" align="center">
						<input type="submit" name="submit" value="Submit" class="btn btn-info" />
					</div>
			<p> If you don't have prescription you can order through Whatsapp</P>
				</div>

			</div>
		</fieldset>
			</form>
		</div>



			<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
				 <div class="inner-services">

										 <div class="myDiv">
											<h2>You CAN PAY THROUGH UPI</h2>
											<p>apnidawaa@upi</p>
               click here<a href="upi://pay?pa=apnidawaa@upi" data-scroll="" class="btn btn-light btn-radius btn-brd grd1 effect-1">Pay through paytm</a>
										</div>

						<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
							 <div class="serv">
									<span class="icon-service"><img src="images/service-icon1.png" alt="#" /></span>
									<h4>FACE MASK</h4>
									<p>Here we provide all type, when it comes to buying a premade, nonmedical face mask, </p>
							 </div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
							 <div class="serv">
									<span class="icon-service"><img src="images/service-icon2.png" alt="#" /></span>
									<h4>MEDICATION</h4>
									<p>Once you place an order, you will get your medicine delivered, right on time.</p>
							 </div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
							 <div class="serv">
									<span class="icon-service"><img src="images/service-icon3.png" alt="#" /></span>
									<h4>EASY UPLOAD PRESCRIPTION</h4>
									<p>You can easily upload the prescription on the website and pharmacist can preview it and tells the medicine.</p>
							 </div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
							 <div class="serv">
									<span class="icon-service"><img src="images/service-icon4.png" alt="#" /></span>
									<h4>CHILD CARE</h4>
									<p>Online shopping for Health & Personal Care from a great selection of Thermometers, Medical Kits, Mosquito Repellent, Scales & more .</p>
							 </div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
							 <div class="serv">
									<span class="icon-service"><img src="images/service-icon5.png" alt="#" /></span>
									<h4>MEDICINES DELIVERY</h4>
									<p>Enrich high featured medicine ordering website with user friendly characteristic</p>
							 </div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
							 <div class="serv">
									<span class="icon-service"><img src="images/service-icon6.png" alt="#" /></span>
									<h4>PAYMENT</h4>
									<p>you can pay via UPI, or other transaction mode which provide link in your sms or Whatsapp </p>
							 </div>
						</div>
				 </div>
			</div>
		</div>
		</div>
		</div>












		 <div id="about" class="section wow fadeIn">
				<div class="container">
					 <div class="heading">
							<span class="icon-logo"><img src="images/icon-logo.png" alt="#"></span>
							<h2>About Us</h2>
					 </div>
					 <!-- end title -->
					 <div class="row">
							<div class="col-md-6">
								 <div class="message-box">
										<h4>What We Do</h4>
										<h2>Online Medicine Delivery Service</h2>
										<p class="lead">Apni Dawaa is an online medicine delivery website, which  allows you to buy healthcare products, OTC products and medical equipment online. With website, from the convenience of your home.

</p>
										<p> Our partner retailer will call you to confirm the healthcare products you need along with their quantities . </p>


										<div class="columns download">
          <p>
             	<a href="images/Apnidawaaprivacypolicy.pdf" data-scroll class="btn btn-light btn-radius btn-brd grd1 effect-1">Terms and Conditions</a>
          </p>
       </div>

								 </div>
								 <!-- end messagebox -->
							</div>
							<!-- end col -->
							<div class="col-md-6">
								 <div class="post-media wow fadeIn">
										<img src="images/about_03.jpg" alt="" class="img-responsive">
										<a href="http://www./watch?v=nrJtHemSPW4" data-rel="prettyPhoto[gal]" class="playbutton"><i class="flaticon-play-button"></i></a>
								 </div>
								 <!-- end media -->
							</div>
							<!-- end col -->
					 </div>
					 <!-- end row -->
					 <hr class="hr1">
					 <div class="row">
							<div class="col-md-3 col-sm-6 col-xs-12">
								 <div class="service-widget">
										<div class="post-media wow fadeIn">
											 <a href="images/clinic_01.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
											 <img src="images/clinic_01.jpg" alt="" class="img-responsive">
										</div>
										<h3> Allopathy</h3>
								 </div>
								 <!-- end service -->
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								 <div class="service-widget">
										<div class="post-media wow fadeIn">
											 <a href="images/clinic_02.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
											 <img src="images/clinic_02.jpg" alt="" class="img-responsive">
										</div>
										<h3>Homeopathy</h3>
								 </div>
								 <!-- end service -->
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								 <div class="service-widget">
										<div class="post-media wow fadeIn">
											 <a href="images/clinic_03.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
											 <img src="images/clinic_03.jpg" alt="" class="img-responsive">
										</div>
										<h3>Ayurvedic </h3>
								 </div>
								 <!-- end service -->
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								 <div class="service-widget">
										<div class="post-media wow fadeIn">
											 <a href="images/clinic_04.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
											 <img src="images/clinic_04.jpg" alt="" class="img-responsive">
										</div>
										<h3>Surgical Items</h3>
								 </div>
								 <!-- end service -->
							</div>
					 </div>
					 <!-- end row -->
				</div>
				<!-- end container -->
		 </div>



      <!-- end section -->

	  <!-- doctor -->



		  <div id="price" class="section pr wow fadeIn" style="background-image:url('images/price-bg.png');">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="tab-content">
                     <div class="tab-pane active fade in" id="tab1">
                        <div class="row text-center">
                           <div class="col-md-4">
														 <div class="pricing-table pricing-table-highlighted">
 															 <div class="pricing-table-header grd1">
                                   <h2>Ayurveda</h2>

																	 <div class="pricing-table-space"></div>



                                 </div>
																 The ongoing demand of our customer’s belief.  brand new companies with their customized products. Apart from this there are many other ayurved medicines

                                 <div class="pricing-table-sign-up">
                                    <a href="upi://pay?pa=apnidawaa@upi" data-scroll="" class="btn btn-dark btn-radius btn-brd">Order Now</a>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="pricing-table pricing-table-highlighted">
                                 <div class="pricing-table-header grd1">
                                   <h2>Allopathy</h2>
															</div>
                                 <div class="pricing-table-space"></div>

																 We provide Allopathy medicines which is a Leading &amp; trusted name among all pharma companies. We would like to introduce ourselves as a marketing company with wide range of Syrups, Capsules, Tablets, injections, Ointments and many more.</p>

                                 <div class="pricing-table-sign-up">
                                    <a href="upi://pay?pa=apnidawaa@upi" data-scroll="" class="btn btn-light btn-radius btn-brd grd1 effect-1">Order Now</a>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
														 <div class="pricing-table pricing-table-highlighted">
																<div class="pricing-table-header grd1">
                                   <h2>Homeopathy</h2>
																 </div>

																<div class="pricing-table-space"></div>
																		<p> We provide wide range of homeopathic medicines from high involvement and total belief in the efficacy of homeopathy</p>
                                 <div class="pricing-table-sign-up">
                                    <a href="upi://pay?pa=apnidawaa@upi" data-scroll="" class="btn btn-dark btn-radius btn-brd">Order Now</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end row -->
                     </div>
                     <!-- end pane -->
                     <div class="tab-pane fade" id="tab2">
                        <div class="row text-center">s</div>
                        <!-- end row -->
                     </div>
                     <!-- end pane -->
                  </div>
                  <!-- end content -->
               </div>
               <!-- end col -->
            </div>
         </div>
      </div>


	  <!-- end doctor section -->


      <!-- end section -->
      <div id="getintouch" class="section wb wow fadeIn" style="padding-bottom:0;">
         <div class="container">
            <div class="heading">
               <span class="icon-logo"><img src="images/icon-logo.png" alt="#"></span>
               <h2>Get in Touch</h2>
            </div>
         </div>
         <div class="contact-section">
            <div class="form-contant">
               <form id="ajax-contact" action="https://formspree.io/xknqznzr" method="post">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group in_name">
                           <input type="text" class="form-control" name="name" placeholder="Name" required="required">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group in_email">
                           <input type="email" class="form-control" name="email" placeholder="E-mail" required="required">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group in_email">
                           <input type="tel" class="form-control" id="phone" name="number" placeholder="Phone" required="required">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group in_email">
                           <input type="text" class="form-control" id="subject" name="Subject"placeholder="Subject" required="required">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group in_message">
                           <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required"></textarea>
                        </div>
                        <div class="actions">
                           <input type="submit" value="Send Message" name="submit" id="submitButton" class="btn small" title="Submit Your Message!">
                        </div>
                     </div>
                  </div>
               </form>
            </div>

     <div class="contactus">


 <img src="images/contactus.png" ALIGN="right" width="770px" height="530px"/>
     </div>
         </div>
      </div>
      <footer id="footer" class="footer-area wow fadeIn">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="logo padding">
                     <a href=""><img src="images/logo.png" alt=""></a>
                     <p>Buy medicines online from India's favorite medicine delivery service. Buy prescription medicines, OTC products & household needs. Cash on delivery. Home delivery.</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="footer-info padding">
                     <h3>CONTACT US</h3>
                     <p><i class="fa fa-map-marker" aria-hidden="true"></i> varanasi, india </p>
                     <p><i class="fa fa-paper-plane" aria-hidden="true"></i> apnidawaa19@gmail.com </p>
                     <p  class="fa fa-phone" aria-hidden="true"> <a  href="tel:+917839226481">+917839226481</a></p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="subcriber-info">
                     <h3>SUBSCRIBE</h3>
                     <p>Get healthy news, tip and solutions to your problems from our experts.</p>
                     <div class="subcriber-box">
                        <form id="mc-form" class="mc-form">
                           <div class="newsletter-form">
                              <input type="email" autocomplete="off" id="mc-email" placeholder="Email address" class="form-control" name="EMAIL">
                              <button class="mc-submit" type="submit"><i class="fa fa-paper-plane"></i></button>
                              <div class="clearfix"></div>
                              <!-- mailchimp-alerts Start -->

                              <!-- mailchimp-alerts end -->
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <div class="copyright-area wow fadeIn">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <div class="footer-text">
                     <p>© 2020 Apni dawaa. All Rights Reserved.</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="social">
                     <ul class="social-links">

                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/apnidawaa?s=08"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.linkedin.com/in/apnidawaa-internet-a628b31b0"><i class="fa fa-linkedin"></i></a></li>

                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end copyrights -->
      <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
<script async data-id="49113" src="https://cdn.widgetwhats.com/script.min.js"></script>
      <!-- all js files -->
      <script src="js/all.js"></script>
      <!-- all plugins -->
      <script src="js/custom.js"></script>
      <!-- map -->

      <script  src="js/script.js"></script>

   </body>
</html>
