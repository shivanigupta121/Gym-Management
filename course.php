<?php
session_start();
error_reporting(0);
include 'include/config.php';
$uid = $_SESSION['uid'];

if (isset($_POST['submit'])) {
  $pid = $_POST['pid'];
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
  <!-- Page top Section -->
  <section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 m-auto text-white">
          <h2>All Package Details</h2>
          <p>Explore the details of the package.</p>
        </div>
      </div>
    </div>
  </section>

  <div class="container">
    <div class="row">
      <div class="col-lg-8 m-auto">
        <div class="package-list">
          <?php
          // Fetch all packages from the database
          $sql = "SELECT titlename, Description, uploadphoto FROM tbladdpackage";
          $query = $dbh->prepare($sql);
          $query->execute();
          $packages = $query->fetchAll();
          foreach ($packages as $package) {
            ?>
            <div class="package-item">
              <div class="row">
                <div class="col-md-6">
                  <div class="package-image">

                    <img src="uploads/<?php echo $package['uploadphoto']; ?>" alt="Package Photo">
                  </div>

                </div>
                <div class="col-md-6">
                  <h3>
                    <?php echo $package['titlename']; ?>
                  </h3>
                  <p>
                    <?php echo $package['Description']; ?>
                  </p>
                </div>
              </div>
              <div>
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

              <style>
                .facilities-grid {
                  display: grid;
                  grid-template-columns: repeat(3, 1fr);
                  /* Adjust the number of columns as needed */
                  gap: 20px;
                  /* Adjust the gap between items as needed */
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
          }
          ?>
        </div>
      </div>
    </div>
  </div>

</body>

</html>