
<?

include "db_config.php";
date_default_timezone_set('Asia/Bangkok');
ob_start();
 session_start();
 
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
	
?>

<html>
<div class="container-fluid">
<head>
      
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap-reboot.css" rel="stylesheet">
    <link href="css/bootstrap-reboot.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>ระบบเช็คชื่อนักศึกษา - เช็คชื่อ</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
  
    </head>
<body>
<div id="wrapper">
    <h1>ระบบเช็คชื่อนักศึกษา</h1>
    <div class="float-right"><h3><span style="text-align: right"><small>Welcome&nbsp;<font color="#0000FF"><u><?=$_SESSION["name"];?></u></font>&nbsp;to System | <a href="logout.php"><font color="#636363">Logout</font></a></small></span></h3>
</div><br>

    <div class="container-fluid">

<!--ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="homepage2.php">หน้าหลัก</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="user.php">รายชื่อ</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="subjects.php">วิชา</a>
  </li>
  </ul-->
  
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " onclick="check_back()" href="#">หน้าหลัก</a>
  </li>
  <!--li class="nav-item">
    <a class="nav-link" href="webpage/user/user.php">รายชื่อ</a>
  </li-->
  <li class="nav-item">
    <a class="nav-link " onclick="check_back1()" href="#">วิชา</a>
  </li>
  <li class="nav-item">
    <a class="nav-link  " onclick="check_back2()" href="#">ประวัติการสอน</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active  "  href="">เช็คชื่อ</a>
  </li>
</ul>
  


</div>
    
<?

  /*  // กำหนดคำนำหน้าไว้ก่อน ว่าต้องการตัดสรรพนามอะไรบ้าง 

$prefix_utf8["ว่าที่ รต."]=26;  // นับอักขระไทยได้ 8 ตัว คูณด้วย 3 = 24 บวกกับช่องว่าง และ จุด(.) อีก 2 รวมเป็น 26
$prefix_utf8["ว่าที่ร้อยตรี"]=39;
$prefix_utf8["นาย"]=9;
$prefix_utf8["นาง"]=9;
$prefix_utf8["นางสาว"]=18;
$prefix_utf8["น.ส."]=8;
$prefix_utf8["ดร."]=7;

$index =1;

// เพิ่มโค้ดในส่วนของการติดต่อ ฐานข้อมูล ที่นี่ครับ

$sql = "SELECT stu_name FROM new_sub ";
$res = mysql_query($sql) or die(mysql_error());

while($fullname_utf8 = mysql_fetch_row($res)){;}

// ส่งเข้าไปเพื่อตัดแยก องค์ประกอบ ออกเป็น คำนำหน้า ชื่อ นามสกุล
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

// ลองพิมพ์ผลลัพธ์ที่ได้ จาก อาร์เรย์ $output
print_r($output);*/

/*
***********************************************
ว่าที่ รต. ประพุทธ ม่วงแพรศรี
ว่าที่ รต.นฤมล แสงบุญ
ว่าที่ร้อยตรีชัยทัศ ทับเที่ยง
นาย อัชวรรณ อุทัยรังษี
*/



  
/*print_r($array);*/
/*
***********************************************
ว่าที่ รต. ประพุทธ ม่วงแพรศรี
ว่าที่ รต.นฤมล แสงบุญ
ว่าที่ร้อยตรีชัยทัศ ทับเที่ยง
นาย อัชวรรณ อุทัยรังษี
*/

$prefix_utf8["ว่าที่ รต."]=26;
$prefix_utf8["ว่าที่ร้อยตรี"]=39;
$prefix_utf8["นางสาว"]=18;
$prefix_utf8["นาย"]=9;
$prefix_utf8["นาง"]=9;

$prefix_utf8["น.ส."]=8;

foreach($prefix_utf8 as $key => $val){
	echo "key[$key] key.length = ".strlen($key)."<br />\n";
}
$index =1;
$strSQL2 = "SELECT *
FROM new_sub WHERE stu_id = '601113836'";

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

/*print_r($output);*/
$strName = $output[1]["firstName"];
echo $strName;

?>


</div>
</div>   
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3.3.1.min"></script>
</body>
    </div>
</html>