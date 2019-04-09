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

   $_SESSION["room"] = $_POST['txtroom'];
   $room = $_SESSION["room"];


   $full =  $_SESSION["full_id"];

   $newfull = $full.$num;
   $_SESSION['new_full'] = $newfull;

   $name = $_SESSION["name"];
   $teacher = $_SESSION["id"];

   

  
?>

<?

if ($_SESSION['time_cout'] ==0){

   
  
  if(empty($_POST["makeup_check"]) ) {

  
    $strSQL = "SELECT * 
    FROM subjects 
    WHERE full_id = '$full'";
    $objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
    $objResult = mysql_fetch_array($objQuery);
    $start = $objResult["star_time"];
    $fin = $objResult["fin_time"];
  
    $start_t = strtotime($start);
    $fin_t = strtotime($fin);
    $late_time = strtotime($start) + 900;
    $_SESSION['late'] = $late_time;
    $_SESSION['start'] = $start_t;
    $_SESSION['fin'] = $fin_t;

    /*echo 'ไม่ติ๊กถูก';*/
    echo date('H:i',$_SESSION['start'])."-".date('H:i',$_SESSION['fin'])."-".date('H:i',$_SESSION['late']);
    
    
      }else { 

        $start = $_POST['txt_start'];
        $fin = $_POST['txt_fin'];
      
        $strSQL = "INSERT INTO time_temp set full_id='$full' , start_time ='$start' , fin_time='$fin' ";
      
        $objQuery = mysql_query($strSQL);
    
      
        $strSQL = "SELECT * 
        FROM time_temp 
        WHERE full_id = '$full'";
        $objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
        $objResult = mysql_fetch_array($objQuery);
        $start = $objResult["start_time"];
        $fin = $objResult["fin_time"];
          $start_t = strtotime($start);
          $fin_t = strtotime($fin);
          $late_time = strtotime($start) + 900;
          $_SESSION['start'] = $start_t;
          $_SESSION['fin'] = $fin_t;
          $_SESSION['late'] = $late_time;
          $_SESSION['time_cout'] = 1;

         /* echo 'ติ๊กถูก';*/
          echo date('H:i',$_SESSION['start'])."-".date('H:i',$_SESSION['fin'])."-".date('H:i',$_SESSION['late']);
    
      }
      /**/

  
} else {
 
  $strSQL = "SELECT * 
  FROM time_temp 
  WHERE full_id = '$full'";
  $objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
  $objResult = mysql_fetch_array($objQuery);
  $start = $objResult["start_time"];
  $fin = $objResult["fin_time"];
    $start_t = strtotime($start);
    $fin_t = strtotime($fin);
    $late_time = strtotime($start) + 900;
    $_SESSION['start'] = $start_t;
    $_SESSION['fin'] = $fin_t;
    $_SESSION['late'] = $late_time;


 /* echo 'ติ๊กถูกมาก';*/

  echo date('H:i',$start_t)."-".date('H:i',$fin_t)." ".date('H:i',$late_time);
  
  

}

