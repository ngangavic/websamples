<?php
require "dbConnection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>My Dashboard</title>
</head>
<body>

<div class="container-fluid">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 topbar" style="padding: 10px">
        My Dashboard
        <div class="btn btn-group btn-group-sm">
        <a href="index.php" class="btn btn-sm btn-dark">Login</a>
        <a href="register.php" class="btn btn-sm btn-light">Register</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                <th>#</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Date Of Registration</th>
                </thead>
                <tbody>
                <?php
                $stmt=$conn->prepare("SELECT * FROM tbl_details");
                $stmt->execute();
                $result=$stmt->get_result();
                while ($row=$result->fetch_array()){
                ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td><?php echo $row['dateReg'] ?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

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