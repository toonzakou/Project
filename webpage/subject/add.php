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
	<title>ระบบเช็คชื่อนักศึกษา - เพิ่มนักศึกษา (EXCEL)</title>
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
    <a class="nav-link active" >เพิ่มนักศึกษา</a>
  </li>
  </ul>
<?
    $id = $_GET["id"];
    $section = $_GET['section'];
	$strSQL = "SELECT subjects.id , subjects.full_id , subjects.sub_id , sub_manage.subject_name , subjects.section
  FROM subjects 
  INNER JOIN sub_manage ON subjects.sub_id = sub_manage.subject_ID
  WHERE subjects.id ='$id' AND subjects.section = '$section'";
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
        <td >เพิ่มนักศึกษา</td>
        <td>&nbsp;</td>
        <td> 
  <div class="custom-file">
    <input type="file" name="file" class="custom-file-input" id="file" accept=".xls,.xlsx">  
    <label class="custom-file-label" for="inputGroupFile01"></label>
  </div>
</td>
      </tr>
  
      
  <tr>
        <td></td>
        <td>&nbsp;</td>
        <td><div class="input-group-prepend">
    <span class="input-group-text"><button onclick="Asubmit(this.form)" id="submit" name="import" class="button">เพิ่ม</button></span>
  </div></td>
      </tr>
      <!--tr>
        <td></td>
        <td>&nbsp;</td>
        <td><button onclick="Bsubmit(this.form)" class="btn btn-light-blue" value="<?=$id?>">Save</button></td>
      </tr-->
      <tr>
        <td ></td>
        <td>&nbsp;</td>
        <td><input name="txtfull" type="text" id="txtfull" class="form-control" style="display: none" value="<?=$objResult["full_id"];?>" /></td>
      </tr>
      <tr>
        <td></td>
        <td>&nbsp;</td>
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
frm.action="../../import.php";
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


