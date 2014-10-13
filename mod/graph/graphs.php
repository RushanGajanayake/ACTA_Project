<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/5/14
 * Time: 7:20 PM
 */
require_once ('../../lib/jpgraph/jpgraph.php');
require_once ('../../lib/jpgraph/jpgraph_pie.php');
require_once ('../../lib/jpgraph/jpgraph_pie3d.php');
require_once ('../../lib/jpgraph/jpgraph_bar.php');
require_once ('../../lib/jpgraph/jpgraph_line.php');

class GraphMaker1{

    public function __construct(){

    }

    public static function pieChart($data,$legends){

        $graph = new PieGraph(900, 550,'auto');
        $graph->SetShadow();
//        $graph->title->Set($topic);
        $graph->title->SetFont(FF_VERDANA, FS_BOLD, 14);
        $graph->legend->Pos(0.1, 0.2);

        // Creating a 3D pie graphic
        $p1 = new PiePlot3d($data);
        $p1->SetTheme("sand");

        $p1->SetLabels($legends);
        $p1->SetLabelPos(1);
        $p1->SetLabelType(PIE_VALUE_PER);
        $p1->value->Show();
        $p1->value->SetFont(FF_ARIAL,FS_NORMAL,20);
        $p1->value->SetColor('darkgray');

        $p1->SetCenter(0.45, 0.5);
        $p1->SetAngle(45);
        $p1->ExplodeAll(20);
//        $p1->value->SetFont(FF_ARIAL, FS_NORMAL, 12);
//        $p1->SetLegends($legends);

        $graph->img->SetImgFormat('png');
        $graph->Add($p1);
        // Showing graphic

        return $graph->Stroke('../graph/3DpieChart.png');



    }

    public static function barChart($data,$legends,$x,$y){
        $graph = new Graph(600,400,'auto');
        $graph->SetScale('textlin');

        $graph->SetShadow();
        $graph->SetMargin(60,30,20,40);


        $bplot = new BarPlot($data);

        $bplot->SetFillColor('orange');
        $graph->Add($bplot);


//        $graph->title->Set($topic);
        $graph->xaxis->SetTickLabels($legends);
        $graph->xaxis->title->Set($x);
        $graph->yaxis->title->Set($y);

        $graph->title->SetFont(FF_FONT1,FS_BOLD);
        $graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
        $graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

        return $graph->Stroke('../graph/barChart.png');
    }



    public static function lineChart($data1,$data2,$legends){

        $graph = new Graph(600,400);
        $graph->SetScale('intlin');
        $graph->SetShadow();

        $graph->SetMargin(40,20,20,40);
//        $graph->title->Set('Calls per operator (June,July)');
//        $graph->subtitle->Set('(March 12, 2008)');
//        $graph->xaxis->title->Set('Operator');
//        $graph->yaxis->title->Set('# of calls');

        $graph->yaxis->title->SetFont( FF_FONT1 , FS_BOLD );
        $graph->xaxis->title->SetFont( FF_FONT1 , FS_BOLD );
        $graph->xaxis->SetTickLabels($legends);


        $lineplot=new LinePlot($data1);
        $lineplot->SetWeight( 4 );   // Two pixel wide

        // Add the plot to the graph
        $graph->Add($lineplot);

        // Create the second data series
        $lineplot2=new LinePlot($data2);
        $lineplot2->SetWeight( 4 );   // Two pixel wide

        $graph->Add($lineplot2);

        $lineplot->SetLegend("This Year");
        $lineplot2->SetLegend("Last Year");
        $graph->legend->SetLayout(LEGEND_HOR);
        $graph->legend->Pos(0.4,0.95,"center","bottom");


        return $graph->Stroke('../graph/compareLineChart.png');

    }

}

?>