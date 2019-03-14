<?
include "../../db_config.php";
$delSQL = "DELETE FROM subjects WHERE id=".$_GET['id'];
$objQuery = mysql_query($delSQL);
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo "<script language='javascript'>alert('คุณลบข้อมูลเรียบร้อยแล้ว');</script>";
				echo "<meta http-equiv='refresh' content='0;URL=../../homepage2.php'>";
?>