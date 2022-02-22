<!doctype html>
<html lang="en">
  <head>
    <title>Laravel 8 Google Bar Chart Example From Scratch - XpertPhp</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  </head>
  <body>
 <div class="container">
 <div id="bar-chart" style="width: 900px; height: 500px"></div>
 </div>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">
   google.charts.load('current', {'packages':['bar']});
   google.charts.setOnLoadCallback(drawChart);

   function drawChart() {
 var data = google.visualization.arrayToDataTable([
 ['Product Id', 'Sales', 'Quantity'],

 @php
   foreach($salesPos as $product) {
   echo "['".$product->id."', ".$product->price.", ".$product->quantity."],";
   }
 @endphp
 ]);

 var options = {
   chart: {
 title: 'Bar Graph | Sales',
 subtitle: 'Sales, and Quantity: @php echo $salesPos[0]->created_at @endphp',
   },
   bars: 'vertical'
 };
 var chart = new google.charts.Bar(document.getElementById('bar-chart'));
 chart.draw(data, google.charts.Bar.convertOptions(options));
   }
 </script>
 </body>
</html>
