<?
include "../../db_config.php";

$tel = $_POST['txttel'];
$full = $_POST['txtfull'];
$name = $_POST['txtname'];
$stu = $_POST['txtid'];
$status = $_POST['selected'];


$upSQL = "UPDATE new_sub SET stu_name = '$name' , tel ='$tel' , status = '$status'
WHERE full_id = '$full' AND stu_id = '$stu'";



$objQuery = mysql_query($upSQL);

if($objQuery)
{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo"<script> window.location ='subject_detail.php?full_id=$full'</script>";
}
else
{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
                echo "<script language='javascript'>alert('ผิดพลาด');</script>";
                echo"<script> window.location ='update_stu.php?full_id=$full&stu_id=$stu'</script>";
	
}

?>