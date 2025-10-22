<?php 

include ('db_connect.php');

$provincia ="";
$Total = "";
//SET lc_time_names = 'es_ES';

$getData = "SELECT DISTINCT(COUNT(Provincia)) as Total, Provincia FROM users WHERE Provincia <>'' group by (Provincia)";

$rows = $conn-> query($getData);
$rowcount = $rows->num_rows;
if($rowcount > 0){
    while($r = $rows->fetch_assoc()){
        $Total .='"' . $r["Total"] . '",';
        $provincia.='"' . $r["Provincia"] . '",';
    }
}
$Total = substr($Total, 0, -1);
$provincia = substr($provincia, 0, -1);
$bar_graph = '


<canvas id="graph3" style="responsive: true; height:60vh; width:80vw" data-settings=
\'{
"type": "pie",
"data": 
{
    "labels":[' . $provincia . '],  
    "datasets":
    [{        
        "backgroundColor": ["#903200","#C44400", "#FF5800", "#FF8F54", "#FFBC99", "#B97300", "#ED9300", "#FDC262", "#FABE76", "#FBAB4A", "#FE9A20"],
        "borderColor": "#000000",
        "borderWidth":0,
        "data": [' . $Total . ']
    }]
},
"options":
{
    "legend":
    {
        "display": true
        
    }

}
}\' 
></canvas>';

echo $bar_graph;

?>