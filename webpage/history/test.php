
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
    <div class="float-right"><h3><span style="text-align: right"><small>ยินดีต้อนรับ&nbsp;<font color="#0000FF"><u><?=$_SESSION["name"];?></u></font>&nbsp;สู่ระบบ | <a href="logout.php"><font color="#636363">Logout</font></a></small></span></h3>
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
    <a class="nav-link " href="../subject/subjects.php">วิชา</a>
  </li>
  <li class="nav-item">
    <a class="nav-link  " href="history.php">ประวัติการสอน</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active  " href="">ประวัติการสอน</a>
  </li>
</ul>
  
<?
  
    
    $full = $_GET['full_id'];
    $strSQL = "SELECT sub_manage.subject_ID , attend_subject.full_id , sub_manage.subject_name , attend_subject.start_t , attend_subject.fin_t 
    , attend_subject.section  , attend_subject.num , attend_subject.date , attend_subject.late_t , attend_subject.room , attend_subject.total , attend_subject.quiz , attend_subject.come , attend_subject.late
    , attend_subject.miss
    FROM sub_manage 
    INNER JOIN attend_subject ON sub_manage.subject_ID = attend_subject.sub_id
    WHERE attend_subject.full_id = '$full' ";
    $objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
    $objResult = mysql_fetch_array($objQuery);
    $sub_name = $objResult['subject_name'];

    
?>
<br>
<div >
<nav class=" navbar-expand-lg ">

  <a class="navbar-brand"><h1>การสอนรายวิชา  <?echo $sub_name?> กลุ่มที่ <?=$objResult["section"];?> </h1></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
      </div>

<script language="javascript">
      function Redirect(select)
      { 
      window.location = 'history_select.php?full_id='+document.form1.txt_full.value+'&num='+document.form1.selected.value;
      }
</script>

<form name="form1" class="form-horizontal" method="POST"  action="" id="menu" >

  <!--Grid row-->
<div class="row">

<!--Grid column-->
<div class="col-sm-2">
    <label for="exampleForm2">ครั้งที่สอน</label>
    <input name="txt_num" type="text" id="txt_num" class="form-control"  value="" />
  
</div>

<!--Grid column-->
<div class="col-sm-2">
    <label for="exampleForm2">ห้องเรียน</label>
    <input type="text" name = "txtroom" id="txtroom" autocomplete=off  class="form-control" value = "<?=$objResult1["room"];?>">
    <input name="txt_full" type="text" id="txt_full" class="form-control" style="display: none"  />
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
                
                  document.form1.action = "../../fpdf/report.php"
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

WHERE (attend_tb.full_id LIKE '%".$_POST["txt_num"]."%' AND attend_tb.num LIKE '%".$_POST["txt_num"]."%')
ORDER BY attend_tb.time ASC";
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
    <button name = "miss_button" type="submit" value="Submit" onclick="" class="btn btn-elegant">ปริ้นรายงาน</button>
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