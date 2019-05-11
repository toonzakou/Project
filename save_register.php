<?php
	include "db_config.php";
	ob_start();
   session_start();
	$id = $_POST['txtid'];
		$name = $_POST['txtname'];
		$dep = $_POST['txtdep'];
		$user = $_POST['txtuser'];
		$pass = $_POST['txtpass'];
	if(trim($_POST["txtuser"]) == "")
	{
		echo "กรุณากรอกชื่อผู้ใช้";
		exit();	
	}
	
	if(trim($_POST["txtpass"]) == "")
	{
		echo "กรุณากรอกรหัสผ่าน";
		exit();	
	}	
		
	if($_POST["txtpass"] != $_POST["txtconpass"])
	{
		echo "รหัสผ่านไม่ตรงกัน";
		exit();
	}
	
	if(trim($_POST["txtname"]) == "")
	{
		echo "กรุณากรอกชื่อ";
		exit();	
	}	
	
	$strSQL = "SELECT * FROM teachers WHERE user = '".trim($_POST['txtuser'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
			echo "มีชื่อผู้ใช้ในระบบแล้ว";
	}
	else
	{	
		
		
		$strSQL1 = "INSERT INTO teachers set teac_id = '$id', name = '$name', teac_dep = '$dep', user = '$user' , password = '$pass' , status = 'teacher'";

		$objQuery1 = mysql_query($strSQL1);
		
		if($objQuery1)
		{
		echo "Register Completed!<br>";		
	
		echo "<br> Go to <a href='index.html'>Login page</a>";
		}
		else
		{
		echo "Register Failed!<br>";	
		echo $strSQL1	;
		}
		
		
		}

	mysql_close();
?>