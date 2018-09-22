<!DOCTYPE html> 
  <head> 
  <title>Google Chart GEO</title> 
    <!--Load the AJAX API--> 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
    <script type="text/javascript"> 
     

google.charts.load('current', {
  callback: drawRegionsMap,
  packages:['geochart']
});

function drawRegionsMap() {
  var data = google.visualization.arrayToDataTable([
    ['City', 'YAP', 'EDC'],

    ['Medan', 123, 321],
    ['Padang', 123, 321],
    ['Cirebon', 123, 321],
    ['Banten', 123, 321],
    ['Jakarta', 456, 555],
    ['Bandung', 111, 222],
  ]);


  var options = {
    region: 'ID',
    resolution: 'provinces',
    displayMode: 'markers',
   pointSize: 5,
   pointShape: 'diamond',
    colorAxis: {colors: ['green', 'blue','grey','red']},
   hAxis: {minValue: 5, maxValue: 5},
  sizeAxis: {minSize: 5, maxSize: 5},
    datalessRegionColor: '#ffcc80'
  };

  var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
  chart.draw(data, options);
};
//----------


    </script> 
  </head> 
 
  <body> 
       <div id="regions_div" style="width: 900px; height: 500px;"></div>
   

  </body> 
</html>