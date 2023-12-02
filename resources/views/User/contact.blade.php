<!doctype html>
<html class="no-js" lang="">

<head>
	
</head>
<body>

	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Header Start
		*************************************-->
		@include('User/header')
		</header>
		<!--************************************
				Header End
		*************************************-->
		<!--************************************
				Inner Banner Start
		*************************************-->
		<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-07.jpg">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-innerbannercontent">
							<h1>Contact Us</h1>
							<ol class="tg-breadcrumb">
								<li><a href="books">home</a></li>
								<li class="tg-active">Contact Us</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Inner Banner End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					Contact Us Start
			*************************************-->
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-contactus">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div  class="tg-locationmap tg-map"  style="height: 500px">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.355301669005!2d106.640371274856!3d10.707054389437568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752e1d10fd3fdb%3A0xe58cfc38a9c11231!2zVGhlIE1hbnNpb24sIFBob25nIFBow7osIELDrG5oIENow6FuaCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oIDcwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1700991916817!5m2!1svi!2s" 
                                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<form class="tg-formtheme tg-formcontactus">
									<fieldset>
										<div class="form-group">
											<input type="text" name="first-name" class="form-control" placeholder="First Name*">
										</div>
										<div class="form-group">
											<input type="text" name="last-name" class="form-control" placeholder="Last Name*">
										</div>
										<div class="form-group">
											<input type="email" name="email" class="form-control" placeholder="Email*">
										</div>
										<div class="form-group">
											<input type="text" name="subject" class="form-control" placeholder="Subject (optional)">
										</div>
										<div class="form-group tg-hastextarea">
											<textarea placeholder="Comment"></textarea>
										</div>
										<div class="form-group">
											<button type="submit" class="tg-btn tg-active">Submit</button>
										</div>
									</fieldset>
								</form>
								<div class="tg-contactdetail">
									<div class="tg-sectionhead">
										<h2>Get In Touch With Us</h2>
									</div>
									<ul class="tg-contactinfo">
                                        <li>
                                            <i class="icon-apartment"></i>
                                            <address>Street 7, Phong Phu Commune, Binh Chanh District, Ho Chi Minh City</address>
                                        </li>
                                        <li>
                                            <i class="icon-phone-handset"></i>
                                            <span>
                                                <em>0394114948</em>
                                                <em>+84 394114948</em>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="icon-clock"></i>
                                            <span>Serving 7 Days A Week From 9am - 5pm</span>
                                        </li>
                                        <li>
                                            <i class="icon-envelope"></i>
                                            <span>
                                                <em><a href="mailto:laimh1221@gmail.com">laimh1221@gmail.com</a></em>
                                                <em><a href="mailto:dh51900917@student.stu.edu.vn">dh51900917@student.stu.edu.vn</a></em>
                                            </span>
                                        </li>
                                    </ul>
									<ul class="tg-socialicons">
										<li class="tg-facebook"><a href="https://www.facebook.com/profile.php?id=100042012109180"><i class="fa fa-facebook"></i></a></li>
										<li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
										<li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
										<li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
										<li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--************************************
					Contact Us End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->
		@include('User/footer')
</body>

</html>