<?
include "../../db_config.php";

ob_start();
	session_start();
	?>
<html>
<div class="container-fluid">
<head>
<link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/bootstrap-reboot.css" rel="stylesheet">
    <link href="../../css/bootstrap-reboot.min.css" rel="stylesheet">
    <link href="../../css/mdb.min.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>ระบบเช็คชื่อนักศึกษา - แก้ไข</title>
    <link rel="stylesheet" type="text/css" href="../../style.css"/>
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
    <a class="nav-link " href="../../homepage2.php">หน้าหลัก</a>
  </li>
  <!--li class="nav-item">
    <a class="nav-link" href="../user/user.php">รายชื่อ</a>
  </li-->
  <li class="nav-item">
    <a class="nav-link" href="subjects.php">วิชา</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="../history/history.php">ประวัติการสอน</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" >แก้ไข</a>
  </li>
  </ul>
<?
    $id = $_GET["full_id"];
	  $name = $_SESSION["name"];
    $teacher = $_SESSION["id"];
    $strSQL = "SELECT subjects.year , subjects.term , subjects.full_id , subjects.sub_id , subjects.section , sub_manage.subject_name , subjects.date_t , subjects.star_time , subjects.fin_time 
    FROM subjects 
    INNER JOIN sub_manage ON subjects.sub_id = sub_manage.subject_ID 
    WHERE subjects.full_id = '$id'";
	$objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
?>
    <br>
    <br>
    <div class="col-md-auto">
    <form name="form1" method="post" action="code_update.php?id=<?php echo $_GET["id"];?>" >
    <table width="955" height="200" border="0">
    <?php
		  
		  while($objResult = mysql_fetch_array($objQuery)){
		 ?>
      <tr>
        <td >รหัสวิชา</td>
        <td>&nbsp;</td>
        <td><input name="txtid" type="text" id="txtid"  class="form-control" value="<?=$objResult["sub_id"];?>" readonly /></td>
      </tr>
      <tr>
        <td >ชื่อวิชา</td>
        <td>&nbsp;</td>
        <td><input name="txtname" type="text" id="txtname" class="form-control" value="<?=$objResult["subject_name"];?>" readonly /></td>
      </tr>
      <tr>
        <td >กลุ่ม</td>
        <td>&nbsp;</td>
        <td><input name="txtsec" type="text" id="txtsec" class="form-control" value="<?=$objResult["section"];?>" /></td>
      </tr>
      <tr>
        <td>วันที่</td>
        <td>&nbsp;</td>
        <td>
    <select name="selected" class="form-control" id="sel1">
    <option><?echo $objResult["date_t"]; ?></option>
    <option value="จันทร์">วันจันทร์</option>
    <option value="อังคาร">วันอังคาร</option>
    <option value="พุธ">วันพุธ</option>
    <option value="พฤหัสบดี">วันพฤหัสบดี</option>
    <option value="ศุกร์">วันศุกร์</option>
    <option value="อาทิตย์">วันอาทิตย์</option>
    </select>
        </td>
      </tr>
      <tr>
        <td>เริ่มสอน</td>
        <td>&nbsp;</td>
        <td><input name="start_time" type="time" id="start_time" class="form-control" value="<?=$objResult["star_time"];?>" /></td>
        <tr>
        <td>หมดเวลา</td>
        <td>&nbsp;</td>
        <td><input name="fin_time" type="time" id="fin_time" class="form-control" value="<?=$objResult["fin_time"];?>" /></td>
      </tr>
      <tr>
        <td></td>
        <td>&nbsp;</td>
        <td><button type="submit" class="btn btn-light-blue" value="<?=$id?>">บันทึก</button></td>
      </tr>
      <tr>
        <td ></td>
        <td>&nbsp;</td>
        <td><input name="txtfull" type="text" id="txtfull" class="form-control" style="display: none" value="<?=$objResult["full_id"];?>" /></td>
        <td><input name="txtyear" type="text" id="txtyear" class="form-control" style="display: none" value="<?=$objResult["year"];?>" /></td>
        <td><input name="txtterm" type="text" id="txtterm" class="form-control" style="display: none" value="<?=$objResult["term"];?>" /></td>
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