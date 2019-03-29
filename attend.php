
<?

include "db_config.php";
date_default_timezone_set('Asia/Bangkok');
ob_start();
 session_start();
 
	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}

	$strDate = $strDay." ".$strMonthThai." ".$strYear ;
	
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
    $full = $_GET['full_id'];
    $newfull = $_SESSION['new_full'];
    $strSQL = "SELECT sub_manage.subject_ID , subjects.full_id , sub_manage.subject_name , subjects.star_time , subjects.fin_time , subjects.section , subjects.date 
    FROM sub_manage 
    INNER JOIN subjects ON sub_manage.subject_ID = subjects.sub_id
    WHERE subjects.full_id = '$full'";
    $objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
?>
<br>



<div >
<?php
    

		  $objResult = mysql_fetch_array($objQuery);

        $_SESSION["subject_ID"] = $objResult["subject_ID"];
        $_SESSION["full_id"] = $objResult["full_id"];
        $s_id = $_SESSION["subject_ID"];
        $_SESSION["section"] = $objResult["section"];
        $section = $_SESSION["section"];
        $sub_name = $objResult["subject_name"];
      

    

        $start = $objResult["star_time"];
        $fin = $objResult["fin_time"];
        $start_t = strtotime($start);
        $fin_t = strtotime($fin);
        
        if($_SESSION['time_cout']==0) {

          $start_t = strtotime($start);
          $fin_t = strtotime($fin);
         
          }else { 
            $start_t = $_SESSION['start'];
             
            $fin_t = $_SESSION['fin'];

        
          }
       




       
        
		?>


    
<nav class=" navbar-expand-lg ">
<?
if($_SESSION['time_cout']==0) {
?>  
  <a class="navbar-brand"><h1>เช็คชื่อชื่อวิชา  <?echo $sub_name?> กลุ่มที่ <?=$objResult["section"];?> วันที่ <?echo DateThai($strDate)?></h1></a>
 <?
  }else {
?>
    <a class="navbar-brand"><h1>เช็คชื่อชื่อวิชา  <?echo $sub_name?> (เมคอัพคลาส) กลุ่มที่ <?=$objResult["section"];?> วันที่ <?echo DateThai($strDate)?></h1></a>
<?

  }

?>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
      </div>
    
<?
  
    $strSQL1 = "SELECT DISTINCT attend_tb.stu_id , attend_tb.sub_id , attend_tb.num , attend_tb.quiz , attend_tb.late , attend_tb.miss , attend_tb.section , attend_tb.time , new_sub.stu_name  
    FROM attend_tb 
    INNER JOIN new_sub ON attend_tb.stu_id = new_sub.stu_id
 
    WHERE attend_tb.full_id = '$full' AND attend_tb.num ='$num'";

      $objQuery1 = mysql_query($strSQL1) or die ("Error Query[".$strSQL1."]");
    
   
    $Num_Rows = mysql_num_rows($objQuery1);

  
    $strSQL2 = "SELECT *
    FROM new_sub
    WHERE sub_id LIKE '$id' AND full_id = '$full'";
  
/*$strSQL1 = "SELECT *
FROM attend_tb 
WHERE sub_id LIKE '$s_id' AND section = '$section' AND num = '$num'";*/
    $objQuery2 = mysql_query($strSQL2) or die ("Error Query[".$strSQL2."]");
    $total = mysql_num_rows($objQuery2);

    $strSQL3 = "SELECT *
    FROM attend_quiz
    WHERE full_id = '$full' AND num ='$num'";
    
/*$strSQL1 = "SELECT *
FROM attend_tb 
WHERE sub_id LIKE '$s_id' AND section = '$section' AND num = '$num'";*/
    $objQuery3 = mysql_query($strSQL3) or die ("Error Query[".$strSQL3."]");
    $quiz = mysql_num_rows($objQuery3);

    
    $strSQL4 = "SELECT *
    FROM attend_late
    WHERE full_id = '$full' AND num ='$num'";
    
/*$strSQL1 = "SELECT *
FROM attend_tb 
WHERE sub_id LIKE '$s_id' AND section = '$section' AND num = '$num'";*/
    $objQuery4 = mysql_query($strSQL4) or die ("Error Query[".$strSQL4."]");
    $late = mysql_num_rows($objQuery4);

    $strSQL5 = "SELECT *
    FROM attend_miss
    WHERE full_id = '$full' AND num ='$num'";
    
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

<form name="form1" class="form-horizontal" method="post" action="test.php" id="menu" >

  <!--Grid row-->
<div class="row">

<!--Grid column-->
<div class="col-sm-2">
    <label for="exampleForm2">ครั้งที่สอน</label>
    <input type="text" name = "txtno" id="txtno" class="form-control" value = "<?echo $num?>">
</div>

<!--Grid column-->

</div>
<!--Grid row--> 

<br>

 <!--Grid row-->
 <div class="row">

<!--Grid column-->
<div class="col-sm-2">
        <label for="exampleForm2">เวลาเริ่ม</label>
        <input type="time" id="txt_start" name="txt_start" class="form-control" placeholder="00:00" value="<?echo date('h:i', $start_t)?>" readonly >
    
