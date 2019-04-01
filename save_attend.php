<?
include "db_config.php";
ob_start();
   session_start();

   $full_id = $_SESSION["full_id"];
   $sub_id = $_SESSION["subject_ID"];
   $sec = $_SESSION["section"];
   $num = $_SESSION['no'];
   $room = $_SESSION['room'];
   $total = $_SESSION['total'];
   $quiz = $_SESSION['quiz'];
   $late = $_SESSION['late'];
   $miss = $_SESSION['miss'];
   $start_t = $_POST['txt_start'];
   $fin_t = $_POST['txt_fin'];
   $late_t = $_POST['txt_late'];
   $date = $_SESSION['date'];
   


// เพิ่มลงฐานข้อมูล
$strSQL = "INSERT INTO attend_subject 
set   
section = '$sec', sub_id = '$sub_id', full_id = '$full_id' , room = '$room', num = '$num' 
, total = '$total' , quiz = '$quiz' , late = '$late' , miss = '$miss' , start_t = '$start_t' 
, fin_t = '$fin_t' , late_t = '$late_t' , date = '$date'  ";

$objQuery = mysql_query($strSQL);

if($objQuery)
{
   echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
   echo "<script language='javascript'>alert('บันทึกเสร็จสิ้น กดปุ่มเพื่อกลับสู่หน้าหลัก');</script>";
				echo"<script> window.location ='homepage2.php'</script>";
}
else
{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
                echo "<script language='javascript'>alert('ผิดพลาด');</script>";
                echo"<script> window.location ='insert_stu.php'</script>";
	
}

?>