<?php
// Header File
include("includes/header.php");
?>

<?php
//Checking if the login cookie is set
if (!isset($_COOKIE["user_email"])) {
  header("Location: login.php");
} else {
  $user_email = $_COOKIE["user_email"];
  $query = "SELECT * FROM users WHERE user_email = '{$user_email}' ";
  $select_user_query = mysqli_query($connection, $query);

  if (!$select_user_query) {
    die("QUERY FAILED" . mysqli_error($connection));
  }

  while ($row = mysqli_fetch_array($select_user_query)) {
    $username = $row['username'];
  }
}


// Including Navigation Menu
include("includes/navigation.php");
?>

<!--start content-->
<!-- <main class="page-content"> -->
  <div class="card ">
    <div class="card-body">
      <div class="d-flex align-items-center">
        <h5 class="mb-4">Applicances</h5>
      </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
        <div class="col-lg-6">
          <div class="card radius-10 border-0 border-start border-tiffany border-3">
            <div class="card-body">
              <a href="appliances.php?source=bulbs">
                <div class="d-flex align-items-center">
                  <div class="">
                    <?php
                    ?>
                    <p class="mb-1 text-black">Bulbs</p>
                    <div style="display: flex;">
                      <!-- <p class="mb-1 text-black" style="font-weight: bold;">Speed:&nbsp;</p> -->
                      <p class="mb-1 text-black" id=""></p>
                    </div>
                  </div>
                  <div class="ms-auto widget-icon bg-tiffany text-white">
                    <i class="bi bi-lightbulb"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card radius-10 border-0 border-start border-success border-3">
            <div class="card-body">
              <a href="appliances.php?source=fans">
                <div class="d-flex align-items-center">
                  <div class="">
                    <?php
                    ?>
                    <p class="mb-1 text-black">Fan Control</p>
                    <div style="display: flex;">
                      <!-- <p class="mb-1 text-black" style="font-weight: bold;">Speed:&nbsp;</p> -->
                      <p class="mb-1 text-black" id=""></p>
                    </div>
                  </div>
                  <div class="ms-auto widget-icon bg-success text-white">
                    <i class="bx bx-health"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card radius-10 border-0 border-start border-info border-3">
            <div class="card-body">
              <a href="appliances.php?source=water">
                <div class="d-flex align-items-center">
                  <div class="">
                    <?php
                    ?>
                    <p class="mb-1 text-black">Water Control</p>
                    <div style="display: flex;">
                      <!-- <p class="mb-1 text-black" style="font-weight: bold;">Speed:&nbsp;</p> -->
                      <p class="mb-1 text-black" id=""></p>
                    </div>
                  </div>
                  <div class="ms-auto widget-icon bg-info text-white">
                  <i class="bx bx-vial"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- </main> -->


<?php
// Footer File
include("includes/footer.php");
?>