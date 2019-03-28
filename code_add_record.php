<?
include "db_config.php";
ob_start();
   session_start();
   date_default_timezone_set('Asia/Bangkok');

   function DateThai($strDate)
   {
     $strYear = date("Y",strtotime($strDate))+543;
     $strMonth= date("n",strtotime($strDate));
     $strDay= date("j",strtotime($strDate));
     $strHour= date("H",strtotime($strDate));
     $strMinute= date("i",strtotime($strDate));
     $strSeconds= date("s",strtotime($strDate));
     $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
     $strMonthThai=$strMonthCut[$strMonth];
     return "$strDay $strMonthThai $strYear";
   }
 
   $strDate = $strDay." ".$strMonthThai." ".$strYear ;

   $_SESSION["stu_id"] = $_POST['inputcode'];
   $stu =  $_SESSION["stu_id"];
     /*เก็บ SESSION ของรหัสวิชา*/ 
   /*$_SESSION["sub_id"] = $objResult["subject_ID"];*/
   $id = $_SESSION["subject_ID"]; 
   /*เก็บ SESSION ของกลุ่ม*/ 
   /*$_SESSION["section"] = $objResult["section"];*/
   $sec = $_SESSION["section"];

   $_SESSION["no"] = $_POST['txtno'];
   $num = $_SESSION["no"];

   $full =  $_SESSION["full_id"];

   $newfull = $full.$num;
   $_SESSION['new_full'] = $newfull;

   $name = $_SESSION["name"];
   $teacher = $_SESSION["id"];

   $late_time = $_SESSION['late_time'];
  $fin_time = $_SESSION['fin_t'];
  $cur_t = date('H');
  $date = DateThai('$strDate');
?>

<?
/*echo $stu." ".$id." ".$sec;*/
$strSQL = "SELECT * FROM new_sub
WHERE stu_id = '$stu' AND sub_id = '$id' AND section = '$sec'";
/*echo $strSQL;*/
 $objQuery = mysql_query($strSQL);
 $objResult = mysql_fetch_array($objQuery);
$Num_Rows = mysql_num_rows($objQuery);

$strSQL1 = "SELECT * FROM attend_tb
WHERE stu_id = '$stu' AND new_full_id = '$newfull'";
/*echo $strSQL;*/
 $objQuery1 = mysql_query($strSQL1);
 $objResult1 = mysql_fetch_array($objQuery1);
$Num_Rows1 = mysql_num_rows($objQuery1);

