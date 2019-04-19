<?
include "../../db_config.php";
$name = $_POST['txtname'];
$sub_id = $_POST['txtid'];
$credit = $_POST['txtcredit'];


$upSQL = "UPDATE sub_manage SET subject_name = '$name' , subject_credit='$credit'
 WHERE subject_ID = '$sub_id' ";


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