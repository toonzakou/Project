<?php
require('fpdf.php');
include "../db_config.php";

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm







class PDF extends FPDF
{
  private $full     =  "";
  private $num  = "";
  
  //you can give class variables values in the constructor
  //so it'll be setted right when object creation
  function __construct(){
      parent::__construct();
      $this->full = isset($_POST['txt_full']) ? $_POST['txt_full'] : null;
      $this->num = isset($_POST['txt_num']) ? $_POST['txt_num'] : null;
       
  }

  function start() {
    if (empty($this->full) || empty($this->num)) {
        throw new Exception("Empty Post not allowed");
    }

    else
    {
        // Do some stuiff
        echo "Registration Done";
    }
}

// Page header
function Header()
{
  $strSQL = "SELECT attend_subject.sub_id , attend_subject.section , attend_subject.num , attend_subject.room
    , attend_subject.total , attend_subject.start_t , attend_subject.fin_t , attend_subject.date , sub_manage.subject_name
    , subjects.date_t ,teachers.name
     FROM attend_subject
     INNER JOIN sub_manage ON attend_subject.sub_id = sub_manage.subject_ID
     INNER JOIN subjects ON attend_subject.sub_id = subjects.sub_id
     INNER JOIN teachers ON subjects.teacher_id = teachers.teac_id 
     WHERE attend_subject.full_id = '".$this->full."' AND attend_subject.num = '".$this->num."' ";
     /*$strSQL = "SELECT *
     FROM attend_tb";*/
       $objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
       $a=1;
       $objResult = mysql_fetch_array($objQuery);

    // Logo
    $this->Image('logo_nbu.png',10,6,80,10);
    // Arial bold 15
    $this->AddFont('THSarabunNew','','THSarabunNew.php');
    $this->SetFont('THSarabunNew','',14);
    // Line break
    $this->Ln(5);
    // Move to the right
    $this->Cell(60);
    // Title
    $this->Cell(80,10,iconv( 'UTF-8','TIS-620','แบบฟอร์มบันทึกการเข้าห้องเรียนของนักศึกษา'),0,0,'C');
    $this->Ln(10);
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','รหัสวิชา......................'),0,0);
    $this->Text(26,30.5,$objResult['sub_id']);
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620','ชื่อวิชา...........................................................'),0,0);
    $this->SetFont('THSarabunNew','',11);
    $this->Text(53,30.5,$objResult['subject_name']);
    $this->SetFont('THSarabunNew','',14);
    $this->Cell(20,10,iconv( 'UTF-8','TIS-620','กลุ่มที่.............'),0,0);
    $this->Text(112,30.5,$objResult['section']);
    $this->Cell(20,10,iconv( 'UTF-8','TIS-620','ครั้งที่..............'),0,0);
    $this->Text(132,30.5,$objResult['num']);
    $this->Cell(40,10,iconv( 'UTF-8','TIS-620','จำนวนนักศึกษา............คน'),0,0);
    $this->Text(164,30.5,$objResult['total']);
    $this->Ln(10);
    $this->Cell(45,10,iconv( 'UTF-8','TIS-620','ชื่อผู้สอน.....................................'),0,0);
    $this->Text(26,40.5,iconv('UTF-8','TIS-620',$objResult['name']));
    $this->Cell(35,10,iconv( 'UTF-8','TIS-620','ห้องเรียน........................'),0,0);
    $this->Text(73,40.5,$objResult['room']);
    $this->Cell(25,10,iconv( 'UTF-8','TIS-620','วัน.......................'),0,0);
    $this->Text(98,40.5,iconv('UTF-8','TIS-620',$objResult['date_t']));
    $this->Cell(40,10,iconv( 'UTF-8','TIS-620','เวลาเรียน................................'),0,0);
    $this->Text(131,40.5,$objResult['start_t']);
    $this->Text(139,40.5,'-');
    $this->Text(141,40.5,$objResult['fin_t']);
    $this->Cell(50,10,iconv( 'UTF-8','TIS-620','วันที่.....................................'),0,0);
    $this->Text(167,40.5,iconv('UTF-8','TIS-620',$objResult['date']));
    $this->Ln(10);
   
    


    
}

// Page footer
function Footer()
{

    $strSQL = "SELECT DISTINCT *
     FROM attend_subject
     WHERE full_id = '".$this->full."' AND num = '".$this->num."'";
     /*$strSQL = "SELECT *
     FROM attend_tb";*/
       $objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
       $a=1;
       $objResult = mysql_fetch_array($objQuery);

    // Position at 1.5 cm from bottom
    $this->SetY(-40);
    // Arial italic 8
    $this->AddFont('THSarabunNew','','THSarabunNew.php');
    $this->SetFont('THSarabunNew','',12);
    // Page number
  
    // Checkbox
    $this->Image('checkbox.png',10,260,3,3);
    $this->Cell(5,10,iconv( 'UTF-8','TIS-620',''),0,0);
    
    $this->Cell(100,10,iconv( 'UTF-8','TIS-620','มีทดสอบย่อยต้นชั่วโมง 15 นาที เวลา.....................น. -......................น.'),0,0);
    $this->Text(60,262.5,$objResult['start_t']);
    $this->Text(80,262.5,$objResult['late_t']);
    // Checkbox
    $this->Image('checkbox.png',120,260,3,3);
    $this->Cell(10,10,(''),0,0);
    $this->Cell(20,10,iconv( 'UTF-8','TIS-620','มีตำราเรียนประกอบ'),0,0);
      // Checkbox
    $this->Image('checkbox.png',155,260,3,3);
    $this->Cell(15,10,(''),0,0);
    $this->Cell(0,10,iconv( 'UTF-8','TIS-620','มีการเช็คชื่อในใบรายวิชาที่สอน'),0,0);

    $this->Ln(7);   

    $this->Image('checkbox.png',10,267,3,3);
    $this->Cell(5,10,(''),0,0);
    $this->Cell(65,10,iconv( 'UTF-8','TIS-620','มีสมุดทดสอบย่อยคนละ 1 เล่ม'),0,0);

    $this->Image('checkbox.png',80,267,3,3);
    $this->Cell(5,10,(''),0,0);
    $this->Cell(0,10,iconv( 'UTF-8','TIS-620','มีสมุดจดบันทึก คนละ 1 เล่ม'),0,0);

    $this->SetFont('THSarabunNew','',14);
    $this->Ln(7); 
    $this->Cell(20,10,iconv( 'UTF-8','TIS-620','สรุปประจำวัน'),0,0);
    $this->Cell(25,10,iconv( 'UTF-8','TIS-620','จำนวนนักศึกษา : '),0,0);
    $this->Cell(20,10,iconv( 'UTF-8','TIS-620','มา............คน'),0,0);
    $this->Text(62,276.5,$objResult['come']);
    $this->Cell(22,10,iconv( 'UTF-8','TIS-620','ขาด............คน'),0,0);
    $this->Text(84,276.5,$objResult['miss']);
    $this->Cell(20,10,iconv( 'UTF-8','TIS-620','สาย............คน'),0,0);
    $this->Text(106,276.5,$objResult['late']);
    $this->Cell(30,10,(''),0,0);
    $this->Line(11,278.2,29,278.2);
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','รวมทดสอบย่อยต้นชั่วโมง...............คน'),0,0);
    $this->Text(185,276.5,$objResult['quiz']);

    $this->Ln(7); 
    $this->Cell(15,10,(''),0,0);
    $this->Cell(25,10,iconv( 'UTF-8','TIS-620','*** ผู้สอนเซ็นชื่อและลงเวลาต้นชั่วโมงในลำดับสุดท้ายของนศ.ที่มาทันเวลาและท้ายชั่วโมงในบรรทัดสุดท้าย ตรงชื่องหมายเหตุ ***'),0,0);
  }

