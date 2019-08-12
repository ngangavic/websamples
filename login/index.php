<html>
<head>
<title>PHP Login</title>
<script src="../bootstrap-4.3.1/js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="../bootstrap-4.3.1/css/bootstrap.min.css">
    <script src="../bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 offset-md-3 login">
<h3>Login</h3>
<hr/>
<?php
if(isset($_GET['info'])){
$info=$_GET['info'];
if($info=='success'){
?>
<div class="alert alert-success">
  <strong>Success!</strong>You logged in successfully.
</div>
<?php
}else if($info=='error'){
?>
<div class="alert alert-danger">
  <strong>Error!</strong>Logged in failed.
</div>
<?php
}
}
?>
<div class="form">
<form action="login.php" method="post" role="form" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="form-group">
    <label>Email: </label>
<input class="form-control" type="email" name="email" placeholder="Enter email"  required>
</div>

<div class="form-group">
    <label>Password: </label>
<input class="form-control" type="password" name="password" placeholder="Enter password" required>
</div>

<div class="form-group">
<button type="submit" class="btn btn-block btn-success" name="login">Login</button>
</div>

<div class="form-group register" >
Don't have an account ? <a href="../register">Register</a>
</div>
</form>
</div>
</div>
</div>
</body>
</html>