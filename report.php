<?php include "includes/header.php"; ?>

<?php
//Checking if the login cookie is set
if (!isset($_COOKIE["user_email"])) {
    header("Location: login.php");
} else {
    $user_email = $_COOKIE["user_email"];
    $query = "SELECT * FROM users WHERE user_email = '{$user_email}' ";
    $select_user_query = mysqli_query($connection, $query);
}
?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<!-- <main class="page-content"> -->
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-4">Water Usage Report</h5>
            </div>
            <table class="table mb-0 table-striped">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Water Used (Litres)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM water_usage WHERE user_email = '{$user_email}'";
                    $select_water_usage = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_water_usage)) {
                        $date = $row['date'];
                        $date = date_create($date);
                        $date = date_format($date, "d-M-Y");

                        $water_usage = $row['water_usage'];

                        echo "<tr>";
                        echo "<th scope='row'>$date</th>";
                        echo "<td>$water_usage Litres</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<!-- </main> -->

<?php include "includes/footer.php"; ?>