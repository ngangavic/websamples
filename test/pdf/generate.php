<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
    function Header()
    {
        // Title
        $this->SetFont('Arial','',18);
        $this->Cell(0,6,'Users List',0,1,'C');
        $this->Ln(10);
        // Ensure table header is printed
        parent::Header();
    }
}

// Connect to database
$link = mysqli_connect('localhost','root','','test');

$pdf = new PDF();
$pdf->AddPage();
// First table: output all columns
$pdf->Table($link,'select email,phone,dateReg from tbl_details');
$pdf->AddPage();
// Second table: specify 3 columns
$pdf->AddCol('email',40,'Email','C');
$pdf->AddCol('phone',20,'Phone');
$pdf->AddCol('dateReg',40,'Date Of Registration','R');
$prop = array('HeaderColor'=>array(255,150,100),
    'color1'=>array(210,245,255),
    'color2'=>array(255,255,210),
    'padding'=>2);
$pdf->Table($link,'select email, format(phone,0) as phone, dateReg from tbl_details ',$prop);
$pdf->Output();
?>