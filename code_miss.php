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

  /*$strSQL =" SELECT   new_sub.stu_id , new_sub.stu_name , new_sub.full_id , new_sub.section ,  new_sub.sub_id
  FROM            new_sub
  LEFT OUTER JOIN attend_tb ON new_sub.stu_id = attend_tb.stu_id
  WHERE           attend_tb.stu_id IS NULL";

  $objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
  $Num_Rows = mysql_num_rows($objQuery);


$a=1;
  while($objResult = mysql_fetch_array($objQuery)){
  
  $full_id =  $_SESSION["full_id"];
  $sec = $objResult["section"];
  $stu_id = $objResult["stu_id"];
  $sub_id = $objResult["sub_id"];
  echo $full_id." ".$sec." ".$num." ".$stu_id." ".$sub_id." ";

     $quiz = 0;
      $late = 0;
      $miss = 1;
      $time = date('H:i:s');
      $strSQL1 = "INSERT INTO attend_miss set  num = '$num', full_id = '$full_id' , stu_id = '$stu_id' , sub_id = '$sub_id', section ='$sec' , miss ='$miss' , time = '$time'  ";

      $strSQL4 = "INSERT INTO attend_tb set  num = '$num' , full_id = '$full_id' , new_full_id = '$newfull' , stu_id = '$stu_id' , sub_id = '$sub_id', section ='$sec' , quiz = '$quiz' , late = '$late' , miss ='$miss' , time = '$time' , date = '$date' ";

      $objQuery1 = mysql_query($strSQL1);
      $objQuery4 = mysql_query($strSQL4);
    $a++;}
    $i=$a; 
    if($i = $a) 
      {
      
              echo"<script> window.location ='attend.php?sub_id=$sub_id&section=$sec&full_id=$full_id'</script>";
      }
      else
      {
        echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
              echo "<script language='javascript'>alert('โง่');</script>";
        
      }  */
?>

<?

if ($num==1){

  $strSQL =" SELECT   new_sub.stu_id , new_sub.stu_name , new_sub.full_id , new_sub.section ,  new_sub.sub_id
  FROM            new_sub
  LEFT OUTER JOIN attend_tb ON new_sub.stu_id = attend_tb.stu_id
  WHERE           attend_tb.stu_id IS NULL";

  $objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
  $Num_Rows = mysql_num_rows($objQuery);


$a=1;
  while($objResult = mysql_fetch_array($objQuery)){
  
  $full_id =  $_SESSION["full_id"];
  $sec = $objResult["section"];
  $stu_id = $objResult["stu_id"];
  $sub_id = $objResult["sub_id"];
  echo $full_id." ".$sec." ".$num." ".$stu_id." ".$sub_id." ";

     $quiz = 0;
      $late = 0;
      $miss = 1;
      $time = date('H:i:s');
      $strSQL1 = "INSERT INTO attend_miss set  num = '$num', full_id = '$full_id' , stu_id = '$stu_id' , sub_id = '$sub_id', section ='$sec' , miss ='$miss' , time = '$time'  ";

      $strSQL4 = "INSERT INTO attend_tb set  num = '$num' , full_id = '$full_id' , new_full_id = '$newfull' , stu_id = '$stu_id' , sub_id = '$sub_id', section ='$sec' , quiz = '$quiz' , late = '$late' , miss ='$miss' , time = '$time' , date = '$date' ";

      $objQuery1 = mysql_query($strSQL1);
      $objQuery4 = mysql_query($strSQL4);
    $a++;}
    $i=$a; 
    if($i = $a) 
      {
      
              echo"<script> window.location ='attend.php?sub_id=$sub_id&section=$sec&full_id=$full_id'</script>";
      }
      else
      {
        echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
              echo "<script language='javascript'>alert('โง่');</script>";
        
      }  

}else{

$new_num = $num - 1 ;  

$strSQL1 = "SELECT DISTINCT attend_tb.stu_id , attend_tb.sub_id , attend_tb.num , attend_tb.quiz , attend_tb.late , attend_tb.miss , attend_tb.section , attend_tb.time , new_sub.stu_name  
FROM attend_tb 
INNER JOIN new_sub ON attend_tb.stu_id = new_sub.stu_id

WHERE attend_tb.full_id = '$full' AND attend_tb.num ='$num' AND attend_tb.late = '$num'";

$objQuery1 = mysql_query($strSQL1) or die ("Error Query[".$strSQL1."]");
$objResult1 = mysql_fetch_array($objQuery1);

$stu = $objResult1["stu_id"];

$strSQL =" SELECT  DISTINCT   new_sub.stu_id , new_sub.stu_name , new_sub.full_id , new_sub.section ,  new_sub.sub_id ,attend_tb.num , attend_tb.miss , attend_tb.late , attend_tb.quiz
FROM            new_sub
LEFT OUTER JOIN attend_tb ON new_sub.stu_id = attend_tb.stu_id
WHERE           attend_tb.num = '$new_num' AND attend_tb.stu_id <> '$stu'";

$objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);


$a=1;
while($objResult = mysql_fetch_array($objQuery)){

$full_id =  $_SESSION["full_id"];
$sec = $objResult["section"];
$stu_id = $objResult["stu_id"];
$count = $objResult["num"];
$sub_id = $objResult["sub_id"];
$quiz = $objResult["quiz"];
$late = $objResult["late"];
$miss = $objResult["miss"];
$sum_miss = $miss + 1;
if ($late <> 0){

}
echo $stu."----".$full_id." ".$sec." ".$count." ".$stu_id." ".$sub_id." ".$late." ".$sum_miss." ".'<br>';


   
 /*$time = date('H:i:s');
   $strSQL1 = "INSERT INTO attend_miss set  num = '$num', full_id = '$full_id' , stu_id = '$stu_id' , sub_id = '$sub_id', section ='$sec' , miss ='$sum_miss' , time = '$time'  ";

    $strSQL4 = "INSERT INTO attend_tb set  num = '$num' , full_id = '$full_id' , new_full_id = '$newfull' , stu_id = '$stu_id' , sub_id = '$sub_id', section ='$sec' , quiz = '$quiz' , late = '$late' , miss ='$sum_miss' , time = '$time' , date = '$date' ";

    $objQuery1 = mysql_query($strSQL1);
    $objQuery4 = mysql_query($strSQL4);*/
  $a++;}
  /*$i=$a; 
  if($i = $a) 
    {
     echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
            echo "<script language='javascript'>alert('เปลี่ยนแปลงข้อมูลเรียบร้อยแล้ว');</script>";
            echo"<script> window.location ='attend.php?sub_id=$sub_id&section=$sec&full_id=$full_id'</script>";
    }
    else
    {
      echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
            echo "<script language='javascript'>alert('โง่');</script>";
      
    }*/

}




?>
