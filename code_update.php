<?
include "db_config.php";

$remark = $_POST['txtremark'];
$full = $_POST['txtfull'];
$sec = $_POST['txtsec'];
$sub_id =  $_POST['txtsub'];
$num = $_POST['txtnum'];
$stu = $_POST['txtid'];
$new = $full.$num;


$upSQL = "UPDATE attend_tb SET date = '$remark' 
WHERE new_full_id = '$new' AND stu_id = '$stu'";

$objQuery = mysql_query($upSQL);

if($objQuery)
{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo"<script> window.location ='attend.php?sub_id=$sub_id&section=$sec&full_id=$full'</script>";
}
else
{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
                echo "<script language='javascript'>alert('ผิดพลาด');</script>";
                echo"<script> window.location ='insert_stu.php'</script>";
	
}

?>