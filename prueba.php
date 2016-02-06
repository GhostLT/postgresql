<?php
echo "hola mundo";
/*
 * PHP PGSQL - How to insert rows into PostgreSQL table
 */
 
// Connecting, selecting database
$cadena=" host=10.103.51.86 port=5439 dbname=syspoetdb user=rfregional password=rfr3610n4L ";
$con = pg_connect($cadena) or die('Error en la conexion: ' . pg_last_error());

//$fecha="20160204";
//consulta sql
$query=<<<QUERY
select distinct b.site_name,a.*from cqi.i_qd_contrib_d a join stat_suggest_sites b on(a.nodeb=b.site) 
where date='20160204' and "Region"='North' order by "CS Acc QD Contrib" desc;
QUERY;
echo "$query";

$resultado=pg_query($query) or die("Error query". pg_last_error());
//$sql="select * from cqi.i_qd_contrib_d ";
echo "<pre>";
//var_dump($resultado);

//ejecutar sentancia sql con pg_query
//$res = pg_query($sql) or die("Error query". pg_last_error());

//recorrer con while los resultados obtenidos	
echo "<ul>";
$rows = pg_fetch_array($resultado,null,PGSQL_ASSOC);
var_dump($rows);
//while () 
//{
	echo "<li>".$rows["site_name"].",".$rows["rncid"]."</li>";
//}

?>