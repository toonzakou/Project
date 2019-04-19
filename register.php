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
<br>
<div id="wrapper">
    <h1>สมัครสมาชิก</h1>
  </div>
<br>
<div class="container-fluid">

    <br>
    <div class="col-md-auto">
    <form name="form1" method="post" action="save_register.php" >
    <table width="955" height="200" border="0">
      <tr>
        <td>ชื่อผู้ใช้</td>
        <td>&nbsp;</td>
        <td><input name="txtuser" type="text" id="txtuser" class="form-control" /></td>
      </tr>
      <tr>
        <td>รหัสผ่าน</td>
        <td>&nbsp;</td>
        <td><input name="txtpass" type="password" id="txtpass" class="form-control" /></td>
      </tr>
      <tr>
        <td>ยืนยันรหัสผ่าน</td>
        <td>&nbsp;</td>
        <td><input name="txtconpass" type="password" id="txtconpass" class="form-control"  /></td>
      </tr>
      <tr>
        <td >รหัสอาจารย์</td>
        <td>&nbsp;</td>
        <td><input name="txtid" type="text" id="txtid"  class="form-control"  /></td>
      </tr>
      <tr>
        <td >ชื่อ - นามสกุล</td>
        <td>&nbsp;</td>
        <td><input name="txtname" type="text" id="txtname" class="form-control" /></td>
      </tr>
        <tr>
        <td>สาขา</td>
        <td>&nbsp;</td>
        <td><input name="txtdep" type="text" id="txtdep" class="form-control" /></td>
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