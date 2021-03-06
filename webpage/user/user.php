<?php
class Paginator{
	var $items_per_page;
	var $items_total;
	var $current_page;
	var $num_pages;
	var $mid_range;
	var $low;
	var $high;
	var $limit;
	var $return;
	var $default_ipp;
	var $querystring;
	var $url_next;

	function Paginator()
	{
		$this->current_page = 1;
		$this->mid_range = 7;
		$this->items_per_page = $this->default_ipp;
		$this->url_next = $this->url_next;
	}
	function paginate()
	{

		if(!is_numeric($this->items_per_page) OR $this->items_per_page <= 0) $this->items_per_page = $this->default_ipp;
		$this->num_pages = ceil($this->items_total/$this->items_per_page);

		if($this->current_page < 1 Or !is_numeric($this->current_page)) $this->current_page = 1;
		if($this->current_page > $this->num_pages) $this->current_page = $this->num_pages;
		$prev_page = $this->current_page-1;
		$next_page = $this->current_page+1;


		if($this->num_pages > 10)
		{
			$this->return = ($this->current_page != 1 And $this->items_total >= 10) ? "<a class=\"paginate\" href=\"".$this->url_next.$this->$prev_page."\">&laquo; Previous</a> ":"<span class=\"inactive\" href=\"#\">&laquo; Previous</span> ";

			$this->start_range = $this->current_page - floor($this->mid_range/2);
			$this->end_range = $this->current_page + floor($this->mid_range/2);

			if($this->start_range <= 0)
			{
				$this->end_range += abs($this->start_range)+1;
				$this->start_range = 1;
			}
			if($this->end_range > $this->num_pages)
			{
				$this->start_range -= $this->end_range-$this->num_pages;
				$this->end_range = $this->num_pages;
			}
			$this->range = range($this->start_range,$this->end_range);

			for($i=1;$i<=$this->num_pages;$i++)
			{
				if($this->range[0] > 2 And $i == $this->range[0]) $this->return .= " ... ";
				if($i==1 Or $i==$this->num_pages Or in_array($i,$this->range))
				{
					$this->return .= ($i == $this->current_page And $_GET['Page'] != 'All') ? "<a title=\"Go to page $i of $this->num_pages\" class=\"current\" href=\"#\">$i</a> ":"<a class=\"paginate\" title=\"Go to page $i of $this->num_pages\" href=\"".$this->url_next.$i."\">$i</a> ";
				}
				if($this->range[$this->mid_range-1] < $this->num_pages-1 And $i == $this->range[$this->mid_range-1]) $this->return .= " ... ";
			}
			$this->return .= (($this->current_page != $this->num_pages And $this->items_total >= 10) And ($_GET['Page'] != 'All')) ? "<a class=\"paginate\" href=\"".$this->url_next.$next_page."\">Next &raquo;</a>\n":"<span class=\"inactive\" href=\"#\">&raquo; Next</span>\n";
		}
		else
		{
			for($i=1;$i<=$this->num_pages;$i++)
			{
				$this->return .= ($i == $this->current_page) ? "<a class=\"current\" href=\"#\">$i</a> ":"<a class=\"paginate\" href=\"".$this->url_next.$i."\">$i</a> ";
			}
		}
		$this->low = ($this->current_page-1) * $this->items_per_page;
		$this->high = ($_GET['ipp'] == 'All') ? $this->items_total:($this->current_page * $this->items_per_page)-1;
		$this->limit = ($_GET['ipp'] == 'All') ? "":" LIMIT $this->low,$this->items_per_page";
	}

	function display_pages()
	{
		return $this->return;
	}
}
?>
<?

include "../../db_config.php";
require_once('../../vendor/php-excel-reader/excel_reader2.php');
require_once('../../vendor/SpreadsheetReader.php');
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
	<title>STUDENT IDENTITY SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="../../style.css"/>
    </head>

<style>
.btn{
 border: 2px solid black;
  background-color: white;
  color: black;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  border:0px solid transparent;
 }
 button {
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
}
</style>

<body>
<div id="wrapper">
    <h1>STUDENT IDENTITY SYSTEM</h1>
    <div class="float-right"><h3><span style="text-align: right"><small>Welcome&nbsp;<font color="#0000FF"><u><?=$_SESSION["name"];?></u></font>&nbsp;to System | <a href="logout.php"><font color="#636363">Logout</font></a></small></span></h3>
</div><br>

    <div class="container-fluid">

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="../../homepage2.php">หน้าหลัก</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="user.php">รายชื่อ</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../subject/subjects.php">วิชา</a>
  </li>
  </ul>
  
