<?php
$conn = mysqli_connect("localhost","root","0841446192","test_project");
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');
$sub_id = $_POST['txtid'];  
if (isset($_POST["import"]))
{
    
    
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
                $stu_id = "";
                if(isset($Row[0])) {
                    $stu_id = mysqli_real_escape_string($conn,$Row[0]);
                }

            
                
                if (!empty($stu_id) ) {
                    $query = "insert into new_sub(stu_id,sub_id) values('".$stu_id."','".$sub_id."')";
                    $result = mysqli_query($conn, $query);
                
                    if (! empty($result)) {
                        $type = "success";
                        echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
                        echo "<script language='javascript'>alert('Excel Data Imported into the Database');</script>";
                        echo "<meta http-equiv='refresh' content='0;URL=webpage/user/user.php'>";
                    } else {
                        $type = "error";
                        echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
                        echo "<script language='javascript'>alert('Problem in Importing Excel Data');</script>";
                        echo "<meta http-equiv='refresh' content='0;URL=webpage/user/user.php'>";
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
        echo "<script language='javascript'>alert('Invalid File Type. Upload Excel File.');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=webpage/user/user.php'>";
  }
}
?>

<!DOCTYPE html>
<html>    
<head>
<style>    
/*body {
	font-family: Arial;
	width: 550px;
}

.outer-container {
	background: #F0F0F0;
	border: #e0dfdf 1px solid;
	padding: 40px 20px;
	border-radius: 2px;
}

.btn-submit {
	background: #333;
	border: #1d1d1d 1px solid;
    border-radius: 2px;
	color: #f0f0f0;
	cursor: pointer;
    padding: 5px 20px;
    font-size:0.9em;
}

.tutorial-table {
    margin-top: 40px;
    font-size: 0.8em;
	border-collapse: collapse;
	width: 100%;
}

.tutorial-table th {
    background: #f0f0f0;
    border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

.tutorial-table td {
    background: #FFF;
	border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

#response {
    padding: 10px;
    margin-top: 10px;
    border-radius: 2px;
    display:none;
}

.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
}*/
</style>
</head>

<body>
    <h2></h2>
    
    <!--div class="outer-container">
        <form action="" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
                <label>Choose Excel
                    File</label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Import</button>
        
            </div>
        
        </form>
        
    </div-->
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
    
<?php
 /*   $sqlSelect = "SELECT * FROM tbl_info";
    $result = mysqli_query($conn, $sqlSelect);

if (mysqli_num_rows($result) > 0)
{
?>
        
    <table class='tutorial-table'>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>

            </tr>
        </thead>
<?php
    while ($row = mysqli_fetch_array($result)) {
?>                  
        <tbody>
        <tr>
            <td><?php  echo $row['name']; ?></td>
            <td><?php  echo $row['description']; ?></td>
        </tr>
<?php
    }
?>
        </tbody>
    </table>
<?php 
} */
?>

</body>
</html>