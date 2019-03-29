<?
include "db_config.php";
date_default_timezone_set('Asia/Bangkok');
ob_start();
 session_start();
 $full =  $_SESSION["full_id"];

 
 


if ($_SESSION['time_cout'] ==0){

  $start = $_POST['txt_start'];
  $fin = $_POST['txt_fin'];

  $strSQL = "INSERT INTO time_temp set full_id='$full' , start_time ='$start' , fin_time='$fin' ";

  $objQuery = mysql_query($strSQL);

  if(empty($_POST["makeup_check"]) ) {

    echo 'ไม่ได้ติ๊กถูก'.'<br>';
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
    $_SESSION['start'] = $start_t;
    $_SESSION['fin'] = $fin_t;
   /* echo date('H:i',$_SESSION['start'])."-".date('H:i',$_SESSION['fin']);*/
    
    
      }else { 
    
        echo 'ติ๊กถูก'.'<br>';
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
          /*echo date('H:i',$_SESSION['start'])."-".date('H:i',$_SESSION['fin']);*/
    
      }
      $strSQL = "DELETE FROM time_temp ";

      $objQuery = mysql_query($strSQL);

  
} else {

  
  $start = $_SESSION['start'];
  $fin =  $_SESSION['fin'];
  $late_time = $_SESSION['late'];
  

  /*echo 'ติ๊กถูกมาก';

  echo date('H:i',$start)."-".date('H:i',$fin)." ".date('H:i',$late_time);*/
  
  

}

















?>