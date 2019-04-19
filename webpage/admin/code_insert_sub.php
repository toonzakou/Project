<?
include "../../db_config.php";
ob_start();
   session_start();


   $name = $_POST['txtname'];
   $sub_id = $_POST['txtid'];
   $credit = $_POST['txtcredit'];

   


// เพิ่มลงฐานข้อมูล
$strSQL = "INSERT INTO sub_manage set   subject_ID = '$sub_id', subject_name = '$name', subject_credit = '$credit' ";

$objQuery = mysql_query($strSQL);

if($objQuery)
{
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    echo "<script language='javascript'>alert('เพิ่มวิชาสำเร็จ');</script>";
				echo"<script> window.location ='homepage.php'</script>";
}
else
{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
                echo "<script language='javascript'>alert('ผิดพลาด');</script>";
                echo"<script> window.location ='insert_sub.php'</script>";
	
}

?>