<?
	$strSQL = "SELECT * FROM barcode_tb WHERE (stu_id LIKE '%".$_POST["textfield"]."%' OR stu_name LIKE '%".$_POST["textfield"]."%')";
	$objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
    $Num_Rows = mysql_num_rows($objQuery);

    $Per_Page = 30;   // Per Page
    
    $Page = $_GET["Page"];
    if(!$_GET["Page"])
    {
        $Page=1;
    }
    
    $Prev_Page = $Page-1;
    $Next_Page = $Page+1;
    
    $Page_Start = (($Per_Page*$Page)-$Per_Page);
    if($Num_Rows<=$Per_Page)
    {
        $Num_Pages =1;
    }
    else if(($Num_Rows % $Per_Page)==0)
    {
        $Num_Pages =($Num_Rows/$Per_Page) ;
    }
    else
    {
        $Num_Pages =($Num_Rows/$Per_Page)+1;
        $Num_Pages = (int)$Num_Pages;
    }
    
    $strSQL .=" order  by id ASC LIMIT $Page_Start , $Per_Page";
    $objQuery  = mysql_query($strSQL);
?>
<br>

<form method="post" action="" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
<form name="form1">
<div class="form-inline md-form mr-auto mb-4 float-right">
  <input name="textfield" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
  <button class="btn btn-elegant btn-rounded btn-sm my-0" onclick="Bsubmit(this.form)">Search</button>
</div>
<div >
<nav class=" navbar-expand-lg ">
  <a class="navbar-brand"><h1>รายชื่อ</h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="container"> 
<div class="row">
<div class="input-group col-md-8">
  <div class="input-group-prepend">
    <span class="input-group-text"><button onclick="Asubmit(this.form)" id="submit" name="import" class="button">Import</button></span>
  </div>
  <div class="custom-file">
    <input type="file" name="file" class="custom-file-input" id="file" accept=".xls,.xlsx">  
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>

</div>
</div>
</div>
</nav>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

function Asubmit(frm)
{
frm.action="../../import1.php";
frm.submit();
}

function Bsubmit(frm)
{
frm.action="";
frm.submit();
}
</script>


<br>

<!--div class="container">
<div class="row">

  <div class="input-group col-md-6">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
  </div>
  <div class="custom-file">
  <input type="file" name="file" class="custom-file-input" id="file" accept=".xls,.xlsx">  
  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>  
  </div>
  <div class="col-md-3">
  <button type="submit" id="submit" name="import" class="btn btn-light-blue">Import</button>
  </div>
  </div>  

</div>  
</div--> 
    <div class="table-responsive" width="955" height="200" >
        <table class="table" width="955" height="200" border="0">     
    <thead>
      <tr>
        <th bgcolor="#CCCCCC" scope="col">#</th>
        <th bgcolor="#CCCCCC" scope="col">รหัสนักศึกษา</th>
        <th bgcolor="#CCCCCC" scope="col">ชื่อ-นามสกุล</th>
        <th bgcolor="#CCCCCC" scope="col">สาขา</th>
        <th bgcolor="#CCCCCC" scope="col">แก้ไข</th>
        <th bgcolor="#CCCCCC" scope="col">ลบ</th>
      </tr>
    </thead>
    
    <?php
		  $a=1;
		  while($objResult = mysql_fetch_array($objQuery)){
		?>
    
    <tbody>
      <tr>
            <td bgcolor="#FFCC66"><?echo $a?></td>
            <td bgcolor="#FFCC66"><?=$objResult["stu_id"];?></td>
            <td bgcolor="#FFCC66"><?=$objResult["stu_name"];?></td>
            <td bgcolor="#FFCC66"><?=$objResult["stu_dep"];?></td>
            <td bgcolor="#FFCC66">&nbsp;<a href="update.php?id=<?=$objResult["id"];?>"><img src="../../images/button/edit.png" width="33" height="33"></a></td>
            <td bgcolor="#FFCC66">&nbsp;<a href="code_delete.php?id=<?=$objResult["id"];?>" onClick="return confirm('คุณต้องการที่จะลบข้อมูลนี้หรือไม่ ?');"><img src="../../images/button/garbage.png" width="33" height="33"></a></td>
      </tr>
    </tbody>
    
    <?php
      $a++;}
    ?>
    
    <thead>
      <tr>
      <td colspan="6" bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
    </thead>
  </table>
</div>
<br>
Total <?php echo $Num_Rows;?> Record 

<?php

$pages = new Paginator;
$pages->items_total = $Num_Rows;
$pages->mid_range = 30;
$pages->current_page = $Page;
$pages->default_ipp = $Per_Page;
$pages->url_next = $_SERVER["PHP_SELF"]."?QueryString=value&Page=";

$pages->paginate();

echo $pages->display_pages()
?>		
</form>
</div>
</div>   
        <script src="../../js/bootstrap.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/3.3.1/jquery.min.js"></script> 
</body>
    </div>
</html>