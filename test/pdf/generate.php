<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
    function Header()
    {
        //Report Title
        $this->SetFont('Arial','',18);
        $this->Cell(0,6,'Users List',0,1,'C');
        $this->Ln(10);
        parent::Header();
    }
}

// Connect to database
$link = mysqli_connect('localhost','root','','test');

$pdf = new PDF();
$pdf->AddPage();
$pdf->Table($link,'select email,phone,dateReg from tbl_details');
$pdf->Output();
?>