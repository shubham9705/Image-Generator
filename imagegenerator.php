<?php
require 'count.php';
header('Content-type:image/jpeg');
if(isset($_GET['id'])){
	$id=$_GET['id'];
      $query=mysql_query("SELECT `username` FROM `people` WHERE `id`='$id'");
      if(mysql_num_rows($query)>=1){
        $email=mysql_result($query,0,'username');
       } else {
       	  $email='id not found';
       }
} else{
    $email='no id specified';
}       
            $len=strlen($email);
$font_size=4;
$font_height=imagefontheight($font_size);
$font_width=imagefontwidth($font_size)*$len;
$image=imagecreate($font_width,$font_height);
imagecolorallocate($image, 255, 255, 255);
$font_color=imagecolorallocate($image, 0, 0, 0);
imagestring($image, $font_size, 0, 0, $email, $font_color);
imagejpeg($image);
?>



