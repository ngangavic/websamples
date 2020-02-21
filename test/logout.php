<?php
session_start();
unset($_SESSION['cdr']);
unset($_SESSION['credential']);

header("location: index.html");
