<?php
include 'controller.php';
//$url = 'http://eneko.test/?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjEwMDAsIm5iZiI6MjAwMH0.rDwu143F8ZthSASdM8_bI0gMdXVqpe1PoFeSzOOmTYQ&key=1234';
generateKey();
$token = $_GET['token'];
$key = $_GET['key'];
// verificacion controller
check($token,$key);

?>


