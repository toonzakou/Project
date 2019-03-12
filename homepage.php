<?
include "db_config.php";
ob_start();
	session_start();
	?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>SUPPLY MANAGEMENT SYSTEM</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
<style type="text/css">
	a:link {
	color: #000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000;
}
a:hover {
	text-decoration: none;
	color: #000;
}
a:active {
	text-decoration: none;
	color: #000;
}
<!--
@font-face {
  font-family:  "WR Tish Smile.ttf" ;
  src: url("font/WR Tish Smile.ttf") format("truetype");;
}
 

h1 {
	font-family: sans-serif;
}

 
 
-->
    </style>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
</head>

<body style="font-family:'WR Tish Smile'">
<div id="wrapper">
    <h1>SUPPLY MANAGEMENT SYSTEM</h1>
    <div id="content">
      <nav>
        <ul id="appleNav">
          <li><a href="homepage.php">หน้าหลัก</a></li>
          <li><a href="webpage/personnel/personnel.php">บุคลากร</a></li>
          <li><a href="webpage/purchase/purchase.php">สั่งซื้อ</a></li>
          <li><a href="webpage/store/store.php">คลังสินค้า</a></li>
        </ul>
        </nav>
	  <div id="TabbedPanels1" class="TabbedPanels">
          <div class="TabbedPanelsContentGroup">
            <div class="TabbedPanelsContent">
            <?
	$strSQL = "SELECT * FROM test_user";
	$objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
	?>
            <form name="form1" method="post" action="" id="menu">
        <table width="955" height="200" border="0">
          <tr>
            <td height="42" colspan="5" style="text-align: left">ค้นหา 
              
                <label for="select"></label>
              <select name="select" id="select">
              </select>
              Keyword : 
              <label for="textfield"></label>
              <input type="text" name="textfield" id="textfield">
              <input type="submit" name="button" id="button" value="ค้นหา"></td>
          </tr>
          <tr>
            <td height="43" colspan="5" style="font-size: x-large; font-weight: bold; text-align: center;">.:: แจ้งเตือนครุภัณฑ์ใกล้หมดอายุ::.<a href="homepage2.php">&nbsp;</a></td>
            </tr>
          <tr>
            <td width="114" bgcolor="#CCCCCC" style="font-weight: bold; text-align: center;">id</td>
            <td width="144" bgcolor="#CCCCCC" style="font-weight: bold; text-align: center;">username</td>
            <td width="410" bgcolor="#CCCCCC" style="font-weight: bold; text-align: center;">password</td>
            </tr>
          <?php
		  $a=1;
		  while($objResult = mysql_fetch_array($objQuery)){
		 ?>
          <tr>
            <td height="33" bgcolor="#FFCC66"><?=$objResult["id"];?></td>
            <td bgcolor="#FFCC66"><?=$objResult["username"];?></td>
            <td bgcolor="#FFCC66"><?=$objResult["password"];?></td>
          </tr>
          <?php
          $a++;}
          ?>
          <tr>
            <td height="32" colspan="5" bgcolor="#CCCCCC">&nbsp;</td>
          </tr>
          </table>
      </form></div>
            
      
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
		
    </div>
</div>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
        
</body>
</html>
