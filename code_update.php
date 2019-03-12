<?
include "db_config.php";
$id = $_GET['id'];
$name = $_GET['txtname'];
$upSQL = "UPDATE barcode_tb SET stu_name='".$_POST['txtname']."',stu_dep='".$_POST['txtdep']."' WHERE id = '".$_GET["id"]."'";
$objQuery = mysql_query($upSQL);
echo $name;
if($objQuery)
{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo "<script language='javascript'>alert('เปลี่ยนแปลงข้อมูลเรียบร้อยแล้ว');</script>";
				echo"<script> window.location ='homepage2.php'</script>";
}
else
{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo "<script language='javascript'>alert('โง่');</script>";
	
}

?>