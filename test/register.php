<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Sign Up</title>
</head>
<body>

<div class="container">
    <div class="col-xs-12 col-sm-12 col-md-6 offset-md-3 col-lg-6">
        <div class="card" style="margin-top: 50px">
            <div class="card-header">
                <h5>Sign Up</h5>
                <?php
                if (isset($_GET['msg'])){
                ?>
                <div class="alert alert-warning">
                    <strong><?php echo $_GET['msg'] ?></strong>
                </div>
                <?php } ?>
            </div>
            <div class="card-body">
                <form action="signup.php" method="post">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="phone" class="form-control" placeholder="Phone" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="signup" class="btn btn-block btn-outline-success">Sign Up</button>
                        <a href="index.html" class="btn btn-block btn-outline-info">Sign In</a>
                    </div>
                </form>
            </div>
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