if ($num==1){

  $strSQL =" SELECT  DISTINCT   new_sub.stu_id , new_sub.stu_name , new_sub.full_id , new_sub.section ,  new_sub.sub_id ,attend_temp.num , attend_temp.miss , attend_temp.late , attend_temp.quiz 
  FROM            new_sub
  LEFT OUTER JOIN attend_temp ON new_sub.stu_id = attend_temp.stu_id
  WHERE           attend_temp.stu_id IS NULL AND new_sub.full_id ='$full' AND new_sub.status ='ปกติ'  ";
  
  $objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
  $Num_Rows = mysql_num_rows($objQuery);


$a=1;
  while($objResult = mysql_fetch_array($objQuery)){
  
  $full_id =  $_SESSION["full_id"];
  $sec = $objResult["section"];
  $stu_id = $objResult["stu_id"];
  $sub_id = $objResult["sub_id"];
  #echo $a." รหัสเต็ม ".$full_id." กลุ่ม ".$sec." รอบ ".$num." ".$stu_id." ".$sub_id." ".'<br>';

     $quiz = 0;
      $late = 0;
      $miss = 1;
      $time = date('H:i');
      $strSQL1 = "INSERT INTO attend_miss set  num = '$num', full_id = '$full_id' , stu_id = '$stu_id' , sub_id = '$sub_id', section ='$sec' , miss ='$miss' , time = '$time'  ";

      $strSQL4 = "INSERT INTO attend_tb set  num = '$num' , full_id = '$full_id' , new_full_id = '$newfull' , stu_id = '$stu_id' , sub_id = '$sub_id', section ='$sec' , quiz = '$quiz' , late = '$late' , miss ='$miss' , time = '$time' , date = 'ขาดเรียน' ";

      $objQuery1 = mysql_query($strSQL1);
      $objQuery4 = mysql_query($strSQL4);
    $a++;}
    $i=$a; 
    if($i = $a) 
      {
        $strSQL5 = "DELETE FROM attend_temp";
        $objQuery5 = mysql_query($strSQL5);
              echo"<script> window.location ='attend.php?sub_id=$sub_id&section=$sec&full_id=$full_id'</script>";
      }
      else
      {
        echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
              echo "<script language='javascript'>alert('ผิดพลาด');</script>";
        
      }  

}else{

$new_num = $num - 1 ;  


$strSQL =" SELECT  DISTINCT   new_sub.stu_id , new_sub.stu_name , new_sub.full_id , new_sub.section ,  new_sub.sub_id ,attend_tb.num , attend_tb.miss , attend_tb.late , attend_tb.quiz 
FROM            new_sub
LEFT OUTER JOIN attend_tb ON new_sub.stu_id = attend_tb.stu_id
LEFT OUTER JOIN attend_temp ON new_sub.stu_id = attend_temp.stu_id
WHERE           attend_temp.stu_id IS NULL AND attend_tb.num = '$new_num'  AND new_sub.full_id ='$full' AND new_sub.status ='ปกติ' ";

$objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);


$a=1;
while($objResult = mysql_fetch_array($objQuery)){

$full_id =  $_SESSION["full_id"];
$sec = $objResult["section"];
$stu_id = $objResult["stu_id"];
$count = $objResult["num"] + 1;
$sub_id = $objResult["sub_id"];
$quiz = $objResult["quiz"];
$late = $objResult["late"];
$miss = $objResult["miss"];
$sum_miss = $miss + 1;
if ($late <> 0){

}
/*echo $a." รหัสเต็ม ".$full_id." กลุ่ม ".$sec." รอบ ".$count." ".$stu_id." ".$sub_id." ".'<br>';*/


   
 $time = date('H:i');
  $strSQL1 = "INSERT INTO attend_miss set  num = '$num', full_id = '$full_id' , stu_id = '$stu_id' , sub_id = '$sub_id', section ='$sec' , miss ='$sum_miss' , time = '$time'  ";

    $strSQL4 = "INSERT INTO attend_tb set  num = '$num' , full_id = '$full_id' , new_full_id = '$newfull' , stu_id = '$stu_id' , sub_id = '$sub_id', section ='$sec' , quiz = '$quiz' , late = '$late' , miss ='$sum_miss' , time = '$time' , date = 'ขาดเรียน' ";

    $objQuery1 = mysql_query($strSQL1);
    $objQuery4 = mysql_query($strSQL4);
  $a++;}
 $i=$a; 
  if($i = $a) 
    {
      $strSQL5 = "DELETE FROM attend_temp";
      $objQuery5 = mysql_query($strSQL5);
   
            echo"<script> window.location ='attend.php?sub_id=$sub_id&section=$sec&full_id=$full_id'</script>";
    }
    else
    {
      echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
            echo "<script language='javascript'>alert('ผิดพลาด');</script>";
      
    }

}




?>
