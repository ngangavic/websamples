<?php
require "../connection/connection.php";
$sql="SELECT * FROM tbl_ajax ";
$statement = $pdo->prepare($sql);

$statement->execute();

$result = $statement->fetchAll();


?>

<html>
<head>
    <title>Insert data onclick</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../bootstrap-4.3.1/js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="../bootstrap-4.3.1/css/bootstrap.min.css">
    <script src="../bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <div class="container" id="c">
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 offset-md-3 top">
<h3>AJAX INSERT</h3>
<div class="form" id="fm">
    <form method="POST" role="form" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fm" id="add_details">
        <div class="form-group">
    <label>Name: </label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
            <div class="form-group">
    <label>Email: </label>
                    <input type="text" name="email" id="email" class="form-control" required>
                </div>
            <div class="form-group bt">
                    <button type="submit" id="add" class="btn btn-block btn-success">Add</button>
                </div>
    </form>
</div>
</div>

<div id="tbl"> 
<table class="table" id="tb">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="table_data">
        <?php
    foreach($result as $row)
    {
        $id=$row['id'];
     echo '
     <tr>
      <td>'.$row["name"].'</td>
      <td>'.$row["email"].'</td>
      <td><button type="submit" class="btn btn-danger" id="delete" value="'.$id.'">Delete</button></td>
     </tr>
     ';
    }
    ?>
    </tbody>
</table>
</div>

</body>
</html>

<script>
$(document).ready(function(){

 //add
 $('#add_details').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:$(this).serialize(),
   dataType:"json",
   beforeSend:function(){
    $('#add').attr('disabled', 'disabled');
   },
   success:function(data){
    $('#add').attr('disabled', false);
    if(data.name)
    {
     var html = '<tr>';
     html += '<td>'+data.name+'</td>';
     html += '<td>'+data.email+'</td></tr>';
     $('#table_data').prepend(html);
     $('#add_details')[0].reset();
     $("#c").load(location.href+"#c");
    }
   }
  })  
 });

 // Delete 
 $('#delete').click(function(){
   var el = this;
   var id = $(this).val();
  // alert(id);
   $.ajax({
     url: 'remove.php',
     type: 'POST',
     data: { id:id },
     success: function(response){

       if(response == 1){
     // Remove row from HTML Table
    
     $(el).closest('tr').css('background','tomato');
     $(el).closest('tr').fadeOut(800,function(){
        $(this).remove();
     });
        $("#c").load(location.href+"#c");
      }else{
     alert('Invalid ID.');
      }

    }
   });

 });
 
});
</script>
