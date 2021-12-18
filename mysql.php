<<?php
$db = mysqli_connect('localhost','root','root') or die('error');
 if (!$db) {
     die("" . mysqli_connect_error());
 }
 $db_select = mysqli_select_db($db, "test");
 if (!$db_select) {
     die("" . mysqli_connect_error());
 }
 ?>
