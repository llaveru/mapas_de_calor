<?php

$fp=fopen("marcadores1000.csv","r");
$cadena="";

while ($data=fgetcsv($fp,200,","))

	{
	$num=count($data);
	print"";
	echo "<br>";
	echo $data[0].'->'.$data[1];

	$cadena=$cadena."new google.maps.LatLng($data[0], $data[1]),";

	}
echo $cadena;
fclose($fp);



?>