<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Simple Cart</title>
</head>
<body>

<?php
if(isset($_POST['id'])){
    $pid = $_POST['id'];
    $wasFound =false;
    $i = 0;
    //if the cart session variable is not set or cart array is empty
    if(!isset($_SESSION["cart"])||count($_SESSION["cart"])<1){
        //Run if the cart is empty or not set
        $_SESSION["cart"]=array(1=>array("item_id"=>$pid, "quantity" =>1));
    }else{
        //Run if the cart has atleast one item in it
        foreach($_SESSION["cart"]as $each_item){
            $i++;
            while(list($key, $value)=each($each_item)){
                if($key=="item_id" && $value==$pid){
                    //That item ps in cart already so lets adjust its quantity using array_splice()
                    array_splice($_SESSION["pos"], $i-1,1, array(array("item_id"=>$pid, "quantity"=>$each_item['quantity']+1)));
                    $wasFound=true;
                }//close if condition
            }//close while loop

        }//close foreach loop
        if($wasFound==false){
            array_push($_SESSION["cart"], array("item_id" => $pid, "quantity"=>1));
        }
    }
    header("location: index.php");
    exit();
}


//clear cart
if(isset($_GET['cmd'])&& $_GET['cmd']=="emptycart"){
    unset($_SESSION["cart"]);
}

?>

<div class="container-fluid">

    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
        <h3 class="title">Products List<?php echo count($_SESSION["cart"]); ?></h3>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <img src="images/Spark-Kids-Laptop.jpg" class="card-img" width="150" height="150">
                </div>
                <div class="card-footer">
                    <form method="post" action="">
                        <input type="hidden" class="form-control form-control-sm" value="1" name="id" >
                        <p>Kids Laptop<br/>
                            <b>Ksh. 10000</b>
                        </p>
                        <div class="row">
                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                        <div class="form-group">
                            <input type="number" class="form-control form-control-sm" value="1" name="qty" >
                        </div>
                            </div>
                            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-success" name="add">Add to Cart</button>
                        </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <img src="images/earhones.jpg" class="card-img" width="150" height="150">
                </div>
                <div class="card-footer">
                    <form method="post" action="">
                        <input type="hidden" class="form-control form-control-sm" value="2" name="id" >
                        <p>Ear Phones<br/>
                            <b>Ksh. 500</b>
                        </p>
                        <div class="row">
                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-sm" value="1" name="qty" >
                                </div>
                            </div>
                            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-success" name="add">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <img src="images/phone.jpg" class="card-img" width="150" height="150">
                </div>
                <div class="card-footer">
                    <form method="post" action="">
                        <input type="hidden" class="form-control form-control-sm" value="3" name="id" >
                        <p>Phone<br/>
                            <b>Ksh. 15000</b>
                        </p>
                        <div class="row">
                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-sm" value="1" name="qty" >
                                </div>
                            </div>
                            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-success" name="add">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <img src="images/6tb-internal-hdd-deprime-kenya-nairobi.jpg" class="card-img" width="150" height="150">
                </div>
                <div class="card-footer">
                    <form method="post" action="">
                        <input type="hidden" class="form-control form-control-sm" value="4" name="id" >
                        <p>6TB Internal Drive<br/>
                            <b>Ksh. 10000</b>
                        </p>
                        <div class="row">
                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-sm" value="1" name="qty" >
                                </div>
                            </div>
                            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-success" name="add">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="cart">
        <h3 class="title">Cart</h3>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <table class="table">
                <thead>
                <th>Name</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Action</th>
                </thead>
                <tbody>

                <tr>
                <td>Laptop</td>
                <td>5 Pieces</td>
                <td>Ksh. 50000</td>
                <td>
                    <a href="#" class="btn btn-sm btn-danger">Remove</a>
                </td>
                </tr>

                <tr>
                    <td>Laptop</td>
                    <td>5 Pieces</td>
                    <td>Ksh. 50000</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-danger">Remove</a>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" ></td>
                    <td><b>Total:</b> Ksh. 50000</td>
                    <td>
                        <div class="btn-group">
                        <a href="#" class="btn btn-sm btn-group-sm btn-success">CheckOut</a>
                        <a href="index.php?cmd=emptycart" class="btn btn-sm btn-group-sm btn-warning">Clear</a>
                        </div>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

</div>

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