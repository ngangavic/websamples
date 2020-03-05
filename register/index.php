<html>
<head>
<title>PHP Register</title>
<script src="../bootstrap-4.3.1/js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="../bootstrap-4.3.1/css/bootstrap.min.css">
    <script src="../bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <script src="passVerif.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 offset-md-3 register">
<h3>Register</h3>
<hr/>
<?php 
if(isset($_GET['info'])){
$info=$_GET['info'];
if($info=='empty'){
    ?>
<div class="alert alert-danger">
  <strong>Error!</strong> No data in form.
</div>
<?php
}else if($info=='success'){
    ?>
    <div class="alert alert-success">
  <strong>Success!</strong> You are registered.
</div>
<?php
}else if($info=='exists'){
?>
<div class="alert alert-warning">
  <strong>Warning!</strong> You are already registred.
</div>
<?php
}
}
?>
<div class="form">
<form action="register.php" method="post" role="form" class="col-md-12 col-lg-12">
    <div class="form-group">
    <label>Name: </label>
<input class="form-control" type="text" name="name" placeholder="Enter name"  required>
</div>
<div class="form-group">
    <label>Email: </label>
<input class="form-control" type="email" name="email" placeholder="Enter email"  required>
</div>

<div class="form-group">
    <label>Password: </label>
<input id="password" class="form-control" type="password" name="password" placeholder="Enter password" required>
</div>

<div class="form-group">
    <label>Confirm Password: </label>
<input id="password1" class="form-control" type="password" onkeyup="passwordVerify();" name="cpassword" placeholder="Confirm password" required>
<div id="passwordError"></div>
</div>

<div class="form-group">
<button id="myBtn" type="submit" class="btn btn-block btn-success" name="register" >Register</button>
</div>

<div class="form-group login" >
ALready have an account ? <a href="../login">Login</a>
</div>
</form>
</div>
</div>
</div>
</body>
</html>
