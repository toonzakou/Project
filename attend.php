
<?

include "db_config.php";
date_default_timezone_set('Asia/Bangkok');
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
  <!--li class="nav-item">
    <a class="nav-link" href="webpage/user/user.php">รายชื่อ</a>
  </li-->
  <li class="nav-item">
    <a class="nav-link " href="webpage/subject/subjects.php">วิชา</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active  " href="">เช็คชื่อ</a>
  </li>
</ul>
  
<?
    $id = $_GET['sub_id'];
    $sec = $_GET['section'];
	$name = $_SESSION["name"];
    $teacher = $_SESSION["id"];
    $strSQL = "SELECT sub_manage.subject_ID , sub_manage.subject_name , subjects.star_time , subjects.fin_time , subjects.section , subjects.date 
    FROM sub_manage 
    INNER JOIN subjects ON sub_manage.subject_ID = subjects.sub_id
    WHERE sub_manage.subject_ID LIKE '$id' AND subjects.section = '$sec'";
    $objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
?>
<br>



<div >
<?php
      ;
     
		  while($objResult = mysql_fetch_array($objQuery)){
        $_SESSION["subject_ID"] = $objResult["subject_ID"];
        $_SESSION["section"] = $objResult["section"];
        $sub_name = $objResult["subject_name"];
        $start = $objResult["star_time"];
        $fin = $objResult["fin_time"];
        $start_t = strtotime($start);
        $fin_t = strtotime($fin);
        $late = strtotime($start) + 900;
		?>
    
<nav class=" navbar-expand-lg ">
  <a class="navbar-brand"><h1>เช็คชื่อชื่อวิชา  <?echo $sub_name?> กลุ่มที่ <?=$objResult["section"];?></h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
      </div>
    <?php
      }
    ?>
<?
  
    $strSQL1 = "SELECT * FROM barcode_tb WHERE (stu_id LIKE '%".$_POST["textfield"]."%' OR stu_name LIKE '%".$_POST["textfield"]."%')";
    $objQuery1 = mysql_query($strSQL1) or die ("Error Query[".$strSQL1."]");
?>

<script language="javascript">
function fncSubmit()
{
	if(document.form1.txtno.value == "")
	{
		alert('กรุณากรอกครั้งที่สอน');
		document.form1.txtno.focus();
		return false;
	}	
	if(document.form1.inputcode.value == "")
	{
		alert('กรอกรหัสนักศึกษา');
		document.form1.inputcode.focus();		
		return false;
	}	
	document.form1.submit();
}
</script>

<form name="form1" class="form-horizontal" method="post" action="code_add_record.php" id="menu" onSubmit="JavaScript:return fncSubmit();">

  <!--Grid row-->
<div class="row">

<!--Grid column-->
<div class="col-sm-2">
    <label for="exampleForm2">ครั้งที่สอน</label>
    <input type="text" name = "txtno" id="txtno" class="form-control">
</div>
<!--Grid column-->

</div>
<!--Grid row--> 

<br>

 <!--Grid row-->
 <div class="row">

<!--Grid column-->
<div class="col-sm-2">
        <label for="exampleForm2">เวลาสอน</label>
        <input type="text" id="txt_time" name="txt_time" class="form-control" value="<?echo date('h:i:s', $start_t)?> - <?echo date('h:i:s', $fin_t)?>">
    
</div>
<!--Grid column-->

</div>
<!--Grid row--> 

<br>

<!--Grid row-->
<div class="row">
  <div class="col-md-8">
    
      <label for="subject" class="">กรอกรหัสนักศึกษา</label>
      <input type="text" id="inputcode" name="inputcode" class="form-control">
 
  </div>

  <!--Grid column-->
<div class="col-sm-2">
    <div class="md-form mb-0">
    <button type="submit" value="Submit" class="btn btn-elegant">เช็คชื่อ</button>
    </div>
</div>
<!--Grid column-->
</div>
<!--Grid row-->

  <br>

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
    <?
    if (date('H') > date('H',$late)) {
      $pre2pm = 5;
    } else {
      $pre2pm = 10;
    }
    
    ?>        
            <td bgcolor="#FFCC66"><?echo $pre2pm?></td>
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