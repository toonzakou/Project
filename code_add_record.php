<?
include "db_config.php";
ob_start();
   session_start();
   date_default_timezone_set('Asia/Bangkok');
    /*เก็บ SESSION ของรหัสวิชา*/ 
   /*$_SESSION["sub_id"] = $objResult["subject_ID"];*/
   $id = $_SESSION["subject_ID"]; 
   /*เก็บ SESSION ของกลุ่ม*/ 
   /*$_SESSION["section"] = $objResult["section"];*/
   $sec = $_SESSION["section"];

   $_SESSION["no"] = $_POST['txtno'];
   $num = $_SESSION["no"];

   $name = $_SESSION["name"];
   $teacher = $_SESSION["id"];

   $strSQL = "SELECT sub_manage.subject_ID , sub_manage.subject_name , subjects.star_time , subjects.fin_time , subjects.section , subjects.date 
   FROM sub_manage 
   INNER JOIN subjects ON sub_manage.subject_ID = subjects.sub_id
   WHERE sub_manage.subject_ID LIKE '$id' AND subjects.section = '$sec'";
    $objQuery = mysql_query($strSQL);
    $objResult = mysql_fetch_array($objQuery);
        $_SESSION["stu_id"] = $_POST['inputcode'];
        $stu =  $_SESSION["stu_id"];
       $sub_id = $objResult["subject_ID"];
       $sub_name = $objResult["subject_name"];
       $start = $objResult["star_time"];
       $fin = $objResult["fin_time"];
       $start_t = strtotime($start);
       $fin_t = strtotime($fin);
       $late_t = strtotime($start) + 900;

       if (date('H') <= date('H',$late_t)) {
        $quiz = 1;
        $late = 0;
        $miss = 0;
      } else {
        $quiz = 0;
        $late = 1;
        $miss = 0;
      } 
echo "ครั้งที่ ".$num." รหัสวิชา ".$id." กลุ่ม ".$sec." รหัสนักเรียน ".$stu." มาทัน ".$quiz." สาย ".$late." ขาด ".$miss;
?>
<?php

/*$strSQL = "INSERT INTO subjects set  id = '' , section = '$sec', sub_id = '$sub_id' , full_id = '$primary', teacher_id ='$teac_id' , star_time ='$start' , fin_time='$fin' , date='$date'";

$objQuery = mysql_query($strSQL);

if($objQuery)
{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo "<script language='javascript'>alert('เปลี่ยนแปลงข้อมูลเรียบร้อยแล้ว');</script>";
				echo"<script> window.location ='../../homepage2.php'</script>";
}
else
{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo "<script language='javascript'>alert('โง่');</script>";
	
}*/

?>