if($Num_Rows==0){
  echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
  echo "<script language='javascript'>alert('ไม่มีข้อมูลกรุณาเพิ่มข้อมูล');</script>";
  echo"<script> window.location ='insert_attend.php'</script>";
  /*echo "<meta http-equiv='refresh' content='0;URL=webpage/user/user.php'>";*/
}else {
    if ($Num_Rows1 != 0){
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    echo "<script language='javascript'>alert('ไม่สามารถเช็คชื่อซ้ำได้');</script>";
    echo"<script> window.location ='attend.php?sub_id=$id&section=$sec&full_id=$full'</script>";
   } else {

    if($num==1){

      if (date('H:i') <= date('H:i',$late_time)) {
        $quiz = 1;
        $late = 0;
        $miss = 0;
        $time = date('H:i:s');
        $strSQL1 = "INSERT INTO attend_quiz set  num = '$num', full_id = '$full' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , quiz ='$quiz' , time = '$time'  ";

        $strSQL4 = "INSERT INTO attend_tb set  num = '$num' , full_id = '$full' , new_full_id = '$newfull' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , quiz = '$quiz' , late = '$late' , miss ='$miss' , time = '$time' , date = '$date' ";

        $objQuery1 = mysql_query($strSQL1);
        $objQuery4 = mysql_query($strSQL4);
        
        if($objQuery1 ||  $objQuery4) 
        {
         /* echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
                echo "<script language='javascript'>alert('เปลี่ยนแปลงข้อมูลเรียบร้อยแล้ว');</script>";*/
                echo"<script> window.location ='attend.php?sub_id=$id&section=$sec&full_id=$full'</script>";
        }
        else
        {
          echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
                echo "<script language='javascript'>alert('โง่');</script>";
          
        }   

      } else {
        $quiz = 0;
        $late = 1;
        $miss = 0;
        $time = date('H:i:s');
        
        $strSQL2 = "INSERT INTO attend_late set  num = '$num', full_id = '$full' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , late ='$late' , time = '$time'  ";

        $strSQL4 = "INSERT INTO attend_tb set  num = '$num' , full_id = '$full' , new_full_id = '$newfull' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , quiz = '$quiz' , late = '$late' , miss ='$miss' , time = '$time' , date = '$date' ";

       
        $objQuery2 = mysql_query($strSQL2);
       
        $objQuery4 = mysql_query($strSQL4);
        
        if($objQuery2 ||  $objQuery4) 
        {
          /*echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
                echo "<script language='javascript'>alert('เปลี่ยนแปลงข้อมูลเรียบร้อยแล้ว');</script>";*/
                echo"<script> window.location ='attend.php?sub_id=$id&section=$sec&full_id=$full'</script>";
        }
        else
        {
          echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
                echo "<script language='javascript'>alert('โง่');</script>";
          
        }   

      }



    }else{

      if (date('H:i') <= date('H:i',$late_time)) {
        $no = $num - 1;
    
        $strSQL4 = "SELECT *
        FROM attend_tb
        WHERE sub_id LIKE '$id' AND section = '$sec' AND num = '$no' AND stu_id LIKE '$stu'";
        
    
        $objQuery4 = mysql_query($strSQL4) or die ("Error Query[".$strSQL4."]");
        $objResult = mysql_fetch_array($objQuery4);
        $quiz = $objResult["quiz"];
        $late = $objResult["late"];
        $miss = $objResult["miss"];
        $quiz_t = $quiz + 1;
    
        $time = date('H:i:s');
        
        $strSQL2 = "INSERT INTO attend_quiz set  num = '$num', stu_id = '$stu' , sub_id = '$id', section ='$sec' , quiz ='$quiz_t' , time = '$time'  ";
    
        $strSQL6 = "INSERT INTO attend_tb set  num = '$num' , full_id = '$full' , new_full_id = '$newfull' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , quiz = '$quiz_t' , late = '$late' , miss ='$miss' , time = '$time' , date = '$date' ";

        $strSQL5 = "INSERT INTO attend_temp set  num = '$num' , full_id = '$full' , new_full_id = '$newfull' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , quiz = '$quiz_t' , late = '$late' , miss ='$miss' , time = '$time' , date = '$date' ";

       
        $objQuery2 = mysql_query($strSQL2);
       
        $objQuery6 = mysql_query($strSQL6);

        $objQuery5 = mysql_query($strSQL5);
        
        if($objQuery2 ||  $objQuery6 ||  $objQuery5){
    
          /*echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
          echo "<script language='javascript'>alert('เปลี่ยนแปลงข้อมูลเรียบร้อยแล้ว');</script>";*/
          echo"<script> window.location ='attend.php?sub_id=$id&section=$sec&full_id=$full'</script>";
        }else{
          echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
          echo "<script language='javascript'>alert('โง่');</script>";
        }
    
      } else {
        $no = $num - 1;
    
        $strSQL4 = "SELECT *
        FROM attend_tb
        WHERE sub_id LIKE '$id' AND section = '$sec' AND num = '$no' AND stu_id LIKE '$stu'";
        
    
        $objQuery4 = mysql_query($strSQL4) or die ("Error Query[".$strSQL4."]");
        $objResult = mysql_fetch_array($objQuery4);
        $quiz = $objResult["quiz"];
        $late = $objResult["late"];
        $miss = $objResult["miss"];
        $late_t = $late + 1;
    
        $time = date('H:i:s');
        
        $strSQL2 = "INSERT INTO attend_late set  num = '$num', full_id = '$full' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , late ='$late_t' , time = '$time'  ";
        
        $strSQL5 = "INSERT INTO attend_tb set  num = '$num' , full_id = '$full' , new_full_id = '$newfull' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , quiz = '$quiz' , late = '$late_t' , miss ='$miss' , time = '$time' , date = '$date' ";

        $strSQL6 = "INSERT INTO attend_temp set  num = '$num' , full_id = '$full' , new_full_id = '$newfull' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , quiz = '$quiz' , late = '$late_t' , miss ='$miss' ";

       
        $objQuery2 = mysql_query($strSQL2);
       
        $objQuery6 = mysql_query($strSQL6);

        $objQuery5 = mysql_query($strSQL5);
        
        if($objQuery2 ||  $objQuery6 ||  $objQuery5){
    
          /*echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
          echo "<script language='javascript'>alert('เปลี่ยนแปลงข้อมูลเรียบร้อยแล้ว');</script>";*/
          echo"<script> window.location ='attend.php?sub_id=$id&section=$sec&full_id=$full'</script>";
        }else{
          echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
          echo "<script language='javascript'>alert('โง่');</script>";
        }
    
    
      }
    

    }


   }
        
       
  
}

?>
