<?
include "../../db_config.php";
ob_start();
   session_start();
   
$year = $_POST['txtyear'];
$term = $_POST["txtterm"];
$sub_id = $_POST['select_id'];  
$sec = $_POST['txtsec'];
$start = $_POST['start_time'];
$fin = $_POST['fin_time'];
$date = $_POST['selected'];
$teac_id = $_SESSION["teac_id"];
$primary = $year.$term.$sub_id.$sec;

// เพิ่มลงฐานข้อมูล
$strSQL = "INSERT INTO subjects set  year = '$year' , term = '$term' , section = '$sec', sub_id = '$sub_id' , full_id = '$primary', teacher_id ='$teac_id' , star_time ='$start' , fin_time='$fin' , date_t='$date'";

$objQuery = mysql_query($strSQL);

if($objQuery)
{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo "<script language='javascript'>alert('เปลี่ยนแปลงข้อมูลเรียบร้อยแล้ว');</script>";
				echo"<script> window.location ='subjects.php'</script>";
}
else
{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo "<script language='javascript'>alert('ผิดพลาด');</script>";
				echo"<script> window.location ='insert_subject.php'</script>";
			
}

?>