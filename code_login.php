<?
include "db_config.php";
ob_start();
   session_start();
	
	$strSQL = "SELECT * FROM teachers WHERE user = '".$_POST["txtUsername"]."' and password = '".$_POST["txtPassword"]."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult){
		echo "<script>alert('No User ID in System!');window.location = 'index.html'</script>";
}
	else{
		$_SESSION["teac_id"] = $objResult["teac_id"];
		/*$_SESSION["code"] = $objResult["code"];*/
		$_SESSION["username"] = $objResult["username"];
		$_SESSION["password"] = $objResult["username"];
		$_SESSION["name"] = $objResult["name"];
		
		/*$_SESSION["department"] = $objResult["department"];*/
		$_SESSION["status"] = $objResult["status"];
		
session_write_close();	
	
		if ($_SESSION["status"] == 'admin'){
			echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo "<script language='javascript'>alert('Welcome To System');</script>";
				echo "<meta http-equiv='refresh' content='0;URL=webpage/admin/homepage.php'>";

		} else{
			echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo "<script language='javascript'>alert('Welcome To System');</script>";
				echo "<meta http-equiv='refresh' content='0;URL=homepage2.php'>";
		}
			
	}
mysql_close();
?>