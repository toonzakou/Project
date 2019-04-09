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
	<title>ระบบเช็คชื่อนักศึกษา - เพิ่มนักศึกษา</title>
    <link rel="stylesheet" type="text/css" href="../../style.css"/>
    </head>
</head>
<body>
<div id="wrapper">
    <h1>ระบบเช็คชื่อนักศึกษา</h1>
    <div class="float-right"><h3><span style="text-align: right"><small>Welcome&nbsp;<font color="#0000FF"><u><?=$_SESSION["name"];?></u></font>&nbsp;to System | <a href="logout.php"><font color="#636363">Logout</font></a></small></span></h3>
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
    <a class="nav-link" href="webpage/subject/subjects.php">วิชา</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="webpage/history/history.php">ประวัติการสอน</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" >เพิ่มนักศึกษา</a>
  </li>
  </ul>
<?
  $id = $_SESSION["subject_ID"]; 
  /*เก็บ SESSION ของกลุ่ม*/ 
  /*$_SESSION["section"] = $objResult["section"];*/
  $sec = $_SESSION["section"];
	$strSQL = "SELECT subjects.id ,subjects.full_id , subjects.sub_id , sub_manage.subject_name , subjects.section
  FROM subjects 
  INNER JOIN sub_manage ON subjects.sub_id = sub_manage.subject_ID
  WHERE subjects.sub_id ='$id' AND subjects.section = '$sec'";
  $objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
?>
    <br>
    <br>
    <div class="col-md-auto">
    <form method="post" action="" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
    <table width="955" height="200" border="0">
    <?php
		  
		  while($objResult = mysql_fetch_array($objQuery)){
		 ?>
      <tr>
        <td >รหัสวิชา</td>
        <td>&nbsp;</td>
        <td><input name="txtid" type="text" id="txtid"  class="form-control" value="<?=$objResult["sub_id"];?>"  /></td>
      </tr>
      <tr>
        <td >ชื่อวิชา</td>
        <td>&nbsp;</td>
        <td><input name="txtname" type="text" id="txtname" class="form-control" value="<?=$objResult["subject_name"];?>" /></td>
      </tr>
      <tr>
        <td >กลุ่ม</td>
        <td>&nbsp;</td>
        <td><input name="txtsec" type="text" id="txtsec" class="form-control" value="<?=$objResult["section"];?>" /></td>
      </tr>
      <tr>
        <td >รหัสนักศึกษา</td>
        <td>&nbsp;</td>
        <td><input name="stuid" type="text" id="stuid" class="form-control" value="" /></td>
      </tr>
      <tr>
        <td >ชื่อนักศึกษา</td>
        <td>&nbsp;</td>
        <td><input name="stuname" type="text" id="stuname" class="form-control" value="" /></td>
      </tr>
      <tr>
        <td >เบอร์ติดต่อ</td>
        <td>&nbsp;</td>
        <td><input name="teltxt" type="text" id="teltxt" class="form-control" value="" /></td>
      </tr>
      <tr>
        <td></td>
        <td>&nbsp;</td>
        <td><div class="input-group-prepend">
    <span class="input-group-text"><button onclick="Asubmit(this.form)" id="submit" name="import" class="button">Add</button></span>
  </div></td>
      </tr>
      <tr>
        <td></td>
        <td><input name="txtfull" type="text" id="txtfull" class="form-control" style="display: none" value="<?=$objResult["full_id"];?>" /></td>
        <td>
        </td>
      </tr>
      <?php
          }
          ?>
     
    </table>
    </div>
  

    </form>
    </div>
</div>   

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

function Asubmit(frm)
{
frm.action="code_insert_attend.php";
frm.submit();
}

function Bsubmit(frm)
{
frm.action="code_add.php?stu_name=<?=$objResuut["stu_name"]?>";
frm.submit();
}
</script>

</body>
<style>

 button {
 
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
}
</style>
</div>
</html>


