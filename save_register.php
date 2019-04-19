<?php
	include "db_config.php";
	
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
		
		$strSQL = "INSERT INTO teachers (teach_id,name,teac_dep,user,password) VALUES ('".$_POST["txtid"]."', 
		'".$_POST["txtname"]."','".$_POST["txtdep"]."','".$_POST["txtuser"]."','".$_POST["txtpass"]."')";
		$objQuery = mysql_query($strSQL);
		
		echo "Register Completed!<br>";		
	
		echo "<br> Go to <a href='index.html'>Login page</a>";
		
	}

	mysql_close();
?>