  function headerTable()
  {
    $this->AddFont('THSarabunNew','','THSarabunNew.php');//ธรรมดา
    $this->SetFont('THSarabunNew','',12);
    
    
    //Cell(width , height , text , border , end line , [align] )
    
    //normal row height=5.
    
    
    $this->Cell(140,5,iconv( 'UTF-8','TIS-620','สำหรับนักศึกษากรอก'),1,0,"C"); //vertically merged cell, height=2x row height=2x5=10
    $this->Cell(30,5,iconv( 'UTF-8','TIS-620','สำหรับอาจารย์กรอก'),1,0,"C"); //vertically merged cell
    $this->Cell(20,20,iconv( 'UTF-8','TIS-620','หมายเหตุ'),1,0,"C"); //vertically merged cell
    $this->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 
    
    //second line(row)
    $this->Cell(8,15,iconv( 'UTF-8','TIS-620','ที่'),1,0,"C"); //dummy cell to align next cell, should be invisible
    $this->Cell(20,15,iconv( 'UTF-8','TIS-620','รหัสนักศึกษา'),1,0,"C");
    $this->Cell(42,15,iconv( 'UTF-8','TIS-620','ชื่อ - นามสกุล'),1,0,"C");
    $this->Cell(30,15,iconv( 'UTF-8','TIS-620','เบอร์มือถือ'),1,0,"C");
    $this->Cell(20,15,iconv( 'UTF-8','TIS-620','เวลาเข้าเรียน'),1,0,"C");
    $this->Cell(20,15,iconv( 'UTF-8','TIS-620','ลายเซ็น'),1,0,"C");
    $this->Cell(30,5,iconv( 'UTF-8','TIS-620','การมาเรียน'),1,0,"C");
    $this->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 
    
    //third line(row)
    $this->Cell(140,15,'',0,0); //dummy cell to align next cell, should be invisible
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','Quiz'),1,0,"C");
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','สาย'),1,0,"C");
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','ขาด'),1,0,"C");
    $this->Ln();

  }

