<?
include "../../db_config.php";
ob_start();
   session_start();
$sub_id = $_POST['select_id'];  
$name = $_POST['txtsec'];
$start = $_POST['start_time'];
$fin = $_POST['fin_time'];
$date = $_POST['selected'];
$teac_id = $_SESSION["teac_id"];


// เพิ่มลงฐานข้อมูล
$strSQL = "INSERT INTO subjects set  id = '' , section = '$name', subject_id = '$sub_id' , teacher_id ='$teac_id' , star_time ='$start' , fin_time='$fin' , date='$date'";

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
	
}

?>