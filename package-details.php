<?php 
session_start();
error_reporting(0);
include 'include/config.php';
$uid=$_SESSION['uid'];

if(isset($_POST['submit']))
{ 
$pid=$_POST['pid'];


$sql="INSERT INTO tblbooking (package_id,userid) Values(:pid,:uid)";

$query = $dbh -> prepare($sql);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query -> execute();
echo "<script>alert('Package has been booked.');</script>";
echo "<script>window.location.href='booking-history.php'</script>";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Package Details</title>
  <meta charset="UTF-8">
  <meta name="description" content="Ahana Yoga HTML Template">
  <meta name="keywords" content="yoga, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/font-awesome.min.css"/>
  <link rel="stylesheet" href="css/owl.carousel.min.css"/>
  <link rel="stylesheet" href="css/nice-select.css"/>
  <link rel="stylesheet" href="css/magnific-popup.css"/>
  <link rel="stylesheet" href="css/slicknav.min.css"/>
  <link rel="stylesheet" href="css/animate.css"/>

  <!-- Main Stylesheets -->
  <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
  <!-- Page Preloder -->


  <!-- Header Section -->
  <?php include 'include/header.php';?>
  <!-- Header Section end -->


  <!-- Page top Section -->
  <section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 m-auto text-white">
          <h2>Package Details</h2>
          <p>Explore the details of the package.</p>
        </div>
      </div>
    </div>
  </section>


  <!-- Package Details Section -->
  <section class="package-details-section spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title text-center">
            <h2>Package Details</h2>
          </div>
          <div class="package-details">
  <?php
  // Retrieve the package details using the package ID
  if (isset($_GET['id'])) {
    $packageId = $_GET['id']; // Assuming the package ID is passed in the URL parameter 'id'
    $sql = "SELECT id, category, titlename, PackageType, PackageDuratiobn, Price, uploadphoto, Description, create_date FROM tbladdpackage WHERE id = :packageId";
    $query = $dbh->prepare($sql);
    $query->bindParam(':packageId', $packageId, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
  ?>
      <div class="pricing-item begginer">
        <div class="pi-top">
          <h4><?php echo $result->titlename; ?></h4>
        </div>
        <div class="pi-price">
          <h3><?php echo htmlentities($result->Price); ?></h3>
          <p><?php echo $result->PackageDuratiobn; ?></p>
        </div>
        <ul>
          <?php echo $result->Description; ?>
        </ul>
        <div class="package-photo">
          <img src="<?php echo $result->uploadphoto; ?>" alt="Package Photo">
        </div>
      </div>
      <div>        <ul class="facilities-grid">
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
</div>

                
            <?php
              } else {
                echo "No package found.";
              }
            } else {
              echo "Invalid package ID.";
            }
            ?>
          </div>
        </div>
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
</body>
</html>