  function viewdataTable()
  {
    $this->AddFont('THSarabunNew','','THSarabunNew.php');//ธรรมดา
    $this->SetFont('THSarabunNew','',12);

    $strSQL = "SELECT DISTINCT attend_tb.stu_id , attend_tb.sub_id , attend_tb.section , attend_tb.quiz , attend_tb.late 
    , attend_tb.miss , attend_tb.time , attend_tb.date , new_sub.stu_name , sub_manage.subject_name , new_sub.tel
     FROM attend_tb
     INNER JOIN new_sub ON attend_tb.stu_id = new_sub.stu_id
     INNER JOIN sub_manage ON attend_tb.sub_id = sub_manage.subject_ID 
     WHERE attend_tb.full_id = '".$this->full."' AND attend_tb.num = '".$this->num."'
     ORDER BY attend_tb.time ASC";
     /*$strSQL = "SELECT *
     FROM attend_tb";*/
       $objQuery = mysql_query($strSQL) or die ("Error Query[".$strSQL."]");
       $a=1;
       while($objResult = mysql_fetch_array($objQuery)){
       $this->Cell(8,8,iconv( 'UTF-8','TIS-620',$a),1,0,"C"); //dummy cell to align next cell, should be invisible
       $this->Cell(20,8,iconv( 'UTF-8','TIS-620',$objResult['stu_id']),1,0);
       $this->Cell(42,8,iconv( 'UTF-8','TIS-620',$objResult['stu_name']),1,0);
       $this->Cell(30,8,iconv( 'UTF-8','TIS-620',$objResult['tel']),1,0);
       $this->Cell(20,8,iconv( 'UTF-8','TIS-620',$objResult['time']),1,0,'C');
       $this->Cell(20,8,iconv( 'UTF-8','TIS-620',$objResult['']),1,0);
       $this->Cell(10,8,iconv( 'UTF-8','TIS-620',$objResult['quiz']),1,0,'C');
       $this->Cell(10,8,iconv( 'UTF-8','TIS-620',$objResult['late']),1,0,'C');
       $this->Cell(10,8,iconv( 'UTF-8','TIS-620',$objResult['miss']),1,0,'C');
       $this->Cell(20,8,iconv( 'UTF-8','TIS-620',$objResult['date']),1,0); 
       $this->Ln();
       $a++;}
       if ($a < 24) {
        for ($x = $a; $x <= 24; $x++) {
            $this->Cell(8,8,iconv( 'UTF-8','TIS-620',$x),1,0,"C"); //dummy cell to align next cell, should be invisible
            $this->Cell(20,8,iconv( 'UTF-8','TIS-620',''),1,0);
            $this->Cell(42,8,iconv( 'UTF-8','TIS-620',''),1,0);
            $this->Cell(30,8,iconv( 'UTF-8','TIS-620',''),1,0);
            $this->Cell(20,8,iconv( 'UTF-8','TIS-620',''),1,0,'C');
            $this->Cell(20,8,iconv( 'UTF-8','TIS-620',''),1,0);
            $this->Cell(10,8,iconv( 'UTF-8','TIS-620',''),1,0,'C');
            $this->Cell(10,8,iconv( 'UTF-8','TIS-620',''),1,0,'C');
            $this->Cell(10,8,iconv( 'UTF-8','TIS-620',''),1,0,'C');
            $this->Cell(20,8,iconv( 'UTF-8','TIS-620',''),1,0); 
            $this->Ln();
        } 
       
      
    } 
       
    
    
  }

 

}











$pdf = new PDF('P','mm','A4');
 

$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');//ธรรมดา
$pdf->SetFont('THSarabunNew','',12);

$pdf->headerTable();
$pdf->viewdataTable();

$pdf->Output();









?>