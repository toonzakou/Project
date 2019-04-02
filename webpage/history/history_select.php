
<?

include "../../db_config.php";
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
      
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/bootstrap-reboot.css" rel="stylesheet">
    <link href="../../css/bootstrap-reboot.min.css" rel="stylesheet">
    <link href="../../css/mdb.min.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>ระบบเช็คชื่อนักศึกษา - เช็คชื่อ</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
  
    </head>
<body>
<div id="wrapper">
    <h1>ระบบเช็คชื่อนักศึกษา</h1>
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
    <a class="nav-link " href="../../homepage2.php">หน้าหลัก</a>
  </li>
  <!--li class="nav-item">
    <a class="nav-link" href="webpage/user/user.php">รายชื่อ</a>
  </li-->
  <li class="nav-item">
    <a class="nav-link " href="webpage/subject/subjects.php">วิชา</a>
  </li>
  <li class="nav-item">
    <a class="nav-link  " href="history.php">ประวัติการสอน</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active  " href="">ประวัติการสอน</a>
  </li>
</ul>
  
<?
  
    $id = $_GET['sub_id'];
    $sec = $_GET['section'];
	$name = $_SESSION["name"];
    $teacher = $_SESSION["id"];
    $full = $_GET['full_id'];
    $num = $_POST['selected'];
    
    $strSQL = "SELECT sub_manage.subject_ID , attend_subject.full_id , sub_manage.subject_name , attend_subject.start_t , attend_subject.fin_t 
    , attend_subject.section  , attend_subject.num , attend_subject.date , attend_subject.late_t , attend_subject.room , attend_subject.total , attend_subject.quiz , attend_subject.come , attend_subject.late
    , attend_subject.miss
    FROM sub_manage 
    INNER JOIN attend_subject ON sub_manage.subject_ID = attend_subject.sub_id
    WHERE attend_subject.full_id = '$full'";
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
      

    

       
        
       
        
		?>


    
<nav class=" navbar-expand-lg ">
<?
$num = $_GET['num'];
if($num == 0){
?>
  <a class="navbar-brand"><h1>การสอนรายวิชา  <?echo $sub_name?> กลุ่มที่ <?=$objResult["section"];?> </h1></a>
<?
} else {
?>
  <a class="navbar-brand"><h1>การสอนรายวิชา  <?echo $sub_name?> กลุ่มที่ <?=$objResult["section"];?> ครั้งที่  <?echo $num?> วันที่  <?=$objResult["date"];?>    </h1></a>
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

$full_id = $_GET['full_id'];

$strSQL1 = "SELECT sub_manage.subject_ID , attend_subject.full_id , sub_manage.subject_name , attend_subject.start_t , attend_subject.fin_t 
, attend_subject.section  , attend_subject.num , attend_subject.date , attend_subject.late_t , attend_subject.room , attend_subject.total , attend_subject.quiz , attend_subject.come , attend_subject.late
, attend_subject.miss
FROM sub_manage 
INNER JOIN attend_subject ON sub_manage.subject_ID = attend_subject.sub_id
WHERE attend_subject.full_id = '$full_id' AND attend_subject.num = '$num'";
$objQuery1 = mysql_query($strSQL1) or die ("Error Query[".$strSQL1."]");

$objResult1 = mysql_fetch_array($objQuery1);


 $start = $objResult1["start_t"];
        $fin = $objResult1["fin_t"];
        $late_t = $objResult1['late_t'];
        $start_t = strtotime($start);
        $fin_t = strtotime($fin);

        $total = $objResult1['total'];
        $quiz = $objResult1['quiz'];
        $come = $objResult1['come'];
        $late = $objResult1['late'];
        $miss = $objResult1['miss'];


  
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


      function Redirect(select)
      { 
      window.location = 'history_select.php?full_id='+document.form1.txt_full.value+'&num='+document.form1.selected.value;
      }
     

</script>

<form name="form1" class="form-horizontal" method="post"  action="" id="menu" >

  <!--Grid row-->
<div class="row">

<!--Grid column-->
<div class="col-sm-2">
    <label for="exampleForm2">ครั้งที่สอน</label>
    <select name="selected" class="form-control" id="sel1" onchange = 'Redirect(this)'>
                          <option value = "">ครั้งที่</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
          </select>
     
</div>

<!--Grid column-->
<div class="col-sm-2">
    <label for="exampleForm2">ห้องเรียน</label>
    <input type="text" name = "txtroom" id="txtroom" autocomplete=off  class="form-control" value = "<?=$objResult1["room"];?>">
    <input name="txt_full" type="text" id="txt_full" class="form-control" style="display: none" value="<?=$objResult["full_id"];?>" />
</div>
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
        <input name="txt_late" type="text" id="txt_late" class="form-control" style="display: none" value="<?echo date('h:i',$late_t)?>" />
</div>
<!--Grid column-->

</div>
<!--Grid row--> 

<br>

<script type="text/javascript">


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
                } else if (document.getElementById('txtroom').value==""
                 || document.getElementById('txtroom').value==undefined)
                {
                    alert ("กรุณากรอกห้องสอน");
                    document.form1.txtroom.focus();	
                    return false;
                } else {
                  document.form1.action = "code_add_record.php"
                  document.form1.submit();
                }
                return true;

              }
                
          

