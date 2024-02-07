<?php
session_start();
error_reporting(0);
include 'include/config.php';
$uid = $_SESSION['uid'];

if (isset($_POST['submit'])) {
	$pid = $_POST['pid'];


	$sql = "INSERT INTO tblbooking (package_id,userid) Values(:pid,:uid)";

	$query = $dbh->prepare($sql);
	$query->bindParam(':pid', $pid, PDO::PARAM_STR);
	$query->bindParam(':uid', $uid, PDO::PARAM_STR);
	$query->execute();
	echo "<script>alert('Package has been booked.');</script>";
	echo "<script>window.location.href='booking-history.php'</script>";

}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Maxxfit Gym</title>
	<meta charset="UTF-8">
	<meta name="description" content="Ahana Yoga HTML Template">
	<meta name="keywords" content="yoga, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/owl.carousel.min.css" />
	<link rel="stylesheet" href="css/nice-select.css" />
	<link rel="stylesheet" href="css/magnific-popup.css" />
	<link rel="stylesheet" href="css/slicknav.min.css" />
	<link rel="stylesheet" href="css/animate.css" />

	<!-- Include the Slick Carousel library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css" />

</head>

<body>
	<!-- Page Preloder -->


	<!-- Header Section -->
	<?php include 'include/header.php'; ?>
	<!-- Header Section end -->




	<!-- Page top Section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 m-auto text-white">
					<h2>Home</h2>
					<p>Physical Activity Or Can Improve Your Health</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Gym Images Section -->
	<section class="gym-images-section">
		<div class="container-img">
			<div class="row-img">
				<div class="col-lg-12">
					<div class="gym-images-carousel">

						<div class="slick-carousel">
							<div class="slick-slide"><img src="img/1.jpg" alt="Gym Image" width="700" height="400">
							</div>
							<div class="slick-slide"><img src="img/2.jpg" alt="Gym Image" width="700" height="400">
							</div>
							<div class="slick-slide"><img src="img/3.jpg" alt="Gym Image" width="700" height="400">
							</div>
							<div class="slick-slide"><img src="img/4.jpg" alt="Gym Image" width="700" height="400">
							</div>
							<div class="slick-slide"><img src="img/5.jpg" alt="Gym Image" width="700" height="400">
							</div>
							<div class="slick-slide"><img src="img/6.jpg" alt="Gym Image" width="700" height="400">
							</div>
							<div class="slick-slide"><img src="img/7.jpg" alt="Gym Image" width="700" height="400">
							</div>
							<div class="slick-slide"><img src="img/8.jpg" alt="Gym Image" width="700" height="400">
							</div>
						</div>



						<div class="slick-arrows">
							<button class="slick-prev"><i class="fa fa-angle-left"></i></button>
							<button class="slick-next"><i class="fa fa-angle-right"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<style>
		.slick-slide {
			padding: 10px;
			/* Adjust the padding value to your desired spacing */
		}

		.gym-images-carousel .slick-arrows {
			position: absolute;
			top: 50%;
			transform: translateY(-50%);
			width: 100%;
			text-align: center;

		}

		.gym-images-carousel .slick-prev {
			left: 0;
			margin-left: -20px;
		}

		.gym-images-carousel .slick-next {
			right: 0;
			margin-right: -20px;
		}

		.gym-images-carousel .slick-prev,
		.gym-images-carousel .slick-next {
			display: inline-block;
			width: 40px;
			height: 40px;
			background-color: #fff;
			border-radius: 50%;
			border: none;
			color: #000;
			font-size: 24px;
			line-height: 40px;
			cursor: pointer;
			transition: background-color 0.3s, color 0.3s;
		}

		.gym-images-carousel .slick-prev:hover,
		.gym-images-carousel .slick-next:hover {
			background-color: orange;
			color: #fff;
		}

		.container-img {
			background-color: #FA8072;

		}
	</style>







	<!-- Pricing Section -->
	<section class="pricing-section spad">
		<div class="container">
			<div class="section-title text-center">
				<img src="img/icons/logo-icon.png" alt="">
				<h2>Pricing plans</h2>
				<p>Practice Yoga to perfect physical beauty, take care of your soul and enjoy life more fully!</p>
			</div>
			<div class="row">
				<?php
				$sql = "SELECT id, category, titlename, PackageType, PackageDuratiobn, Price, uploadphoto, Description, create_date FROM tbladdpackage";
				$query = $dbh->prepare($sql);
				$query->execute();
				$results = $query->fetchAll(PDO::FETCH_OBJ);
				$cnt = 1;
				if ($query->rowCount() > 0) {
					foreach ($results as $result) {
						?>
						<div class="col-lg-3 col-sm-6">
							<div class="pricing-item begginer">
								<div class="pi-top">
									<h4>
										<?php echo $result->titlename; ?>
									</h4>
								</div>
								<div class="pi-price">
									<h3>
										<?php echo htmlentities($result->Price); ?>
									</h3>
									<p>
										<?php echo $result->PackageDuratiobn; ?>
									</p>
								</div>
								<!-- <ul>
									<?php //echo $result->Description; ?>
								</ul> -->
								<a href="package-details.php?id=<?php echo $result->id; ?>"
									class="site-btn sb-line-gradient">Details</a>
								<br>
								<br>
								<?php if (strlen($_SESSION['uid']) == 0): ?>
									<a href="login.php" class="site-btn sb-line-gradient">Booking Now</a>
								<?php else: ?>
									<!-- <a href="#" class="site-btn sb-line-gradient">Booking Now</a> -->
									<form method="post">
										<input type="hidden" name="pid" value="<?php echo htmlentities($result->id); ?>">
										<input class="site-btn sb-line-gradient" type="submit" name="submit" value="Booking Now"
											onclick="return confirm('Do you really want to book this package.');">
									</form>
								<?php endif; ?>
							</div>
						</div>
						<?php $cnt = $cnt + 1;
					}
				} ?>
			</div>
		</div>
	</section>



	<!-- Footer Section -->
	<?php include 'include/footer.php'; ?>
	<!-- Footer Section end -->

	<div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>

	<!-- Search model end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

	<!-- Initialize the carousel -->
	<script>
		$(document).ready(function () {
			$('.slick-carousel').slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 2000,
				prevArrow: $('.slick-prev'),
				nextArrow: $('.slick-next')
			});
		});
	</script>
</body>

</html>