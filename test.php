<?
include "db_config.php";
ob_start();
   session_start();
   date_default_timezone_set('Asia/Bangkok');

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

   $_SESSION["stu_id"] = $_POST['inputcode'];
   $stu =  $_SESSION["stu_id"];
     /*เก็บ SESSION ของรหัสวิชา*/ 
   /*$_SESSION["sub_id"] = $objResult["subject_ID"];*/
   $id = $_SESSION["subject_ID"]; 
   /*เก็บ SESSION ของกลุ่ม*/ 
   /*$_SESSION["section"] = $objResult["section"];*/
   $sec = $_SESSION["section"];

   $_SESSION["no"] = $_POST['txtno'];
   $num = $_SESSION["no"];

   $full =  $_SESSION["full_id"];

   $newfull = $full.$num;
   $_SESSION['new_full'] = $newfull;

   $name = $_SESSION["name"];
   $teacher = $_SESSION["id"];

   $late_time = $_SESSION['late_time'];
  $fin_time = $_SESSION['fin_t'];
  $cur_t = date('H');
  $date = DateThai('$strDate');

  $strSQL1 = "SELECT * FROM attend_tb
WHERE stu_id = '$stu' AND new_full_id = '$newfull'";
/*echo $strSQL;*/
 $objQuery1 = mysql_query($strSQL1);
$Num_Rows1 = mysql_num_rows($objQuery1);

while($objResult = mysql_fetch_array($objQuery1)){

$full_id =  $_SESSION["full_id"];
$sec = $objResult["section"];
$stu_id = $objResult["stu_id"];
$count = $objResult["num"];
$sub_id = $objResult["sub_id"];
$quiz = $objResult["quiz"];
$late = $objResult["late"];
$miss = $objResult["miss"];

echo $full_id." ".$sec." ".$count." ".$stu_id." ".$sub_id." ".$miss." ".'<br>';
}

if($Num_Rows1==0){
  echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
  echo "<script language='javascript'>alert('ไม่มีข้อมูลกรุณาเพิ่มข้อมูล');</script>";
  /*echo "<meta http-equiv='refresh' content='0;URL=webpage/user/user.php'>";*/
}else{
  echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
  echo "<script language='javascript'>alert('มีแล้ว');</script>";

}
?>