</div>
<div class="col-sm-2">
        <label for="exampleForm2">เวลาสิ้นสุด</label>
        <input type="time" id="txt_fin" name="txt_fin" class="form-control" placeholder="00:00" value="<?echo date('h:i',$fin_t)?>" readonly>

        <div class="md-form mb-0">
    <button type="submit" value="Submit"   class="btn btn-elegant">เช็คชื่อ</button>
    </div>
 
</div>
<!--Grid column-->

<div class="custom-control custom-checkbox">

<?
if($_SESSION['time_cout']==0) {
?>  
   <input type="checkbox" class="custom-control-input " name ="makeup_check" id="makeup_check" onchange="CheckCheckboxes1(this)"  >
  <label class="custom-control-label" for="makeup_check">เปลี่ยนเวลาการสอน (สำหรับเมคอัพคลาส)</label>
  <input name="txt_check" type="text" id="txt_check" class="form-control" style="display: none"value = "0" />
 <?
  }else {
?>
 <input type="checkbox" class="custom-control-input " name ="makeup_check" id="makeup_check"  onchange="CheckCheckboxes1(this)"  checked>
  <label class="custom-control-label" for="makeup_check">เปลี่ยนเวลาการสอน (สำหรับเมคอัพคลาส)</label>
  <input name="txt_check" type="text" id="txt_check" class="form-control" style="display: none" value="1" />
<?

  }

?>

 
</div>
</div>
<!--Grid row--> 

<br>

<script type="text/javascript">

function CheckCheckboxes1(chk){
    

    if(chk.checked == true)
    {
      txt_start.readOnly = false;
      txt_fin.readOnly = false;
      txt_start.value  ="";
      txt_fin.value  = "";
      txtfull.valu = "1"
    }
    else
    {
      txt_start.readOnly = true;
      txt_fin.readOnly = true;
    }
}

function check_attend()
            {
                if (document.getElementById('txtno').value==""
                 || document.getElementById('txtno').value==undefined)
                {
                    alert ("กรุณากรอกครั้งที่สอน");
                    document.form1.txtno.focus();	
                    return false;
                } else if (document.getElementById('inputcode').value==""
                 || document.getElementById('inputcode').value==undefined){
                  alert ("กรุณากรอกรหัสนักศึกษา");
                  document.form1.inputcode.focus();	
                    return false;
                } else {
                  document.form1.action = "code_add_record.php"
                  document.form1.submit();
                }
                return true;
            }

function check_miss()
            {
                if (document.getElementById('txtno').value==""
                 || document.getElementById('txtno').value==undefined)
                {
                    alert ("กรุณากรอกครั้งที่สอน");
                    document.form1.txtno.focus();	
                    return false;
                } else {
                  document.form1.action = "code_add_miss.php"
                  document.form1.submit();
                }
                return true;
            }           


</script>



<!--Grid row-->
<div class="row">
  <div class="col-md-8">
    
      <label for="subject" class="">กรอกรหัสนักศึกษา</label>
      <input type="text" id="inputcode" name="inputcode" class="form-control" value ="<??>">
 
  </div>

  <!--Grid column-->
<div class="col-sm-2">
    <div class="md-form mb-0">
    <button type="submit" value="Submit" onclick="return check_attend();"  class="btn btn-elegant">เช็คชื่อ</button>
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
        <th bgcolor="#CCCCCC" scope="col">รหัสนักศึกษา</th>
        <th bgcolor="#CCCCCC" scope="col">ชื่อนักศึกษา</th>
        <th bgcolor="#CCCCCC" scope="col">เวลามาเรียน</th>
        <th bgcolor="#CCCCCC" scope="col">Quiz 15 min</th>
        <th bgcolor="#CCCCCC" scope="col">รวมมาสายสะสม</th>
        <th bgcolor="#CCCCCC" scope="col">รวมขาดสะสม</th>
      
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
            <td bgcolor="#FFCC66"> <?=$objResult1["stu_id"];?></td>
            <td bgcolor="#FFCC66"> <?=$objResult1["stu_name"];?></td>
            <td bgcolor="#FFCC66"> <?=$objResult1["time"];?></td>
            <td bgcolor="#FFCC66"> <?=$objResult1["quiz"];?></td>
            <td bgcolor="#FFCC66"> <?=$objResult1["late"];?></td>
            <td bgcolor="#FFCC66"> <?=$objResult1["miss"];?></td>
           </tr>
    </tbody>
          <?
$a++;}

}
?>
    <thead>
      <tr>
      <td colspan="8" bgcolor="#CCCCCC"><label class ="bluetext">นักศึกษาทั้งหมด <?php echo $total;?> คน</label>  มาเรียน <?php echo $Num_Rows;?> คน Quiz <?php echo $quiz;?> คน <label class ="redtext">สาย <?php echo $late;?> คน</label> ขาด <?php echo $miss;?> คน
</td>
      </tr>
    </thead>
  </table>
  <div class="md-form mb-0 float-right">
    <button name = "miss" type="submit" value="Submit" onclick="return check_miss();" class="btn btn-elegant">คนขาด</button>
    </div>
</div>

</form>

<style>
  .redtext{
    color : red;
  }
  .bluetext{
    color : blue;
  }
</style>  
</div>
</div>   
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3.3.1.min"></script>
</body>
    </div>
</html>