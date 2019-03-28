<?
include "db_config.php";
ob_start();
   session_start();

   $stu_id = $_POST['stuid'];
   $stu_name = $_POST['stuname'];
   $sub_id = $_POST['txtid'];
   $sec = $_POST['txtsec'];
   $full = $_POST['txtfull'];
   


// เพิ่มลงฐานข้อมูล
$strSQL = "INSERT INTO new_sub set full_id = '$full',   section = '$sec', sub_id = '$sub_id', stu_id = '$stu_id' , stu_name = '$stu_name'";

$objQuery = mysql_query($strSQL);

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