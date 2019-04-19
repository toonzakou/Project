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
   $make_mark = $_POST['txt_make'];
   $remark = $_POST['remark'];
   $date = DateThai('$strDate');

$prefix_utf8["ว่าที่ร้อยตรี"]=39; 
$prefix_utf8["ว่าที่ รต."]=26; // นับอักขระไทยได้ 8 ตัว คูณด้วย 3 = 24 บวกกับช่องว่าง และ จุด(.) อีก 2 รวมเป็น 26
$prefix_utf8["จ่าอากาศ"]=24; 
$prefix_utf8["นางสาว"]=18;
$prefix_utf8["นาย"]=9;
$prefix_utf8["นาง"]=9;
$prefix_utf8["น.ส."]=8;

foreach($prefix_utf8 as $key => $val){
}
$index =1;
$strSQL2 = "SELECT *
FROM new_sub WHERE stu_id = '$stu'";

$objQuery = mysql_query($strSQL2) or die ("Error Query[".$strSQL2."]");
$fullname_utf8 = array();

while(($row =  mysql_fetch_assoc($objQuery))) {
$fullname_utf8[] = $row['stu_name'];
}
foreach($fullname_utf8 as $individual){
	foreach($prefix_utf8 as $key => $keylength){
		if(strstr($individual , $key)){			
			$output[$index]["title"] = substr($individual,0,$keylength);
			$individual = substr($individual,$keylength);
			list($output[$index]["firstName"],$output[$index]["lastName"]) = explode(" ",trim($individual));
		}
  }
	$index++;
}


$first = $output[1]["firstName"];
/*print_r($output);*/



  

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
      /*echo date('H:i',$_SESSION['start'])."-".date('H:i',$_SESSION['fin'])."-".date('H:i',$_SESSION['late']);*/
      
      
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
            $_SESSION['mark'] = $make_mark;
            $_SESSION['time_cout'] = 1;

           /* echo 'ติ๊กถูก';*/
           /* echo date('H:i',$_SESSION['start'])."-".date('H:i',$_SESSION['fin'])."-".date('H:i',$_SESSION['late']);*/
      
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
  
   /* echo date('H:i',$start_t)."-".date('H:i',$fin_t)." ".date('H:i',$late_time);
*/    
    
  
  }

?>

