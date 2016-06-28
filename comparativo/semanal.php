<?php 

if(isset($_SESSION['logado'])){
    $user = $_SESSION['userLogado'];
   
    if(isset($_SESSION['cliente'])){
      echo "<script>window.location = 'passoapasso.php'</script>";
    }
}else{
    echo "<script>window.location = 'index.php?erro=1'</script>";
}
?>
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Visitas Organicas</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <th>Período</th>
                            <th>Acessos</th>
                            <th>Leads</th>
                          </tr>
                          <tr>
                            <td>01/11/2015 a 07/11/2015</td>
                            <td>1.610</td>
                            <td>10</td>
                          </tr>
                          <tr>
                            <td>01/11/2015 a 07/11/2015</td>
                            <td>1.610</td>
                            <td>10</td>
                          </tr>
                          <tr>
                            <td>01/11/2015 a 07/11/2015</td>
                            <td>1.610</td>
                            <td>10</td>
                          </tr>
                          <tr>
                            <td>01/11/2015 a 07/11/2015</td>
                            <td>1.610</td>
                            <td>10</td>
                          </tr>
                          <tr>
                            <td>01/11/2015 a 07/11/2015</td>
                            <td>1.610</td>
                            <td>10</td>
                          </tr>
                          <tr>
                            <td>01/11/2015 a 07/11/2015</td>
                            <td>1.610</td>
                            <td>10</td>
                          </tr>
                          <tr>
                            <td>01/11/2015 a 07/11/2015</td>
                            <td>1.610</td>
                            <td>10</td>
                          </tr>
                          <tr>
                            <td>01/11/2015 a 07/11/2015</td>
                            <td>1.610</td>
                            <td>10</td>
                          </tr>
                        
                      </tbody></table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                
            </div>
            <div class="col-md-6">
               <!-- AREA CHART -->
          <div class="box box-purple">
            <div class="box-header with-border">
              <h3 class="box-title">Visitas Organicas</h3>
            </div>
            <div class="box-body">
              <div class="box-chart">
                <canvas id="GraficoLine" style="width:100%; "></canvas>
              </div>
            </div>
             
             <script type="text/javascript">

                var options = {
                    //Boolean - If we should show the scale at all
                showScale: true,
                //Boolean - Whether grid lines are shown across the chart
                scaleShowGridLines: false,
                //String - Colour of the grid lines
                scaleGridLineColor: "rgba(0,0,0,.05)",
                //Number - Width of the grid lines
                scaleGridLineWidth: 1,
                //Boolean - Whether to show horizontal lines (except X axis)
                scaleShowHorizontalLines: true,
                //Boolean - Whether to show vertical lines (except Y axis)
                scaleShowVerticalLines: true,
                //Boolean - Whether the line is curved between points
                bezierCurve: true,
                //Number - Tension of the bezier curve between points
                bezierCurveTension: 0.3,
                //Boolean - Whether to show a dot for each point
                pointDot: false,
                //Number - Radius of each point dot in pixels
                pointDotRadius: 4,
                //Number - Pixel width of point dot stroke
                pointDotStrokeWidth: 1,
                //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                pointHitDetectionRadius: 20,
                //Boolean - Whether to show a stroke for datasets
                datasetStroke: true,
                //Number - Pixel width of dataset stroke
                datasetStrokeWidth: 2,
                //Boolean - Whether to fill the dataset with a color
                datasetFill: true,
                //String - A legend template
                legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
                //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                maintainAspectRatio: true,
                //Boolean - whether to make the chart responsive to window resizing
                responsive: true
                              
                          };

                var data = {
                    labels: ["01/11/2015 a 07/11/2015",
                             "08/11/2015 a 14/11/2015",
                             "15/11/2015 a 21/11/2015",
                             "22/11/2015 a 28/11/2015",
                             "09/11/2015 a 05/12/2015",
                             "06/12/2015 a 12/12/2015",
                             "13/12/2015 a 19/12/2015",
                             "20/12/2015 a 26/12/2015",
                             "27/12/2015 a 02/01/2016"],
                    datasets: [
                        {
                            label: "Dados secundários",
                            fillColor: "rgba(121, 78, 124,0.5)",
                            strokeColor: "rgba(121, 78, 124,1)",
                            pointColor: "rgba(121, 78, 124,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(121, 78, 124,1)",
                            data: [1610,
                                   1818,
                                   1672,
                                   8000,
                                   1204,
                                   7000,
                                   1048,
                                   916,
                                   9041]
                        }
                    ]
                };               
                
                
            </script>

            

            <!-- /.box-body -->
          </div>
            </div>
        </div><!-- row -->
        
         <div class="row">
            
            <div class="col-md-6">
               <!-- AREA CHART -->
          <div class="box box-purple">
            <div class="box-header with-border">
              <h3 class="box-title">Leads</h3>
            </div>
            <div class="box-body">
              <div class="box-chart">
                <canvas id="GraficoLine2" style="width:100%;"></canvas>
              </div>
            </div>
             
             <script type="text/javascript">

                var data2 = {
                    labels: ["01/11/2015 a 07/11/2015",
                             "08/11/2015 a 14/11/2015",
                             "15/11/2015 a 21/11/2015",
                             "22/11/2015 a 28/11/2015",
                             "09/11/2015 a 05/12/2015",
                             "06/12/2015 a 12/12/2015",
                             "13/12/2015 a 19/12/2015",
                             "20/12/2015 a 26/12/2015",
                             "27/12/2015 a 02/01/2016"],
                    datasets: [
                        
                        {
                            label: "My First dataset",
                            fillColor: "rgba(112, 121, 157,1)",
                            strokeColor: "rgba(112, 121, 157,1)",
                            pointColor: "rgba(112, 121, 157,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(112, 121, 157,1)",
                            data: [10,
                                   90,
                                   55,
                                   80,
                                   14,
                                   70,
                                   18,
                                   96,
                                   91]
                        }
                    ]
                };               
                
                window.onload = function(){
                    var ctx = document.getElementById("GraficoLine").getContext("2d");
                    var LineChart = new Chart(ctx).Line(data, options);
                    var ctx2 = document.getElementById("GraficoLine2").getContext("2d");
                    var LineChart2 = new Chart(ctx2).Line(data2, options);
                }  
            </script>

            

            <!-- /.box-body -->
          </div>
            </div>
            <div class="col-md-6">
                <div class="box box-purple">
                    <div class="box-header">
                      <h3 class="box-title">Visitas Organicas2</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                      
                    </div>
                    <!-- /.box-body -->
                  </div>
                
            </div>
        </div><!-- row -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
