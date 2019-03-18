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
	<title>STUDENT IDENTITY SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="../../style.css"/>
    </head>
</head>
<body>
<div id="wrapper">
    <h1>STUDENT IDENTITY SYSTEM</h1>
    <div class="float-right"><h3><span style="text-align: right"><small>Welcome&nbsp;<font color="#0000FF"><u><?=$_SESSION["name"];?></u></font>&nbsp;to System | <a href="logout.php"><font color="#636363">Logout</font></a></small></span></h3>
</div><br>
<div class="container-fluid">

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="../../homepage2.php">หน้าหลัก</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../user/user.php">รายชื่อ</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="subjects.php">วิชา</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" >เพิ่มรายวิชา</a>
  </li>
  </ul>
<?
    $id = $_GET["id"];
	$name = $_SESSION["name"];
    $teacher = $_SESSION["id"];
    $strSQL = "SELECT *
    FROM sub_manage ";
	$objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
?>
    <br>
    <br>
    <div class="col-md-auto">
    <form name="form1" method="post" action="code_insert.php" >
    <table width="955" height="200" border="0">
    
      <tr>
        <td >วิชา</td>
        <td>&nbsp;</td>
    <td>
        <select name="select_id" class="form-control" id="sel1">
        <?php
		  
		  while($objResult = mysql_fetch_array($objQuery)){
		 ?>
        <option value = "<?=$objResult["subject_ID"]; ?>"><?echo $objResult["subject_ID"]." - ". $objResult["subject_name"]  ?></option>
        <?php
          }
          ?>
    </td>
      </tr>
      <tr>
        <td>กลุ่ม</td>
        <td>&nbsp;</td>
        <td><input name="txtsec" type="text" id="txtsec" class="form-control"/></td>
        <tr>
      <tr>
        <td>วันที่</td>
        <td>&nbsp;</td>
        <td>
    <select name="selected" class="form-control" id="sel1">
    <option>เลือกวันสอน</option>
    <option value="Monday">Monday</option>
    <option value="Tuesday">Tuesday</option>
    <option value="Wednesday">Wednesday</option>
    <option value="Thurday">Thurday</option>
    <option value="Friday">Friday</option>
    <option value="Saturdat">Saturdat</option>
    <option value="Sunday">Sunday</option>
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
        <td><button type="submit" class="btn btn-light-blue" >Save</button></td>
      </tr>
    
     
    </table>
    </div>

    </form>
    </div>
</div>   
</body>
</div>
</html>