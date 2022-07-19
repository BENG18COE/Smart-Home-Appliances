<?php
// Updating values for water valve
if (isset($_POST['waterValveBtn'])) {
    if ($waterValveBtn == 1) {
        $query = "UPDATE users SET waterValve_status = 0 WHERE user_email = '{$user_email}'";
        $update_waterValve_query = mysqli_query($connection, $query);

        if (!$update_waterValve_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    } else {
        $query = "UPDATE users SET waterValve_status = 1 WHERE user_email = '{$user_email}'";
        $update_waterValve_query = mysqli_query($connection, $query);

        if (!$update_waterValve_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    }
    header('Location:' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
    die;
}

// Updating Status for water Pump
if (isset($_POST['waterPumpBtn'])) {
    if ($waterPumpBtn == 1) {
        $query = "UPDATE users SET waterPump_status = 0 WHERE user_email = '{$user_email}'";
        $update_waterValve_query = mysqli_query($connection, $query);

        if (!$update_waterValve_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    } else {
        $query = "UPDATE users SET waterPump_status = 1 WHERE user_email = '{$user_email}'";
        $update_waterValve_query = mysqli_query($connection, $query);

        if (!$update_waterValve_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    }
    header('Location:' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
    die;
}
?>

<!--start content-->
<!-- <main class="page-content"> -->
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-4">Water Control</h5>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
                <!-- Water Pump card -->
                <div class="col-lg-6">
                    <div class="card radius-10 border-0 border-start border-purple border-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <?php
                                    $query = "SELECT waterPump_status FROM users WHERE user_email = '{$user_email}'";
                                    $result = mysqli_query($connection, $query);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $waterPump_status = (int) $row["waterPump_status"];
                                        if ($waterPump_status == 1) {
                                            $waterPump_status = "Working";
                                            $waterPump_status2 = "Override";
                                        } else {
                                            $waterPump_status = "Overrode";
                                            $waterPump_status2 = "Allow";
                                        }
                                    }
                                    ?>
                                    <p class="mb-1 text-black">Water Pump</p>
                                    <div style="display: flex;">
                                        <p class="mb-1 text-black" style="font-weight: bold;">Status:&nbsp;</p>
                                        <p class="mb-1 text-black"><?php echo $waterPump_status; ?></p>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <form action="" method="POST">
                                            <button id="waterPumpBtn" class="btn btn-primary" name="waterPumpBtn"><?php echo $waterPump_status2; ?></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="ms-auto widget-icon bg-purple text-white">
                                    <i class="bx bx-gas-pump"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Water Valve Card -->
                <div class="col-lg-6">
                    <div class="card radius-10 border-0 border-start border-info border-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <?php
                                    $query = "SELECT waterValve_status FROM users WHERE user_email = '{$user_email}'";
                                    $result = mysqli_query($connection, $query);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $waterValve_status = (int) $row["waterValve_status"];
                                        if ($waterValve_status == 1) {
                                            $waterValve_status = "Turned On";
                                        } else {
                                            $waterValve_status = "Turned Off";
                                        }
                                    }
                                    ?>
                                    <p class="mb-1 text-black">Water Valve</p>
                                    <div style="display: flex;">
                                        <p class="mb-1 text-black" style="font-weight: bold;">Status:&nbsp;</p>
                                        <p class="mb-1 text-black"><?php echo $waterValve_status; ?></p>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <form action="" method="POST">
                                            <button id="waterValveBtn" class="btn btn-primary" name="waterValveBtn"><?php echo $waterValve_status; ?></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="ms-auto widget-icon bg-info text-white">
                                    <i class="bx bx-vial"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Water Usage -->
                <div class="col-lg-6">
                    <div class="card radius-10 border-0 border-start border-tiffany border-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <?php
                                    date_default_timezone_set('Africa/Nairobi');
                                    $today_date = date("Y-m-d");

                                    $query = "SELECT water_usage FROM water_usage WHERE user_email = '{$user_email}' AND date = '{$today_date}'";
                                    $select_water_usage = mysqli_query($connection, $query);

                                    while ($row = mysqli_fetch_assoc($select_water_usage)) {
                                        $today_water_usage = (int) $row["water_usage"];
                                    }

                                    if($today_water_usage == "") {
                                        $today_water_usage = 0;
                                    }
                                    ?>
                                    <p class="mb-1 text-black">Water Usage</p>
                                    <div style="display: flex;">
                                        <p class="mb-1 text-black" style="font-weight: bold;">Today:&nbsp;</p>
                                        <p class="mb-1 text-black"><?php echo $today_water_usage; ?>&nbsp Litres</p>
                                    </div>
                                </div>
                                <div class="ms-auto widget-icon bg-tiffany text-white">
                                    <i class="bx bx-gas-pump"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- </main> -->

<script>
  const waterValveBtn = document.getElementById("waterValveBtn");
  var waterValveBtnText = waterValveBtn.innerHTML;

  if (waterValveBtnText == "Turned On") {
    waterValveBtn.innerHTML = "Turn Off";
    waterValveBtn.classList.remove('btn', 'btn-primary');
    waterValveBtn.classList.add('btn', 'btn-danger');
  } else {
    waterValveBtn.innerHTML = "Turn On";
    waterValveBtn.classList.remove('btn', 'btn-danger');
    waterValveBtn.classList.add('btn', 'btn-primary');
  }

  const waterPumpBtn = document.getElementById("waterPumpBtn");
  var waterPumpBtnText = waterPumpBtn.innerHTML;

  if (waterPumpBtnText == "Allow") {
    waterPumpBtn.innerHTML = "Allow";
    waterPumpBtn.classList.remove('btn', 'btn-danger');
    waterPumpBtn.classList.add('btn', 'btn-primary');
  } else {
    waterPumpBtn.innerHTML = "Override";
    waterPumpBtn.classList.remove('btn', 'btn-primary');
    waterPumpBtn.classList.add('btn', 'btn-danger');
  }
</script>