<?
/*echo $stu." ".$id." ".$sec;*/
$strSQL = "SELECT * FROM new_sub
WHERE stu_id = '$stu' AND sub_id = '$id' AND section = '$sec'";
/*echo $strSQL;*/
 $objQuery = mysql_query($strSQL);
 $objResult = mysql_fetch_array($objQuery);
 $status = $objResult['status'];
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

    if ($status != 'ปกติ') {

      echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
      echo "<script language='javascript'>alert('ไม่สามารถเช็คชื่อได้เนื่องจากมีสถานะผิดปกติโปรดติดต่ออาจารผู้สอน');</script>";
    echo"<script> window.location ='attend.php?sub_id=$id&section=$sec&full_id=$full'</script>";
    
    } else if($num==1){

      if (date('H:i') <= date('H:i',$late_time)) {
        $quiz = 1;
        $late = 0;
        $miss = 0;
        $time = date('H:i');
        $strSQL1 = "INSERT INTO attend_quiz set  num = '$num', full_id = '$full' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , quiz ='$quiz' , time = '$time'  ";

        $strSQL4 = "INSERT INTO attend_tb set  num = '$num' , full_id = '$full' , new_full_id = '$newfull' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , quiz = '$quiz' , late = '$late' , miss ='$miss' , time = '$time' , date = '-' , first_name = '$first' ";

        $strSQL5 = "INSERT INTO attend_temp set  num = '$num' , full_id = '$full' , new_full_id = '$newfull' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , quiz = '$quiz_t' , late = '$late' , miss ='$miss' , time = '$time' , date = '-' , first_name = '$first' ";

        $objQuery1 = mysql_query($strSQL1);
        $objQuery4 = mysql_query($strSQL4);
        $objQuery5 = mysql_query($strSQL5);
        
        if($objQuery1 ||  $objQuery4) 
        {
         /* echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
                echo "<script language='javascript'>alert('เปลี่ยนแปลงข้อมูลเรียบร้อยแล้ว');</script>";*/
                echo"<script> window.location ='attend.php?sub_id=$id&section=$sec&full_id=$full'</script>";
        }
        else
        {
          echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
                echo "<script language='javascript'>alert('ผิดพลาด');</script>";
          
        }   

      } else {

        if($remark==""){
        $_SESSION['tmp_id'] =  $_SESSION["stu_id"];
        $_SESSION['count_late'] = 1 ;
          echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
           echo "<script language='javascript'>alert('กรุณากรอกเหตุผลที่มาสาย');</script>";
           echo"<script> window.location ='attend.php?sub_id=$id&section=$sec&full_id=$full'</script>";
           
         } else {

          $quiz = 0;
        $late = 1;
        $miss = 0;
        $time = date('H:i');
        $_SESSION['count_late'] = 1 ;
        
        $strSQL2 = "INSERT INTO attend_late set  num = '$num', full_id = '$full' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , late ='$late' , time = '$time'  ";

        $strSQL4 = "INSERT INTO attend_tb set  num = '$num' , full_id = '$full' , new_full_id = '$newfull' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , quiz = '$quiz' , late = '$late' , miss ='$miss' , time = '$time' , date = '$remark' , first_name = '$first' ";

        $strSQL5 = "INSERT INTO attend_temp set  num = '$num' , full_id = '$full' , new_full_id = '$newfull' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , quiz = '$quiz_t' , late = '$late' , miss ='$miss' , time = '$time' , date = '$remark' , first_name = '$first' ";

       
        $objQuery2 = mysql_query($strSQL2);
       
        $objQuery4 = mysql_query($strSQL4);

        $objQuery5 = mysql_query($strSQL5);
        
        if($objQuery2 ||  $objQuery4) 
        {
          $_SESSION['tmp_id'] = '';
          /*echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
                echo "<script language='javascript'>alert('เปลี่ยนแปลงข้อมูลเรียบร้อยแล้ว');</script>";*/
                echo"<script> window.location ='attend.php?sub_id=$id&section=$sec&full_id=$full'</script>";
        }
        else
        {
          echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
                echo "<script language='javascript'>alert('ผิดพลาด');</script>";
          
        }

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
    
        $time = date('H:i');
        
        $strSQL2 = "INSERT INTO attend_quiz set  num = '$num' , full_id = '$full' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , quiz ='$quiz_t' , time = '$time'  ";
    
        $strSQL6 = "INSERT INTO attend_tb set  num = '$num' , full_id = '$full' , new_full_id = '$newfull' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , quiz = '$quiz_t' , late = '$late' , miss ='$miss' , time = '$time' , date = '-' , first_name = '$first' ";

        $strSQL5 = "INSERT INTO attend_temp set  num = '$num' , full_id = '$full' , new_full_id = '$newfull' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , quiz = '$quiz_t' , late = '$late' , miss ='$miss' , time = '$time' , date = '-' , first_name = '$first' ";

       
        $objQuery2 = mysql_query($strSQL2);
       
        $objQuery6 = mysql_query($strSQL6);

        $objQuery5 = mysql_query($strSQL5);
        
        if($objQuery2 ||  $objQuery6 ||  $objQuery5){
    
          /*echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
          echo "<script language='javascript'>alert('เปลี่ยนแปลงข้อมูลเรียบร้อยแล้ว');</script>";*/
          echo"<script> window.location ='attend.php?sub_id=$id&section=$sec&full_id=$full'</script>";
        }else{
          echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
          echo "<script language='javascript'>alert('ผิดพลาด');</script>";
        }
    
      } else {


        if($remark==""){
          $_SESSION['tmp_id'] =  $_SESSION["stu_id"];
          $_SESSION['count_late'] = 2 ;
         echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
          echo "<script language='javascript'>alert('กรุณากรอกเหตุผลที่มาสาย');</script>";
          echo"<script> window.location ='attend.php?sub_id=$id&section=$sec&full_id=$full'</script>";
          
        } else {

          $no = $num - 1;
          $_SESSION['count_late'] = 1 ;
    
        $strSQL4 = "SELECT *
        FROM attend_tb
        WHERE sub_id LIKE '$id' AND section = '$sec' AND num = '$no' AND stu_id LIKE '$stu'";
        
    
        $objQuery4 = mysql_query($strSQL4) or die ("Error Query[".$strSQL4."]");
        $objResult = mysql_fetch_array($objQuery4);
        $quiz = $objResult["quiz"];
        $late = $objResult["late"];
        $miss = $objResult["miss"];
        $late_t = $late + 1;
    
        $time = date('H:i');
        
        $strSQL2 = "INSERT INTO attend_late set  num = '$num', full_id = '$full' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , late ='$late_t' , time = '$time'  ";
        
        $strSQL5 = "INSERT INTO attend_tb set  num = '$num' , full_id = '$full' , new_full_id = '$newfull' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , quiz = '$quiz' , late = '$late_t' , miss ='$miss' , time = '$time' , date = '$remark' , first_name = '$first' ";

        $strSQL6 = "INSERT INTO attend_temp set  num = '$num' , full_id = '$full' , new_full_id = '$newfull' , stu_id = '$stu' , sub_id = '$id', section ='$sec' , quiz = '$quiz' , late = '$late_t' , miss ='$miss'  , time = '$time' , date = '$remark' , first_name = '$first'  ";

       
        $objQuery2 = mysql_query($strSQL2);
       
        $objQuery6 = mysql_query($strSQL6);

        $objQuery5 = mysql_query($strSQL5);
        
        if($objQuery2 ||  $objQuery6 ||  $objQuery5){
          $_SESSION['tmp_id'] = '';
          /*echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
          echo "<script language='javascript'>alert('เปลี่ยนแปลงข้อมูลเรียบร้อยแล้ว');</script>";*/
          echo"<script> window.location ='attend.php?sub_id=$id&section=$sec&full_id=$full'</script>";
        }else{
          echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
          echo "<script language='javascript'>alert('ผิดพลาด');</script>";
        }

        }
        
    
    
      }
    

    }


   }
        
       
  
}

?>
