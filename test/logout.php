<?php
session_start();
session_destroy();
//unset($_SESSION['cdr']);
//unset($_SESSION['credential']);

header("location: index.html");
