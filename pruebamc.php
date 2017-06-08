<html>
	<head>
		
	</head>


	<body>







<?php
$fila = 1;
if (($gestor = fopen("listadocsv.csv", "r")) !== FALSE) {
    while (($datos = fgetcsv($gestor, 200, ",")) !== FALSE) {
        $numero = count($datos);
        echo "<p> $numero de campos en la línea $fila: <br /></p>\n";
        $fila++;
        for ($c=0; $c < $numero; $c++) {
            echo $datos[$c] . "<br />\n";
        }
    }
    fclose($gestor);
}
?>





<!--
 codigo javascript 

<script type="text/javascript">
var jsDemo ="<?php var_dump($datosVolcados); ?>";
alert jsDemo;
</script>
-->

	</body>

</html>





