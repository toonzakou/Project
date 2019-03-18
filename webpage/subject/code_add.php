<?
include "../../db_config.php";
ob_start();
   session_start();
$sub_id = $_POST['txtid'];  
$stu_id = $_POST['selected'];
$stu_name = $_POST['stu_name'];

// เพิ่มลงฐานข้อมูล
$strSQL = "INSERT INTO new_sub set  new_sub_id = '' , sub_id = '$sub_id' , stu_id = '$stu_id'";

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
				echo "<script language='javascript'>alert('ผิดพลาด');</script>";
	
}

?>