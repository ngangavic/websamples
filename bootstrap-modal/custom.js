$(document).ready(function(){
    $("#modal1").click(function(){
        $('#myModal1').modal('hide')
        $('#myModal2').modal('show')
    });
});

$(document).ready(function(){
    $("#modal2").click(function(){
        $('#myModal1').modal('show')
        $('#myModal2').modal('hide')
    });
});