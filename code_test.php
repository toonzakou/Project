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

   $remark = $_POST['remark'];
   $date = DateThai('$strDate');

  

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

      echo 'ไม่ติ๊กถูก';
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

            echo 'ติ๊กถูก';
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
  
  
    echo 'ติ๊กถูกมาก';
  
    echo date('H:i',$start_t)."-".date('H:i',$fin_t)." ".date('H:i',$late_time);
    
    
  
  }

?>