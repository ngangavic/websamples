<?php
require "dbConnection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>

<div class="container-fluid">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 topbar" style="padding: 10px">
        <div class="row">
            <h4>Dashboard</h4>
            <div class="btn btn-group btn-group-sm">
                <a href="logout.php" class="btn btn-sm  btn-danger">Logout</a>
                <a href="my-dashboard.php" class="btn btn-sm btn-info">Report</a>
            </div>
        </div>
    </div>
    <?php
    if (isset($_SESSION['cdr'])) {
        $stmt = $conn->prepare("SELECT * FROM tbl_details WHERE id=?");
        $stmt->bind_param("s", $_SESSION['cdr']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array();
        ?>
        <div class="card">
            <div class="card-body">
                <div class="alert alert-success">
                    <strong>Welcome!</strong>
                    <strong>Your email:<?php echo $row['email'] ?></strong>
                    <strong>Your phone:<?php echo $row['phone'] ?></strong>
                </div>
            </div>
        </div>
    <?php } else if (isset($_COOKIE['credential'])) {
        ?>
        <div class="card">
            <div class="card-body">
                <div class="alert alert-success">
                    <strong>Welcome!</strong>
                    <strong>Your password:<?php echo $_COOKIE['credential']; ?></strong>
                </div>
            </div>
        </div>
        <?php
    } ?>


</div>

<!--javascript-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>