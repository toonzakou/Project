<?
include "../../db_config.php";
$full_id = $_POST['txtfull'];
$sub_id = $_POST['txtid'];
$date = $_POST['selected'];
$start = $_POST['start_time'];
$fin = $_POST['fin_time'];
$sec = $_POST['txtsec'];
$year = $_POST['txtyear'];
$term = $_POST['txtterm'];
$new_full = $year.$term.$sub_id.$sec;

$upSQL = "UPDATE new_sub SET full_id = '$new_full' , section='$sec'
 WHERE full_id = '$full_id' ";

echo $upSQL;
$upSQL1 = "UPDATE subjects SET full_id = '$new_full' , date_t='$date' ,star_time='$start' ,fin_time='$fin' ,section='$sec'
 WHERE full_id = '$full_id' ";
$objQuery = mysql_query($upSQL);
$objQuery1 = mysql_query($upSQL1);

if($objQuery || $objQuery1)
{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo "<script language='javascript'>alert('เปลี่ยนแปลงข้อมูลเรียบร้อยแล้ว');</script>";
				echo"<script> window.location ='subjects.php'</script>";
}
else
{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo "<script language='javascript'>alert('ผิดพลาด');</script>";
	
}

?>