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
        echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
        echo "<script language='javascript'>alert('กรุณากรอกข้อมูลให้ครบถ้วน');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=signup.php'>";
        exit();
	}
	
	if(trim($_POST["txtpass"]) == "")
	{
        echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
        echo "<script language='javascript'>alert('กรุณากรอกข้อมูลให้ครบถ้วน');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=signup.php'>";
        exit();
	}	
		
	if($_POST["txtpass"] != $_POST["txtconpass"])
	{
        echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
        echo "<script language='javascript'>alert('กรุณากรอกรหัสผ่านให้ตรงกัน');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=signup.php'>";
        exit();
	}
	
	if(trim($_POST["txtname"]) == "")
	{
        echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
        echo "<script language='javascript'>alert('กรุณากรอกข้อมูลให้ครบถ้วน');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=signup.php'>";
        exit();
	}	
	
	$strSQL = "SELECT * FROM teachers WHERE user = '".trim($_POST['txtuser'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
            echo "มีชื่อผู้ใช้ในระบบแล้ว";
            echo "<meta http-equiv='refresh' content='0;URL=signup.php'>";
            exit();
	}
	else
	{	
		
		
		$strSQL1 = "INSERT INTO teachers set teac_id = '$id', name = '$name', teac_dep = '$dep', user = '$user' , password = '$pass' , status = 'teacher'";

		$objQuery1 = mysql_query($strSQL1);
		
		if($objQuery1)
		{
            echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
            echo "<script language='javascript'>alert('ลงทะเบียนเสร็จสิ้น');</script>";
            echo "<meta http-equiv='refresh' content='0;URL=index.html'>";
		}
		else
		{
            echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
            echo "<script language='javascript'>alert('ลงทะเบียนไม่สำเร็จ');</script>";
		}
		
		
		}

	mysql_close();
?>