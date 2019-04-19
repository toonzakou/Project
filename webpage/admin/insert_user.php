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
    <div class="float-right"><h3><span style="text-align: right"><small>ยินดีต้อนรับ&nbsp;<font color="#0000FF"><u><?=$_SESSION["name"];?></u></font>&nbsp;(ผู้ดูแล) สู่ระบบ | <a href="logout.php"><font color="#636363">Logout</font></a></small></span></h3>
</div><br>
<div class="container-fluid">

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="homepage.php">จัดการวิชา</a>
  </li>
  <!--li class="nav-item">
    <a class="nav-link" href="../user/user.php">รายชื่อ</a>
  </li-->
  <li class="nav-item">
    <a class="nav-link" href="user.php">จัดการผู้ใช้</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" >เพิ่ม</a>
  </li>
  </ul>

    <br>
    <br>
    <div class="col-md-auto">
    <form name="form1" method="post" action="code_update_user.php" >
    <table width="955" height="200" border="0">
      <tr>
        <td>ชื่อผู้ใช้</td>
        <td>&nbsp;</td>
        <td><input name="txtuser" type="text" id="txtuser" class="form-control" value="<?=$objResult["user"];?>" /></td>
      </tr>
      <tr>
        <td>รหัสผ่าน</td>
        <td>&nbsp;</td>
        <td><input name="txtpass" type="text" id="txtpass" class="form-control" value="<?=$objResult["password"];?>" /></td>
      </tr>
      <tr>
        <td >รหัส</td>
        <td>&nbsp;</td>
        <td><input name="txtid" type="text" id="txtid"  class="form-control" value="<?=$objResult["teac_id"];?>"  /></td>
      </tr>
      <tr>
        <td >ชื่อ - นามสกุล</td>
        <td>&nbsp;</td>
        <td><input name="txtname" type="text" id="txtname" class="form-control" value="<?=$objResult["name"];?>" /></td>
      </tr>
        <tr>
        <td>สาขา</td>
        <td>&nbsp;</td>
        <td><input name="txtdep" type="text" id="txtdep" class="form-control" value="<?=$objResult["teac_dep"];?>" /></td>
      </tr>
      <tr>
        <td>สถานะ</td>
        <td>&nbsp;</td>
        <td> <select name="selected" class="form-control" id="sel1">
            <option>เลือกสถานะ</option>
            <option value="admin">admin</option>
            <option value="teacher">teacher</option>

    </select></td>
      </tr>
      <tr>
        <td></td>
        <td>&nbsp;</td>
        <td><button type="submit" class="btn btn-light-blue" value="<?=$id?>">บันทึก</button></td>
      </tr>
     
    </table>
    </div>

    </form>
    </div>
</div>   
</body>
</div>
</html>