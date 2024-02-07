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
					<h2>About Maxxfit Gym</h2>
				</div>
			</div>
		</div>
	</section>
<!-- Pricing Section -->
<section class="pricing-section spad">
  <div class="container">
    <div class="section-title text-center">
      <img src="img/icons/logo-icon.png" alt="">
      <h2>About Us</h2>
    </div>
    <div class="row">
      <div class="col-lg-12 col-sm-6">
        <h4>MaxxFit Gym System is a comprehensive software solution designed specifically for gym and fitness
          center management. It offers a range of features and functionalities to streamline the operations, enhance
          member experience, and optimize business performance.</h4>
        <p>The main objective of 'About Fitness' is to create awareness and to coordinate the performance of body,
          mind, and soul in a befitting manner. We are the winner; we don't do different things, we do things
          differently. Our goal is to be sensitive to our members' needs and to fulfill their fitness requirements.
          We ensure physical fitness and robust health to customers as we counsel, assist, and motivate them to lead a
          joyous and meaningful life. Results are bound to be positive as we put in our 200% to fulfill your needs.</p>
        <h3>Our Vision</h3>
        <p>Our vision is to maintain the standards of our fitness center for our members' well-being. Our members
          will have a sound body, and it will be maintained well when complemented by a health foods bar to nourish
          the body's daily fiber and vitamin requirements.</p>
        <h3>Facilities</h3>
		<br>
		<hr>
		<br>
        <ul class="facilities-grid">
          <li>
            <img src="img/cardio.png" alt="Cardio Center">
            <p>Cardio Center</p>
          </li>
          <li>
            <img src="img/strength.png" alt="Strength Training">
            <p>Strength Training</p>
          </li>
          <li>
            <img src="img/aerobics.png" alt="Aerobics">
            <p>Aerobics</p>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<style>
.facilities-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr); /* Adjust the number of columns as needed */
  gap: 20px; /* Adjust the gap between items as needed */
}

.facilities-grid li {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}
</style>



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

</body>

</html>