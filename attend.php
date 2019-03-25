
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
  $num = $_SESSION['no'];
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
    

		  while($objResult = mysql_fetch_array($objQuery)){
        $_SESSION["subject_ID"] = $objResult["subject_ID"];
        $s_id = $_SESSION["subject_ID"];
        $_SESSION["section"] = $objResult["section"];
        $section = $_SESSION["section"];
        $sub_name = $objResult["subject_name"];
        $start = $objResult["star_time"];
        $fin = $objResult["fin_time"];
        $start_t = strtotime($start);
        $_SESSION['fin_t'] = strtotime($fin);
        $_SESSION['late_time'] = strtotime($start) + 900;
        
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
  
    $strSQL1 = "SELECT attend_tb.stu_id , attend_tb.sub_id , attend_tb.num , attend_tb.section , attend_tb.time , new_sub.stu_name  
    FROM attend_tb 
    INNER JOIN new_sub ON attend_tb.stu_id = new_sub.stu_id
 
    WHERE attend_tb.sub_id LIKE '$id' AND attend_tb.section = '$sec' AND attend_tb.num = '$num'";

/*$strSQL1 = "SELECT *
FROM attend_tb 
WHERE sub_id LIKE '$s_id' AND section = '$section' AND num = '$num'";*/
    $objQuery1 = mysql_query($strSQL1) or die ("Error Query[".$strSQL1."]");
    $Num_Rows = mysql_num_rows($objQuery1);

  
    $strSQL2 = "SELECT *
    FROM new_sub
    WHERE sub_id LIKE '$id' AND section = '$sec'";
  
/*$strSQL1 = "SELECT *
FROM attend_tb 
WHERE sub_id LIKE '$s_id' AND section = '$section' AND num = '$num'";*/
    $objQuery2 = mysql_query($strSQL2) or die ("Error Query[".$strSQL2."]");
    $total = mysql_num_rows($objQuery2);

    $strSQL3 = "SELECT *
    FROM attend_quiz
    WHERE sub_id LIKE '$id' AND section = '$sec'";
    
/*$strSQL1 = "SELECT *
FROM attend_tb 
WHERE sub_id LIKE '$s_id' AND section = '$section' AND num = '$num'";*/
    $objQuery3 = mysql_query($strSQL3) or die ("Error Query[".$strSQL3."]");
    $quiz = mysql_num_rows($objQuery3);

    
    $strSQL4 = "SELECT *
    FROM attend_late
    WHERE sub_id LIKE '$id' AND section = '$sec'";
    
/*$strSQL1 = "SELECT *
FROM attend_tb 
WHERE sub_id LIKE '$s_id' AND section = '$section' AND num = '$num'";*/
    $objQuery4 = mysql_query($strSQL4) or die ("Error Query[".$strSQL4."]");
    $late = mysql_num_rows($objQuery4);

    $strSQL5 = "SELECT *
    FROM attend_miss
    WHERE sub_id LIKE '$id' AND section = '$sec'";
    
/*$strSQL1 = "SELECT *
FROM attend_tb 
WHERE sub_id LIKE '$s_id' AND section = '$section' AND num = '$num'";*/
    $objQuery5 = mysql_query($strSQL5) or die ("Error Query[".$strSQL5."]");
    $miss = mysql_num_rows($objQuery5);

    

    $stu_miss = $total - $Num_Rows ;
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
    <input type="text" name = "txtno" id="txtno" class="form-control" value = "<?echo $no_now?>">
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
        <input type="text" id="txt_time" name="txt_time" class="form-control" value="<?echo date('h:i:s', $start_t)?> - <?echo date('h:i:s', $_SESSION['fin_t'])?>">
    
</div>
<!--Grid column-->

</div>
<!--Grid row--> 

<br>

<!--Grid row-->
<div class="row">
  <div class="col-md-8">
    
      <label for="subject" class="">กรอกรหัสนักศึกษา</label>
      <input type="text" id="inputcode" name="inputcode" class="form-control" value ="<??>">
 
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
        <th bgcolor="#CCCCCC" scope="col">รหัสนักศึกษา</th>
        <th bgcolor="#CCCCCC" scope="col">ชื่อนักศึกษา</th>
        <th bgcolor="#CCCCCC" scope="col">เวลามาเรียน</th>
      
      </tr>
    </thead>
    
<? 
    if($Num_Rows==0){
?>
 
 <td  colspan="8" bgcolor="#FFCC66">ยังไม่มีการเช็คชื่อ</td>


<?
}else{
$a=1;
while($objResult1 = mysql_fetch_array($objQuery1))
{
	?>
         <tbody>
      <tr>
            <td bgcolor="#FFCC66"><?echo $a;?></td>
            <td bgcolor="#FFCC66"> <?=$objResult1["sub_id"];?></td>
            <td bgcolor="#FFCC66"> <?=$objResult1["stu_id"];?></td>
            <td bgcolor="#FFCC66"> <?=$objResult1["stu_name"];?></td>
            <td bgcolor="#FFCC66"> <?=$objResult1["time"];?></td>
           </tr>
    </tbody>
          <?
$a++;}

}
?>
    
    
        
    
    
  
    
    <thead>
      <tr>
      <td colspan="8" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
    </thead>
  </table>
</div>

จำนวนทั้งหมด <?php echo $total;?> คน
<br>
มาเรียนทั้งหมด <?php echo $Num_Rows;?> คน
<br>
มาทัน <?php echo $quiz;?> คน
<br>
สาย <?php echo $late;?> คน
<br>
ขาดเรียนทั้งหมด <?php echo $stu_miss;?> คน
</form>
</div>
</div>   
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3.3.1.min"></script>
</body>
    </div>
</html>