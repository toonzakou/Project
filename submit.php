<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<script language="javascript">
function fncSubmit()
{
	if(document.form1.txt1.value == "")
	{
		alert('Please input Input 1');
		document.form1.txt1.focus();
		return false;
	}	
	if(document.form1.txt2.value == "")
	{
		alert('Please input Input 2');
		document.form1.txt2.focus();		
		return false;
	}	
	document.form1.submit();
}
</script>
<form action="homepage2.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">
Input 1 <input name="txt1" type="text"><br>
Input 2 <input name="txt2" type="text"><br>
<input name="btnSubmit1" type="submit" value="Submit" >
</form>
</body>
</html>