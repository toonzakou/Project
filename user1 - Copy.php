<?
include "db_config.php";
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');
ob_start();
	session_start();
	?>
<html>
  <div class="container">
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
    <div class="float-right"><h3><span style="text-align: right"><small>Welcome&nbsp;<font color="#0000FF"><u><?=$_SESSION["name"];?></u></font>&nbsp;to System | <a href="logout.php"><font color="#636363">Logout</font></a></small></span></h3>
</div><br>

    <div class="container-fluid">

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="homepage2.php">หน้าหลัก</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="user1.php">รายชื่อ</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="subjects.php">วิชา</a>
  </li>
  </ul>
<?
	$strSQL = "SELECT * FROM barcode_tb";
	$objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
?>
    <form name="form1" method="post" action="import1.php" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
    <tr>
            <td height="42" colspan="5" style="text-align: left">ค้นหา : 
              <label for="textfield"></label>
              <input type="text" name="textfield" id="textfield">
              <input type="submit" name="button" id="button" value="ค้นหา"></td>
               <!--a href="import.php" onclick="javascript:void window.open('import.php','1468311384451','width=737,height=350,toolbar=0,menubar=0,location=0,status=0,scrollbars=0,resizable=0,left=0,top=0');return false;">ลองกดดู</a-->
            <tr>
               <div>
                <label>Choose Excel
                    File</label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                    
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Import</button>
      
                </div>
            </tr>
      </tr>    
      <div class="table-responsive" width="955" height="200" >
        <table class="table" width="955" height="200" border="0">     
        <thead>
      <tr>
        <th bgcolor="#CCCCCC" scope="col">#</th>
        <th bgcolor="#CCCCCC" scope="col">รหัสนักศึกษา</th>
        <th bgcolor="#CCCCCC" scope="col">ชื่อ-นามสกุล</th>
        <th bgcolor="#CCCCCC" scope="col">สาขา</th>
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
      </tr>
    </tbody>
    
          <?php
          $a++;}
          ?>
    <thead>
      <tr>
      <td height="32" colspan="5" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
    </thead>
          </table>
      </form>
    </div>
</div>   
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
</body>
      </div>
</html>