<?php 

include ('db_connect.php');

$mes_germinacion ="";
$Total = "";
$months = array(
    'January' => 'Enero',
    'February' => 'Febrero',
    'March' => 'Marzo',
    'April' => 'Abril',
    'May' => 'Mayo',
    'June' => 'Junio',
    'July' => 'Julio',
    'August' => 'Agosto',
    'September' => 'Septiembre',
    'October' => 'Octubre',
    'November' => 'Noviembre',
    'December' => 'Diciembre'
  );
//SET lc_time_names = 'es_ES';

$getData = "SELECT DISTINCT(COUNT(MONTHNAME(fecha_germinacion)))
 as Total, MONTHNAME(fecha_germinacion)
  as mes_germinacion FROM `germinacion_tala`
   WHERE fecha_germinacion >'0000-00-00' 
   group by (MONTH(fecha_germinacion)) ";

$rows = $conn-> query($getData);
$rowcount = $rows->num_rows;
if($rowcount > 0){
    while($r = $rows->fetch_assoc()){
        $Total .='"' . $r["Total"] . '",';
        $mes_germinacion.='"' . $r["mes_germinacion"] . '",';
        //echo $mes_germinacion;
        //echo $Total;
    }
}
$Total = substr($Total, 0, -1);
$mes_germinacion = substr($mes_germinacion, 0, -1);
$bar_graph = '


<canvas style="height:60vh; width:80vw" id="graph" data-settings=
\'{
"type": "bar",
"data": 
{
    "labels":[' . $mes_germinacion . '],
    "datasets":
    [{
        "label": "Total de Talas germinados",
        "backgroundColor": ["#903200","#C44400", "#FF5800", "#FF8F54", "#FFBC99", "#B97300", "#ED9300", "#FDC262", "#FABE76", "#FBAB4A", "#FE9A20"],
        "borderColor": "#000000",
        "data": [' . $Total . ']
    }]
},
"options":
{
    "legend":
    {
        "display": false
    },
    "scales":
    {
        "yAxes": 
        [{
            "gridLines": {
                "display":"false",
                "color":"rgba(0, 0, 0, 0)"
            },
            "display": "false",
            "ticks": 
            {
                "suggestedMin": "0",                                
                "beginAtZero": "true" ,
                "stepSize":"5"                
             }
         }],
         "xAxes": [{
            "gridLines": {
                "display":"false",
                "color":"rgba(0, 0, 0, 0)"
            }
        }]             
    }   
}
}\' 
></canvas>';


echo $bar_graph;

?>