<?php

if(isset($_POST['receiver'])&&isset($_POST['subject'])&&isset($_POST['message'])&&isset($_POST['send'])){
    $to      = $_POST['receiver'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $headers = array(
        'From' => 'no-reply@gitignore.com',
//        'Reply-To' => 'webmaster@example.com',
        'X-Mailer' => 'PHP/' . phpversion()
    );

    if (mail($to, $subject, $message, $headers)){
        echo 'success mail sent';
    }else{
        echo 'error sending mail';
    }

}else{
    //error
    echo 'error';
}
