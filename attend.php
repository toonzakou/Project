
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
	<title>STUDENT IDENTITY SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
  
    </head>
<body>
<div id="wrapper">
    <h1>STUDENT IDENTITY SYSTEM</h1>
    <div class="float-right"><h3><span style="text-align: right"><small>Welcome&nbsp;<font color="#0000FF"><u><?=$_SESSION["name"];?></u></font>&nbsp;to System | <a href="logout.php"><font color="#636363">Logout</font></a></small></span></h3>
</div><br>

    <div class="container-fluid">

<!--ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="homepage2.php">หน้าหลัก</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="user.php">รายชื่อ</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="subjects.php">วิชา</a>
  </li>
  </ul-->
  
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="homepage2.php">หน้าหลัก</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="webpage/user/user.php">รายชื่อ</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="webpage/subject/subjects.php">วิชา</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active  " href="">เช็คชื่อ</a>
  </li>
</ul>
  
<?
    $id = $_GET['subject_id'];
	$name = $_SESSION["name"];
    $teacher = $_SESSION["id"];
    $strSQL = "SELECT sub_manage.subject_ID , sub_manage.subject_name , subjects.star_time , subjects.fin_time , subjects.section , subjects.date 
    FROM sub_manage 
    INNER JOIN subjects ON sub_manage.subject_ID = subjects.subject_id
    WHERE sub_manage.subject_ID LIKE '$id'";
    $objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
?>
<br>



<div >
<?php
      ;
     
		  while($objResult = mysql_fetch_array($objQuery)){
        $sub_id = $objResult["subject_ID"];
        $sub_name = $objResult["subject_name"];
		?>
    
<nav class=" navbar-expand-lg ">
  <a class="navbar-brand"><h1>เช็คชื่อชื่อวิชา  <?echo $sub_name?> กลุ่มที่ <?=$objResult["section"];?></h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
</div>
    <label for="exampleForm2">ครั้งที่</label>
    <input type="text" style = "width:3%" id="exampleForm2" class="form-control">
    <?php
      }
    ?>
<br>

<?
    $strSQL1 = "SELECT * FROM barcode_tb WHERE (stu_id LIKE '%".$_POST["textfield"]."%' OR stu_name LIKE '%".$_POST["textfield"]."%')";
    $objQuery1 = mysql_query($strSQL1) or die ("Error Query[".$strSQL1."]");
?>

<form name="form1" method="post" action="" id="menu">
<div class="form-inline md-form mr-auto mb-4 float-right">
  <input name="textfield" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
  <button class="btn btn-elegant btn-rounded btn-sm my-0" type="submit">Search</button>
  </div>
<div class="table-responsive" width="955" height="200" >
        <table class="table" width="955" height="200" border="0">     
    <thead>
      <tr>
        <th bgcolor="#CCCCCC" scope="col">#</th>
        <th bgcolor="#CCCCCC" scope="col">รหัสวิชา</th>
        <th bgcolor="#CCCCCC" scope="col">ชื่อวิชา</th>
        <th bgcolor="#CCCCCC" scope="col">กลุ่ม</th>
        <th bgcolor="#CCCCCC" scope="col">หน่วยกิต</th>
        <th bgcolor="#CCCCCC" scope="col">วัน</th>
        <th bgcolor="#CCCCCC" scope="col">เวลา</th>
        <th bgcolor="#CCCCCC" scope="col">เช็คชื่อ</th>
      </tr>
    </thead>
    
    <?php
      $a=1;
     
		  while($objResult1 = mysql_fetch_array($objQuery1)){
		?>
    
    <tbody>
      <tr>
            <td bgcolor="#FFCC66"><?echo $a;?></td>
            <td bgcolor="#FFCC66"> <?=$objResult1["stu_id"];?></td>
            <td bgcolor="#FFCC66"> <?=$objResult1["stu_name"];?></td>
            <td bgcolor="#FFCC66"> <?=$objResult1["stu_dep"];?></td>
            <td bgcolor="#FFCC66"></td>
            <td bgcolor="#FFCC66"></td>
            <td bgcolor="#FFCC66"></td>
            <td bgcolor="#FFCC66"></td>
      </tr>
    </tbody>
    
    <?
     $a++; }
    ?>
    
    <thead>
      <tr>
      <td colspan="11" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
    </thead>
  </table>
</div>
</form>
</div>
</div>   
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3.3.1.min"></script>
</body>
    </div>
</html>