function check_miss()
            {
              var r = confirm("ยืนยันการเพิ่มคนขาด\nโปรดตรวจสอบข้อมูลให้ถูกต้อง")
              if (r == true) {
                if (document.getElementById('txtno').value==""
                 || document.getElementById('txtno').value==undefined)
                {
                    alert ("กรุณากรอกครั้งที่สอน");
                    document.form1.txtno.focus();	
                    return false;
                } else if (document.getElementById('txtroom').value==""
                 || document.getElementById('txtroom').value==undefined)
                {
                    alert ("กรุณากรอกห้องสอน");
                    document.form1.txtroom.focus();	
                    return false;
                }else {
                  document.form1.action = "code_add_miss.php"
                  document.form1.submit();
                }
                return true;
            } else {
              
            }
            }  


      function check_save()
            {
              var r = confirm("ยืนยันการบันทึก\nโปรดตรวจสอบข้อมูลให้ถูกต้อง")
              if (r == true) {
                
                  document.form1.action = "save_attend.php"
                  document.form1.submit();
                
                return true;
            } else {
              
            }
            }  



</script>

  <br>
<?

$strSQL2 = "SELECT DISTINCT attend_tb.stu_id , attend_tb.sub_id , attend_tb.num , attend_tb.quiz , attend_tb.late , attend_tb.miss , attend_tb.section , attend_tb.time , new_sub.stu_name , attend_tb.date 
FROM attend_tb 
INNER JOIN new_sub ON attend_tb.stu_id = new_sub.stu_id

WHERE attend_tb.full_id = '$full_id' AND attend_tb.num ='$num'";
$objQuery2 = mysql_query($strSQL2) or die ("Error Query[".$strSQL2."]");
$Num_Rows = mysql_num_rows($objQuery2);

?>
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
        <th bgcolor="#CCCCCC" scope="col">หมายเหตุ</th>
        
      
      </tr>
    </thead>
    
<? 
    if($Num_Rows==0){
?>
 
 <td  colspan="8" bgcolor="#FFCC66">ยังไม่มีการเช็คชื่อ</td>


<?
}else{
$a=1;
while($objResult2 = mysql_fetch_array($objQuery2))
{
	?>
         <tbody>
      <tr>
            <td bgcolor="#FFCC66"><?echo $a;?></td>
            <td bgcolor="#FFCC66"> <?=$objResult2["stu_id"];?></td>
            <td bgcolor="#FFCC66"> <?=$objResult2["stu_name"];?></td>
            <td bgcolor="#FFCC66"> <?=$objResult2["time"];?></td>
            <td bgcolor="#FFCC66"> <?=$objResult2["quiz"];?></td>
            <td bgcolor="#FFCC66"> <?=$objResult2["late"];?></td>
            <td bgcolor="#FFCC66"> <?=$objResult2["miss"];?></td>
            <td bgcolor="#FFCC66"> <?=$objResult2["date"];?></td>
           </tr>
    </tbody>
          <?
$a++;}

}
?>
    <thead>
      <tr>
      <td colspan="8" bgcolor="#CCCCCC"><label name="totaltxt" id = "totaltxt" class ="bluetext" value = "">นักศึกษาทั้งหมด <?echo $total?> คน</label> <label name = 'cometxt' value = "">มาเรียน <?echo $come;?></label><label name ='quiztxt' value = ""> คน Quiz <?echo $quiz;?> คน</label> <label name ='latetxt' class ="redtext" value = "" >สาย <?echo $late?> คน </label> <label name ='misstxt' value = ""> ขาด <?echo $miss;?> คน</label>
</td>
      </tr>
    </thead>
  </table>
    <div class="md-form mb-0 float-right">
    <button name = "miss_button" type="submit" value="Submit" onclick="return check_miss();" class="btn btn-elegant">ปริ้นรายงาน</button>
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
        <script src="../../js/bootstrap.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/jquery-3.3.1.min"></script>
</body>
    </div>
</html>