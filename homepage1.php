<?

include "db_config.php";

ob_start();
 session_start();
	?>
<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap-reboot.css" rel="stylesheet">
<link href="css/bootstrap-reboot.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>STUDENT IDENTITY SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <h3><span style="text-align: right"><small>Welcome&nbsp;<font color="#0000FF"><u><?=$_SESSION["name"];?></u></font>&nbsp;to System | <a href="logout.php"><font color="#636363">Logout</font></a></small></span></h3>
</head>
<body>
<div id="wrapper">
    <h1>STUDENT IDENTITY SYSTEM</h1>
    <div id="content">
      <nav>
        <ul id="appleNav">
          <li><a href="homepage1.php">หน้าหลัก</a></li>
          <li><a href="user1.php">รายชื่อ</a></li>
          <li><a href="subjects.php">วิชา</a></li>
          <li><a>หน้าหลัก</a></li>

        </ul>
        </nav>
<?
	$strSQL = "SELECT * FROM barcode_tb WHERE (stu_id LIKE '%".$_POST["textfield"]."%' OR stu_name LIKE '%".$_POST["textfield"]."%')";
	$objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
?>
<form name="form1" method="post" action="" id="menu">
    <tr>
            <td height="42" colspan="5" style="text-align: left">ค้นหา : 
              <label for="textfield"></label>
              <input type="text" name="textfield" id="textfield" autofocus>
              <input type="submit" name="button" id="button" value="ค้นหา"></td>
          </tr>
    <div class="table-responsive" width="955" height="200" >
        <table class="table" width="955" height="200" border="0">     
    <thead>
      <tr>
        <th bgcolor="#CCCCCC" scope="col">#</th>
        <th bgcolor="#CCCCCC" scope="col">รหัสนักศึกษา</th>
        <th bgcolor="#CCCCCC" scope="col">ชื่อ-นามสกุล</th>
        <th bgcolor="#CCCCCC" scope="col">สาขา</th>
        <th bgcolor="#CCCCCC" scope="col">แก้ไข</th>
        <th bgcolor="#CCCCCC" scope="col">ลบ</th>
      </tr>
    </thead>
    
    <?php
		  $a=1;
		  while($objResult = mysql_fetch_array($objQuery)){
		?>
    
    <tbody>
      <tr>
            <td bgcolor="#FFCC66"><?=$objResult["id"];?></td>
            <td bgcolor="#FFCC66"><?=$objResult["stu_id"];?></td>
            <td bgcolor="#FFCC66"><?=$objResult["stu_name"];?></td>
            <td bgcolor="#FFCC66"><?=$objResult["stu_dep"];?></td>
            <td bgcolor="#FFCC66">&nbsp;<a href="test.php?id=<?=$objResult["id"];?>"><img src="images/button/edit.png" width="33" height="33"></a></td>
            <td bgcolor="#FFCC66">&nbsp;<img src="images/button/garbage.png" width="33" height="33"></td>
      </tr>
    </tbody>
    
    <?php
      $a++;}
    ?>
    
    <thead>
      <tr>
      <td colspan="6" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
    </thead>
  </table>
</div>
</form>
</div>
</div>   
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
</body>
</html>