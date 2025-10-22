<?php

include('db_connect.php');

$mes_germinacion = "";
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


$getData = "SELECT t.mes_censo,
t.count,
@running_total:=@running_total + t.count AS Total
FROM
( SELECT
MONTHNAME(fecha_creacion) as mes_censo,
count(id_fenologia) as count
FROM fenologia_tala 
GROUP BY mes_censo ) t
JOIN (SELECT @running_total:=0) r
ORDER BY t.mes_censo;";



$rows = $conn->query($getData);
$rowcount = $rows->num_rows;
if ($rowcount > 0) {
    while ($r = $rows->fetch_assoc()) {
        $Total .= '"' . $r["Total"] . '",';
        $mes_germinacion .= '"' . $r["mes_censo"] . '",';
        //echo $mes_germinacion;
        //echo $Total;
    }
}
$Total = substr($Total, 0, -1);
$mes_germinacion = substr($mes_germinacion, 0, -1);
$bar_graph = '


<canvas style="height:60vh; width:80vw" id="graph6" data-settings=
\'{
"type": "line",
"data": 
{
    "labels":[' . $mes_germinacion . '],
    "datasets":
    [{
        "label": "Total de Talas censados",
        "backgroundColor": ["#F38B3B"],
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
                "display":"true",
                "color":"rgba(0, 0, 0, 0)"
            }
            
        }]             
    }   
}
}\' 
></canvas>';

echo $bar_graph;

?>