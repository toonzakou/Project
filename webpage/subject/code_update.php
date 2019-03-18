<?
include "../../db_config.php";
$id = $_GET['id'];
$name = $_GET['txtname'];
$upSQL = "UPDATE subjects SET date='".$_POST['selected']."' ,star_time='".$_POST['start_time']."' ,fin_time='".$_POST['fin_time']."' ,section='".$_POST['txtsec']."'
 WHERE id = '".$_GET["id"]."'";
$objQuery = mysql_query($upSQL);

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