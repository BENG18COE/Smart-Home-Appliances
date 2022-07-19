<?php
// Updating values for bulb 1
if (isset($_POST['bulb1Btn']))      // If press ON
{
    if ($bulb1_status == 1) {
        $query = "UPDATE users SET bulb1_status = 0 WHERE user_email = '{$user_email}'";
        $update_bulb1_query = mysqli_query($connection, $query);

        if (!$update_bulb1_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    } else {
        $query = "UPDATE users SET bulb1_status = 1 WHERE user_email = '{$user_email}'";
        $update_bulb1_query = mysqli_query($connection, $query);

        if (!$update_bulb1_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    }
    header('Location:' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
    die;
}


// Updating values for bulb 2
if (isset($_POST['bulb2Btn']))      // If press ON
{
    if ($bulb2_status == 1) {
        $query = "UPDATE users SET bulb2_status = 0 WHERE user_email = '{$user_email}'";
        $update_bulb2_query = mysqli_query($connection, $query);

        if (!$update_bulb2_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    } else {
        $query = "UPDATE users SET bulb2_status = 1 WHERE user_email = '{$user_email}'";
        $update_bulb2_query = mysqli_query($connection, $query);

        if (!$update_bulb2_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    }
    header('Location:' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
    die;
}



if (isset($_POST['bulb1State']))      // If press ON
{
    if ($bulb1_state == 1) {
        $query = "UPDATE users SET bulb1_state = 2 WHERE user_email = '{$user_email}'";
        $update_bulb2_query = mysqli_query($connection, $query);

        if (!$update_bulb2_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    } else {
        $query = "UPDATE users SET bulb1_state = 1 WHERE user_email = '{$user_email}'";
        $update_bulb2_query = mysqli_query($connection, $query);

        if (!$update_bulb2_query) {
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
            <h5 class="mb-4">Bulbs Control</h5>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
            <div class="col-lg-6">
                <div class="card radius-10 border-0 border-start border-tiffany border-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <?php
                                $query = "SELECT bulb1_status from users WHERE user_email = '{$user_email}'";
                                $result = mysqli_query($connection, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $bulb1_status = (int) $row["bulb1_status"];

                                    if ($bulb1_status == 1) {
                                        $bulb1_status = "On";
                                    } else {
                                        $bulb1_status = "Off";
                                    }

                                    if ($bulb1_state == 1) {
                                        $bulb1_state = "Low Light";
                                    } else {
                                        $bulb1_state = "High Light";
                                    }
                                }
                                ?>
                                <p class="mb-1 text-black">Bulb 1</p>
                                <div style="display: flex;">
                                    <p class="mb-1 text-black" style="font-weight: bold;">Status:&nbsp;</p>
                                    <p class="mb-1 text-black"><?php echo $bulb1_status; ?></p>
                                </div>
                                <div class="custom-control custom-switch mb-4">
                                    <form id="bulbForm" action="" method="POST">
                                        <button id="bulb1Btn" class="btn btn-primary" name="bulb1Btn"><?php echo $bulb1_status; ?></button>
                                    </form>
                                </div>
                                <div style="display: flex;">
                                    <p class="mb-1 text-black" style="font-weight: bold;">Amount:&nbsp;</p>
                                    <p class="mb-1 text-black"><?php echo $bulb1_state; ?></p>
                                </div>
                                <div class="custom-control custom-switch">
                                    <form action="" method="POST">
                                        <button id="bulb1State" class="btn btn-primary" name="bulb1State"><?php echo $bulb1_state; ?></button>
                                    </form>
                                </div>
                            </div>
                            <div class="shadow p-3 ms-auto widget-icon bg-tiffany text-white">
                                <i class="bi bi-lightbulb"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card radius-10 border-0 border-start border-success border-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <?php
                                $query = "SELECT bulb2_status FROM users WHERE user_email = '{$user_email}'";
                                $result = mysqli_query($connection, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $bulb2_status = (int) $row["bulb2_status"];
                                    if ($bulb2_status == 1) {
                                        $bulb2_status = "On";
                                    } else {
                                        $bulb2_status = "Off";
                                    }
                                }
                                ?>
                                <p class="mb-1 text-black">Bulb 2</p>
                                <div style="display: flex;">
                                    <p class="mb-1 text-black" style="font-weight: bold;">Status:&nbsp;</p>
                                    <p class="mb-1 text-black"><?php echo $bulb2_status; ?></p>
                                </div>
                                <div class="custom-control custom-switch">
                                    <form id="bulbForm" action="" method="POST">
                                        <button id="bulb2Btn" class="btn btn-primary" name="bulb2Btn"><?php echo $bulb2_status; ?></button>
                                    </form>
                                </div>
                            </div>
                            <div class="ms-auto widget-icon bg-success text-white">
                                <i class="bi bi-lightbulb"></i>
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
    // Changing button feature for bulb1 button
    const bulb1Btn = document.getElementById("bulb1Btn");
    var bulb1BtnText = bulb1Btn.innerHTML;

    if (bulb1BtnText == "On") {
        bulb1Btn.innerHTML = "Turn Off";
        bulb1Btn.classList.remove('btn', 'btn-primary');
        bulb1Btn.classList.add('btn', 'btn-danger');
    } else {
        bulb1Btn.innerHTML = "Turn On";
        bulb1Btn.classList.remove('btn', 'btn-danger');
        bulb1Btn.classList.add('btn', 'btn-primary');
    }

    // Changing button feature for bulb2 button
    const bulb1State = document.getElementById("bulb1State");
    var bulb1StateText = bulb1State.innerHTML;

    if (bulb1StateText == "Low Light") {
        bulb1State.innerHTML = "High Light";
        bulb1State.classList.remove('btn', 'btn-info');
        bulb1State.classList.add('btn', 'btn-primary');
    } else {
        bulb1State.innerHTML = "Low Light";
        bulb1State.classList.remove('btn', 'btn-danger');
        bulb1State.classList.add('btn', 'btn-info');
    }
</script>