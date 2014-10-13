<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/5/14
 * Time: 11:30 PM
 */
require('../../lib/FPDF/fpdf.php');


class PDF extends FPDF{

    public function __construct(){

        parent::FPDF();

    }
    public static function createPDF_student($reportDetails,$AnalysisData){
        $pdf = new PDF();
        $pdf->SetLeftMargin(25);
        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,15,'Student Report',0,0,"C");
        $pdf->Ln(25);

        $pdf->stuReportData($reportDetails);
        $pdf->Ln(10);

        $pdf->makeTableStu($AnalysisData);
        $pdf->Ln(20);

        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(0,5,'Assignment Progress',0,0,"L");
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',10);
        $pdf->Write(5,"Students all assignment marks evaluating for this subject is shown blow..!! This is help to evaluate progress of whole batch..!!!!!! LOL :P :D");

        $pdf->Output("Report.pdf","I");

    }

    public static function createPDF_overall($reportDetails,$AnalysisData){


        $pdf = new PDF();
        $pdf->SetLeftMargin(25);
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,15,'Students Overall Report',0,0,"C");
        $pdf->Ln(25);

        $pdf->reportData($reportDetails);
        $pdf->Ln(10);

        $pdf->makeTable($AnalysisData);

        $pdf->Image('../../mod/graph/barChart.png',20,150,90);
        $pdf->Image('../../mod/graph/3DpieChart.png',120,160,70);
        $pdf->Ln(80);

        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(0,5,'Assignment Progress',0,0,"L");
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',9);
        $pdf->Write(5,"Students all assignment marks evaluating for this subject is shown blow..!! This is help to evaluate progress of whole batch..!!!!!! LOL :P :D");

        $pdf->AddPage();
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(0,5,'Results Compare with Last year',0,0,"L");
        $pdf->Ln(5);
        $pdf->Image('../../mod/graph/compareLineChart.png',40,20,130);



        unlink('../../mod/graph/3DpieChart.png');
        unlink('../../mod/graph/barChart.png');
        unlink('../../mod/graph/compareLineChart.png');
        $pdf->Output("Report.pdf","I");
    }

    public function makeTable($data){


        $this->SetFont('Arial','',8);

        for($i=0;$i<13;$i++){
            $this->Cell(30,5,$data[$i][0],1,0,"C");
            $this->Cell(20,5,$data[$i][1],1,0,"C");
            $this->Cell(40,5,$data[$i][2]."%",1,0,"C");
            $this->Ln();
        }

    }
    public function reportData($details){

        $this->SetFont('Arial','',10);

        $this->Cell(50,5,"Subject ID ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$details[0],0,0,"L");
        $this->Ln();
        $this->Cell(50,5,"Subject Name ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$details[1],0,0,"L");
        $this->Ln();
        $this->Cell(50,5,"Lecturer Name ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$details[2],0,0,"L");
        $this->Ln();
        $this->Cell(50,5,"Total Student in the Course ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$details[3],0,0,"L");
        $this->Ln();
        $this->Cell(50,5,"Total Students face to exam ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$details[4],0,0,"L");
        $this->Ln();
        $this->Cell(50,5,"Subject Pass Rate ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$details[5]."%",0,0,"L");
        $this->Ln();
        $this->Cell(50,5,"Subject Repeat Rate ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$details[6]."%",0,0,"L");
        $this->Ln();


    }
    public function stuReportData($details){
        $this->SetFont('Arial','',10);

        $this->Cell(50,5,"Student ID ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$details[0],0,0,"L");
        $this->Ln();
        $this->Cell(50,5,"Student Name ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$details[1],0,0,"L");
        $this->Ln();
        $this->Cell(50,5,"Course ID ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$details[2],0,0,"L");
        $this->Ln();
        $this->Cell(50,5,"Course Name ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$details[3],0,0,"L");
        $this->Ln();
    }

    public function makeTableStu($data){

        $this->SetFont('Arial','',10);

        $rows= count($data);

        for($i=0;$i<$rows;$i++){
            $this->Cell(20,5,$data[$i][0],1,0,"C");
            $this->Cell(40,5,$data[$i][1],1,0,"C");
            $this->Cell(20,5,$data[$i][2],1,0,"C");
            $this->Cell(20,5,$data[$i][3],1,0,"C");
            $this->Ln();
        }
    }



}

//$p = new PDF();
//$p->addImage();
?>