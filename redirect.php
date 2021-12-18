<?php
require_once('mysql.php');
$key = htmlspecialchars($_GET['token']);
if(empty($_GET['token'])){}
else{
@$select = mysqli_fetch_assoc(mysqli_query("SELECT * FROM `short` WHERE `token` = '".$token."'"));
if($select){
$result = [
'url' => $select['url'],
'token' => $select['token']
];
header('location: '.$result['url']);
}
}
 ?>
