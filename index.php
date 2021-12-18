<?php
require_once('mysql.php');
$link = htmlspecialchars($_POST['link']);
if(empty($_POST['submit'])){}
if(empty($_POST['link'])){}
else{
  @$select = mysqli_fetch_assoc(mysqli_query("SELECT * FROM `short` WHERE `url` = '".$link."'"));
  if($select){
    $result = [
      'url'   => $select['url'],
      'token' => $select['token'],
      'link'  => 'http://'.$_SERVER['HTTP_HOST'].'/'.$select['token']
    ];
    print_r($result);
  }
  else{
    $letters='QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890';
    $count=strlen($letters);
    $intval=time();
    $result='';
    for($i=0;$i<5;$i++) {
    $last=$intval%$count;
    $intval=($intval-$last)/$count;
    $result.=$letters[$last];
  }
  mysqli_query($db, "INSERT INTO `short` (`id`, `url`, `token`) VALUES (NULL, '".$link."', '".$result.$intval."') ");
  @$select = mysqli_fetch_assoc(mysqli_query("SELECT * FROM `short` WHERE `url` = '".$link."'"));
  $result = [
    'url'   => $select['url'],
    'token' => $select['token'],
    'link'  => 'http://'.$_SERVER['HTTP_HOST'].$select['token']
  ];

}
}
 ?>
 <form method="post" action="">
   <input type="text" name="link">
   <input type="submit" name="submit">
 </form>
 <?php
 print_r($result);
 ?>
