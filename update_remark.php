<?
include "db_config.php";

ob_start();
	session_start();
	?>
<html>
<div class="container-fluid">
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap-reboot.css" rel="stylesheet">
    <link href="css/bootstrap-reboot.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>ระบบเช็คชื่อนักศึกษา - แก้ไข</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
</head>
<body>
<div id="wrapper">
    <h1>ระบบเช็คชื่อนักศึกษา</h1>
    <div class="float-right"><h3><span style="text-align: right"><small>ยินดีต้อนรับ&nbsp;<font color="#0000FF"><u><?=$_SESSION["name"];?></u></font>&nbsp;สู่ระบบ | <a href="logout.php"><font color="#636363">Logout</font></a></small></span></h3>
</div><br>
<div class="container-fluid">

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="homepage2.php">หน้าหลัก</a>
  </li>
  <!--li class="nav-item">
    <a class="nav-link" href="../user/user.php">รายชื่อ</a>
  </li-->
  <li class="nav-item">
    <a class="nav-link" href="webpages/subject/subjects.php">วิชา</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="webpages/history/history.php">ประวัติการสอน</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" >แก้ไขเหตุผล</a>
  </li>
  </ul>
<?
    $id = $_GET["full_id"];
    $num = $_GET['num'];
    $stu = $_GET['stu_id'];
    $new = $id.$num;
    $strSQL = "SELECT attend_tb.full_id , attend_tb.num , attend_tb.stu_id , attend_tb.sub_id , attend_tb.section , attend_tb.date , new_sub.stu_name 
    FROM attend_tb 
    INNER JOIN new_sub ON attend_tb.stu_id = new_sub.stu_id 
    WHERE attend_tb.new_full_id = '$new' AND attend_tb.stu_id = '$stu'";
	$objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
?>
    <br>
    <br>
    <div class="col-md-auto">
    <form name="form1" method="post" action="code_update.php" >
    <table width="955" height="200" border="0">
    <?php
		  
		  while($objResult = mysql_fetch_array($objQuery)){
		 ?>
      
    <tr>
        <td>รหัสนักศึกษา</td>
        <td>&nbsp;</td>
        <td><input name="txtid" type="text" id="txtid" class="form-control" value="<?=$objResult["stu_id"];?>"></td>
      </tr>
        
    <tr>
        <td>ชื่อ - นามสกุล</td>
        <td>&nbsp;</td>
        <td><input name="txtname" type="text" id="txtname" class="form-control" value="<?=$objResult["stu_name"];?>"></td>
      </tr>
      <tr>
        <td>หมายเหตุ</td>
        <td>&nbsp;</td>
        <td><input name="txtremark" type="text" id="txtremark" class="form-control" value="<?=$objResult["date"];?>"></td>
      </tr>
      <tr>
        <td></td>
        <td>&nbsp;</td>
        <td><button type="submit" class="btn btn-light-blue" value="<?=$id?>">บันทึก</button></td>
      </tr>
      <tr>
        <td ></td>
        <td>&nbsp;</td>
        <td><input name="txtfull" type="text" id="txtfull" class="form-control" style="display: none" value="<?=$objResult["full_id"];?>"></td>
        <td><input name="txtsub" type="text" id="txtsub" class="form-control" style="display: none" value="<?=$objResult["sub_id"];?>"></td>
        <td><input name="txtsec" type="text" id="txtsec" class="form-control" style="display: none" value="<?=$objResult["section"];?>"></td>
        <td><input name="txtnum" type="text" id="txtnum" class="form-control" style="display: none" value="<?=$objResult["num"];?>"></td>
      </tr>
      <?php
          }
          ?>
     
    </table>
    </div>

    </form>
    </div>
</div>   
</body>
</div>
</html>