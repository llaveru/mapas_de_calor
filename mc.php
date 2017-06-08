<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mapas de calor</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      #divInformacion{
        font-size: 40px;
        position:absolute;
        padding: 20px;
        right:  200px;
        top:100px;
        height: 200px;
        width: 200px;
        opacity: 0.8;
        border-radius: 20px 20px 20px 20px;
        background-color: #c90;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
         background-color: #c90;
        
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #floating-panel {
         background-color: #c90;
        
        border: 1px solid #999;
        left: 25%;
        padding: 5px;
        position: absolute;
        top: 10px;
        z-index: 5;
      }
    </style>
  </head>

  <body>
    <div id="floating-panel">
      <button onclick="toggleHeatmap()">Toggle Heatmap</button>
      <button onclick="changeGradient()">Change gradient</button>
      <button onclick="changeRadius()">Change radius</button>
      <button onclick="changeOpacity()">Change opacity</button>
    </div>
    <div id="map"></div>

    <div id="divInformacion"></div>

    <?php
        $contador=0;
        $fp=fopen("marcadores1000.csv","r");
        $cadena="";
                while ($data=fgetcsv($fp,200,","))

                {
                $num=count($data);
               // print"";
              //echo "<br>";
              //echo $data[0].'->'.$data[1];
                $contador++;
        $cadena=$cadena."new google.maps.LatLng($data[0], $data[1]),";
        //echo $cadena;
        }
        $cadena=$cadena."new google.maps.LatLng(43,-5)";
      
      fclose($fp);
      ?>


    <script>

      // This example requires the Visualization library. Include the libraries=visualization
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=visualization">

      var map, heatmap;

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: 42.775, lng: -5.434},
          mapTypeId: 'satellite'
        });

        heatmap = new google.maps.visualization.HeatmapLayer({
          data: getPoints(),
          map: map
        });
        mostrarNumero();
      }

      function toggleHeatmap() {
        heatmap.setMap(heatmap.getMap() ? null : map);
      }

      function changeGradient() {
        var gradient = [
          'rgba(0, 255, 255, 0)',
          'rgba(0, 255, 255, 1)',
          'rgba(0, 191, 255, 1)',
          'rgba(0, 127, 255, 1)',
          'rgba(0, 63, 255, 1)',
          'rgba(0, 0, 255, 1)',
          'rgba(0, 0, 223, 1)',
          'rgba(0, 0, 191, 1)',
          'rgba(0, 0, 159, 1)',
          'rgba(0, 0, 127, 1)',
          'rgba(63, 0, 91, 1)',
          'rgba(127, 0, 63, 1)',
          'rgba(191, 0, 31, 1)',
          'rgba(255, 0, 0, 1)'
        ]
        heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
      }

      function changeRadius() {
        heatmap.set('radius', heatmap.get('radius') ? null : 70);
      }

      function changeOpacity() {
        heatmap.set('opacity', heatmap.get('opacity') ? null : 0.8);
      }

      function mostrarNumero(){

        document.getElementById("divInformacion").innerHTML='<p><?php echo $contador;?> registros<br>procesados<\p>'; 
      }







      // Heatmap data: 500 Points
      function getPoints() {
         // var cadena= "<?php echo $cadena ?>";
         // alert (cadena);
      //return cadena;
      //var cadenad = new Array();
      //cadenad = "<?php echo $cadena;?>";
      //alert (cadena);
      return [<?php echo $cadena?>];
             
      }

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDP7J4R3SPvTn310zPFrUBWuMdI07FZl0c&libraries=visualization&callback=initMap">
    </script>
  </body>
</html>