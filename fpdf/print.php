<?php
require('fpdf.php');

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm



class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo_nbu.png',10,6,80,10);
    // Arial bold 15
    $this->AddFont('THSarabunNew','','THSarabunNew.php');
    $this->SetFont('THSarabunNew','',16);
    // Line break
    $this->Ln(5);
    // Move to the right
    $this->Cell(60);
    // Title
    $this->Cell(80,10,iconv( 'UTF-8','TIS-620','แบบฟอร์มบันทึกการเข้าห้องเรียนของนักศึกษา'),0,0,'C');
    $this->Ln(10);
    $this->Cell(25,10,iconv( 'UTF-8','TIS-620','รหัสวิชา.................'),0,0);
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620','ชื่อวิชา.....................................................'),0,0);
    $this->Cell(20,10,iconv( 'UTF-8','TIS-620','กลุ่มที่........'),0,0);
    $this->Cell(20,10,iconv( 'UTF-8','TIS-620','ครั้งที่........'),0,0);
    $this->Cell(40,10,iconv( 'UTF-8','TIS-620','จำนวนนักศึกษา............คน'),0,0);
  
  
    $this->Ln(20);
   
    
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF('P','mm','A4');

$pdf->AddPage();

$pdf->AddFont('THSarabunNew','','THSarabunNew.php');//ธรรมดา
$pdf->SetFont('THSarabunNew','',12);


//Cell(width , height , text , border , end line , [align] )

//normal row height=5.


$pdf->Cell(140,5,iconv( 'UTF-8','TIS-620','สำหรับนักศึกษากรอก'),1,0,"C"); //vertically merged cell, height=2x row height=2x5=10
$pdf->Cell(30,5,iconv( 'UTF-8','TIS-620','สำหรับอาจารย์กรอก'),1,0,"C"); //vertically merged cell
$pdf->Cell(20,25,iconv( 'UTF-8','TIS-620','หมายเหตุ'),1,0,"C"); //vertically merged cell
$pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 

//second line(row)
$pdf->Cell(8,20,iconv( 'UTF-8','TIS-620','ที่'),1,0,"C"); //dummy cell to align next cell, should be invisible
$pdf->Cell(20,20,iconv( 'UTF-8','TIS-620','รหัสนักศึกษา'),1,0,"C");
$pdf->Cell(42,20,iconv( 'UTF-8','TIS-620','ชื่อ - นามสกุล'),1,0,"C");
$pdf->Cell(30,20,iconv( 'UTF-8','TIS-620','เบอร์มือถือ'),1,0,"C");
$pdf->Cell(20,20,iconv( 'UTF-8','TIS-620','เวลาเข้าเรียน'),1,0,"C");
$pdf->Cell(20,20,iconv( 'UTF-8','TIS-620','ลายเซ็น'),1,0,"C");
$pdf->Cell(30,5,iconv( 'UTF-8','TIS-620','การมาเรียน'),1,0,"C");
$pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 

//third line(row)
$pdf->Cell(140,15,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(10,15,iconv( 'UTF-8','TIS-620','Quiz'),1,0,"C");
$pdf->Cell(10,15,iconv( 'UTF-8','TIS-620','สาย'),1,0,"C");
$pdf->Cell(10,15,iconv( 'UTF-8','TIS-620','ขาด'),1,0,"C");








$pdf->Output();
?>