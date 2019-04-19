<?
include "../../db_config.php";
$name = $_POST['txtname'];
$teac_id = $_POST['txtid'];
$teac_dep = $_POST['txtdep'];
$user = $_POST['txtuser'];
$pass =  $_POST['txtpass'];
$status = $_POST['selected']; 

$upSQL = "UPDATE teachers SET teac_id = '$teac_id' , name='$name' , teac_dep='$teac_dep' , user='$user' , password='$pass' , status='$status'
 WHERE teac_id = '$teac_id' ";


$objQuery = mysql_query($upSQL);

if($objQuery)
{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo "<script language='javascript'>alert('เปลี่ยนแปลงข้อมูลเรียบร้อยแล้ว');</script>";
				echo"<script> window.location ='homepage.php'</script>";
}
else
{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo "<script language='javascript'>alert('ผิดพลาด');</script>";
	
}

?>