<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/5/14
 * Time: 11:30 PM
 */
require('../../lib/FPDF/fpdf.php');
header('Content-type: application/pdf');

class PDF extends FPDF{

    public function __construct(){

        parent::FPDF();

    }
    public static function createResutls($data,$sub){
        $pdf = new PDF();
        $pdf->SetLeftMargin(25);
        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,15,$sub.' Report',0,0,"C");
        $pdf->Ln(25);

        $pdf->makeTable2($data);
        $pdf->Ln(10);

        $pdf->Output("Results Report.pdf","I");



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
        $pdf->Write(5,"Students all assignment marks evaluating for this subject is shown blow..!! This is help to evaluate progress of whole batch..!!!!!!");

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

        $pdf->Image('../../mod/graph/barChart.png',60,150,90);
//        $pdf->Image('../../mod/graph/3DpieChart.png',120,160,70);
        $pdf->Ln(80);

        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(0,5,'Assignment Progress',0,0,"L");
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',9);
        $pdf->Write(5,"Students all assignment marks evaluating for this subject is shown blow..!! This is help to evaluate progress of whole batch..!!!!!! ");

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

    public static function StudentData($data){

        $pdf = new PDF();
        $pdf->SetLeftMargin(25);
        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);
//        $pdf->Cell(0,15,' Report',0,0,"C");
        $pdf->Ln(25);

        $pdf->makeTable3($data);
        $pdf->Ln(10);


        $pdf->Output("aa.pdf","I");
        header("Content-type: application/pdf");
    }


    public function makeTable($data){


        $this->SetFont('Arial','',8);

        $y=count($data);

        for($i=0;$i<$y;$i++){
            $this->Cell(30,5,$data[$i][0],1,0,"C");
            $this->Cell(20,5,$data[$i][1],1,0,"C");
            $this->Cell(40,5,$data[$i][2]."%",1,0,"C");
            $this->Ln();
        }

    }

    public function makeTable2($data){
        $this->SetFont('Arial','',10);

        $x= count($data);

        for($i=0;$i<$x;$i++){
            $this->Cell(60,6,$data[$i][0],1,0,"C");
            $this->Cell(40,6,$data[$i][1],1,0,"C");
            $this->Ln();
        }
    }

    public function makeTable3($data){
        $this->SetFont('Arial','',10);

        $x= count($data);

        for($i=0;$i<$x;$i++){
            $this->Cell(60,6,$data[$i][0],1,0,"C");
            $this->Cell(80,6,$data[$i][1],1,0,"C");
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

    public static function attendanceReport($details,$data){

        $pdf = new PDF();
        $pdf->SetLeftMargin(25);
        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,15,'Attendance Report',0,0,"C");
        $pdf->Ln(25);

        $pdf->attenDetails($details);
        $pdf->Ln(10);

        $pdf->makeAttenTable($data);
        $pdf->Ln(10);

        $pdf->Write(5,"* - Attendance rate less than 80% ");


        $pdf->Output("Results Report.pdf","I");

    }
    private function attenDetails($data){
        $this->SetFont('Arial','',10);

        $this->Cell(50,5,"Batch Year ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$data[0],0,0,"L");
        $this->Ln();
        $this->Cell(50,5,"Course Name ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$data[1],0,0,"L");
        $this->Ln();
        $this->Cell(50,5,"Level ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$data[2],0,0,"L");
        $this->Ln();
        $this->Cell(50,5,"Batch ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$data[3],0,0,"L");
        $this->Ln();
        $this->Cell(50,5," ",0,0,"L");
        $this->Ln();
        $this->Cell(50,5,"No.of Days Lectures held ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$data[4],0,0,"L");
        $this->Ln();
    }

    private function makeAttenTable($data){
        $this->SetFont('Arial','',10);

        $this->Cell(60,6,"Student ID",1,0,"C");
        $this->Cell(50,6,"Percentage of Atandances",1,0,"C");
        $this->Ln();

        $x= count($data);

        for($i=0;$i<$x;$i++){
            $this->Cell(60,6,$data[$i][0],1,0,"C");
            $this->Cell(50,6,$data[$i][1],1,0,"C");
            $this->Ln();
        }
    }
public static function attendanceReportMy($details,$data){

        $pdf = new PDF();
        $pdf->SetLeftMargin(25);
        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,15,'Attendance Report',0,0,"C");
        $pdf->Ln(25);

        $pdf->attenDetailsMy($details);
        $pdf->Ln(10);

        $pdf->makeAttenTableMy($data);
        $pdf->Ln(10);


        $pdf->Output("Results Report.pdf","I");

    }
    private function attenDetailsMy($data){
        $this->SetFont('Arial','',10);

        $this->Cell(50,5,"Student ID ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$data[0],0,0,"L");
        $this->Ln();
        $this->Cell(50,5,"Student Name ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$data[1],0,0,"L");
        $this->Ln();
        $this->Cell(50,5,"No.of Days Lectures held ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$data[2],0,0,"L");
        $this->Ln();
        $this->Cell(50,5,"No.of Days Student Participated ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$data[3],0,0,"L");
        $this->Ln();
        $this->Cell(50,5," ",0,0,"L");
        $this->Ln();
        $this->Cell(50,5,"Participation Precentage ",0,0,"L");
        $this->Cell(2,5,": ",0,0,"C");
        $this->Cell(20,5,$data[4],0,0,"L");
        $this->Ln();
    }
    private function makeAttenTableMy($data){
        $this->SetFont('Arial','',10);

        $this->Cell(60,6,"Month",1,0,"C");
        $this->Cell(50,6,"No.of Days Student Participated",1,0,"C");
        $this->Cell(50,6,"No.of Days Lectures held",1,0,"C");
        $this->Ln();

        $x= count($data);

        for($i=0;$i<$x;$i++){
            $this->Cell(60,6,$data[$i][0],1,0,"C");
            $this->Cell(50,6,$data[$i][1],1,0,"C");
            $this->Cell(50,6,$data[$i][2],1,0,"C");
            $this->Ln();
        }
    }



}

//$p = new PDF();
//$p->addImage();
?>