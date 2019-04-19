<?
include "../../db_config.php";
date_default_timezone_set('Asia/Bangkok');
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
	<title>ระบบเช็คชื่อนักศึกษา - เพิ่มวิชา</title>
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
    <a class="nav-link" href="../history/history.php">ประวัติการสอน</a>
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

<script language="javascript">
function fncSubmit()
{
	if(document.form1.txtyear.value == "")
	{
		alert('กรุณากรอกปีการศึกษา');
		document.form1.txtyear.focus();
		return false;
	}	
	if(document.form1.txtterm.value == "")
  {
		alert('กรุณากรอกเทอม');
		document.form1.txtterm.focus();		
		return false;
	}	
  if(document.form1.txtsec.value == "")
  {
		alert('กรุณากรอกกลุ่มเรียน');
		document.form1.txtsec.focus();		
		return false;
	}	
  if(document.form1.selected.value == "")
  {
		alert('กรุณาเลือกวันที่สอน');
		return false;
	}
  if(document.form1.start_time.value == "")
  {
		alert('กรุณากรอกเวลาเริ่มสอน');
    document.form1.start_time.focus();
		return false;
	}	
  if(document.form1.fin_time.value == "")
  {
		alert('กรุณากรอกเวลาสิ้นสุด');
    document.form1.fin_time.focus();
		return false;
	}	
	document.form1.submit();
}
</script>
    <br>
    <br>
    <div class="col-md-auto">
    <form name="form1" method="post" action="code_insert.php" onSubmit="JavaScript:return fncSubmit();" >
    <table width="955" height="200" border="0">
    <tr>
        <td>ปีการศึกษา</td>
        <td>&nbsp;</td>
        <td><input name="txtyear" type="text" id="txtyear" autocomplete=off  placeholder = "กรอกปีการศึกษา เช่น 2562" class="form-control"/></td>
      </tr>
      <tr>
        <td>เทอม</td>
        <td>&nbsp;</td>
        <td><select name="term" class="form-control" id="sel1">
        <option value = "1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        </select></td>
      </tr>
      
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
          </select>
    </td>
      </tr>

      <tr>
        <td>กลุ่ม</td>
        <td>&nbsp;</td>
        <td><input name="txtsec" type="text" id="txtsec" autocomplete=off  placeholder = "กรอกเป็นตัวเลข"  class="form-control"/></td>
      </tr>
      <tr>
        <td>วันสอน</td>
        <td>&nbsp;</td>
        <td>
    <select name="selected" class="form-control" id="sel1">
    <option value = "">เลือกวันสอน</option>
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
        <td><input name="start_time" type="time" id="start_time" class="form-control" value="" /></td>
        <tr>
        <td>หมดเวลา</td>
        <td>&nbsp;</td>
        <td><input name="fin_time" type="time" id="fin_time" class="form-control" value="" /></td>
      </tr>
      <tr>
        <td></td>
        <td>&nbsp;</td>
        <td><button type="submit" class="btn btn-light-blue" >บันทึก</button></td>
      </tr>
    
     
    </table>
    </div>

    </form>
    </div>
</div>   
</body>
</div>
</html>