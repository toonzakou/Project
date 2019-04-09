
<?

include "../../db_config.php";

ob_start();
 session_start();
	?>
<html>
<div class="container-fluid">
<head>
      
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/bootstrap-reboot.css" rel="stylesheet">
    <link href="../../css/bootstrap-reboot.min.css" rel="stylesheet">
    <link href="../../css/mdb.min.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>ระบบเช็คชื่อนักศึกษา - นักศึกษา</title>
    <link rel="stylesheet" type="text/css" href="../../style.css"/>
  
    </head>
<body>
<div id="wrapper">
    <h1>ระบบเช็คชื่อนักศึกษา</h1>
    <div class="float-right"><h3><span style="text-align: right"><small>ยินดีต้อนรับ&nbsp;<font color="#0000FF"><u><?=$_SESSION["name"];?></u></font>&nbsp;สู่ระบบ | <a href="logout.php"><font color="#636363">Logout</font></a></small></span></h3>
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
    <a class="nav-link " href="../../homepage2.php">หน้าหลัก</a>
  </li>
  <!--li class="nav-item">
    <a class="nav-link" href="../user/user.php">รายชื่อ</a>
  </li-->
  <li class="nav-item">
    <a class="nav-link " href="subjects.php">วิชา</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="../history/history.php">ประวัติการสอน</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" >รายชื่อนักศึกษาในรายวิชา</a>
  </li>
</ul>
  
<?
    $sub_id = $_GET['full_id'];
    $sec = $_GET['section'];
    $strSQL = "SELECT  new_sub.sub_id , sub_manage.subject_name , new_sub.stu_id  , new_sub.stu_name , new_sub.tel    
    FROM new_sub 
    INNER JOIN sub_manage ON new_sub.sub_id = sub_manage.subject_ID 
    WHERE new_sub.full_id LIKE '$sub_id' AND (new_sub.stu_id  LIKE '%".$_POST["textfield"]."%' OR new_sub.stu_name  LIKE '%".$_POST["textfield"]."%')  ";

    /*$strSQL = "SELECT  *  
    FROM new_sub ";*/

    $objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
    $Num_Rows = mysql_num_rows($objQuery);
?>
<br>
<form name="form1" method="post" action="" id="menu">
<div class="form-inline md-form mr-auto mb-4 float-right">
  <input name="textfield" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
  <button class="btn btn-elegant btn-rounded btn-sm my-0" type="submit">Search</button>
  </div>
<div >
<nav class=" navbar-expand-lg ">
  <a class="navbar-brand"><h1>รายวิชา</h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
</div>

    <div class="table-responsive" width="955" height="200" >
        <table class="table" width="955" height="200" border="0">     
    <thead>
      <tr>
        <th bgcolor="#CCCCCC" scope="col">#</th>
        <th bgcolor="#CCCCCC" scope="col">รหัสวิชา</th>
        <th bgcolor="#CCCCCC" scope="col">ชื่อวิชา</th>
        <th bgcolor="#CCCCCC" scope="col">รหัสนักศึกษา</th>
        <th bgcolor="#CCCCCC" scope="col">ชื่อ - สกุล</th>
        <th bgcolor="#CCCCCC" scope="col">เบอร์ติดต่อ</th>
      </tr>
    </thead>
  
<? 
    if($Num_Rows==0){
?>
 
 <td  colspan="5" bgcolor="#FFCC66">ไม่พบข้อมูล</td>


<?
}else{
$a=1;
while($objResult = mysql_fetch_array($objQuery))
{
	?>
         <tbody>
      <tr>
            <td bgcolor="#FFCC66"><?echo $a?></td>
            <td bgcolor="#FFCC66"><?=$objResult["sub_id"];?></td>
            <td bgcolor="#FFCC66"><?=$objResult["subject_name"];?></td>
            <td bgcolor="#FFCC66"><?=$objResult["stu_id"];?></td>
            <td bgcolor="#FFCC66"><?=$objResult["stu_name"];?></td>
            <td bgcolor="#FFCC66"><?=$objResult["tel"];?></td>
           </tr>
    </tbody>
          <?
$a++;}

}
?>
    
    <thead>
      <tr>
      <td colspan="9" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
    </thead>
  </table>
</div>
<br>
รวม <?php echo $Num_Rows;?> คน 
	
</form>
</div>
</div>   
        <script src="../../js/bootstrap.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/jquery-3.3.1.min"></script>
</body>
    </div>
</html>