<?
include "../../db_config.php";
$delSQL = "DELETE FROM subjects WHERE id=".$_GET['id'];
$objQuery = mysql_query($delSQL);
$full = $_GET['full_id'];
$delSQL1 = "DELETE FROM new_sub WHERE full_id = '$full'";
$objQuery1 = mysql_query($delSQL1);

if($objQuery1){
	
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
echo "<script language='javascript'>alert('คุณลบข้อมูลเรียบร้อยแล้ว');</script>";
echo "<meta http-equiv='refresh' content='0;URL=subjects.php'>";
} else {
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
echo "<script language='javascript'>alert('ผิดพลาด');</script>";
}
?>