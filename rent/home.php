<?php
include('session.php');
include 'dbConfig.php';
?>
<?php  
 //$connect = mysqli_connect("localhost", "root", "6WjuW+YX:J\\O8:i4\\I;f;7@r", "rent");  
 //SELECT count(*) FROM `rent_update_details` WHERE user_name is not null
 $query = "select status as name,count(*) as total from flat_details group by status;";  
//$query="select status,(select count(*) as total from flat_details where property='Semi-Commercial' and (status='empty' or status='null'))  / (select count(*) from flat_details where property='Semi-Commercial') * 100 as total from flat_details group by property;";
 $result = mysqli_query($conn, $query);  
 ?>
 <?php  
 //$connect = mysqli_connect("localhost", "root", "6WjuW+YX:J\\O8:i4\\I;f;7@r", "rent");  
 //SELECT count(*) FROM `rent_update_details` WHERE user_name is not null
 $query1 = "select building_name as name,count(*) as total  from rent_update_details group by building_name;";  
//$query="select status,(select count(*) as total from flat_details where property='Semi-Commercial' and (status='empty' or status='null'))  / (select count(*) from flat_details where property='Semi-Commercial') * 100 as total from flat_details group by property;";
 $result1 = mysqli_query($conn, $query1);  
 ?>
  <?php  
 //$connect = mysqli_connect("localhost", "root", "6WjuW+YX:J\\O8:i4\\I;f;7@r", "rent");  
 //SELECT count(*) FROM `rent_update_details` WHERE user_name is not null
 $query3 = "select property as name,count(*) as total  from flat_details group by property;";  
//$query="select status,(select count(*) as total from flat_details where property='Semi-Commercial' and (status='empty' or status='null'))  / (select count(*) from flat_details where property='Semi-Commercial') * 100 as total from flat_details group by property;";
 $result3 = mysqli_query($conn, $query3);  
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Rent</title>

  <!-- Favicons -->
  <link href="img/" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
   <link href="css/home.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>
     <script type="text/javascript" src="css/graph/loader.js"></script>
                           <script src="css/graph/jqurty.js"></script>  
        <script type="text/javascript" src="css/graph/js/jquery.min.js"></script>
<script type="text/javascript" src="css/graph/js/Chart.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
          ellipse[stroke-width='6.5'] {
  stroke: transparent,
}
</style>

         <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart2);  
           function drawChart2()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Status', 'Number'],  
                          <?php  
                          while($row1 = mysqli_fetch_array($result1))  
                          {  
                               echo "['".$row1["name"]."', ".$row1["total"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                                    'title':'Building',
                   titleTextStyle: {
        color:'white',    // any HTML string color ('red', '#cc00cc')
     //   fontName:'Times New Roman', // i.e. 'Times New Roman'
        fontSize: 14, // 12, 18 whatever you want (don't specify px)
        bold: true,    // true or false
        italic: false   // true of false
    },  
                     is3D:true,  
                   pieHole: 0.4,
                 //  title:'So, how was your day?", 
                   pieSliceBorderColor:'transparent',
                        legend: 
                        {  textStyle: {
          								color: 'lightgray'    // sets the text color
         							 }
         				},

                         backgroundColor: '#2b2b2b',
    				      pieSliceText: 'label',
          slices: { 
                    3: {offset: 0.1},
                     1: {offset: 0.2},
                    5: {offset: 0.2},
                    8: {offset: 0.3},
                    10: {offset: 0.4},
          },
                      chartArea: {width: 500, height: 240}
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));  
                chart.draw(data, options);  
           }  
           </script> 
   <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Status', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["name"]."', ".$row["total"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = { 
                    'title':'On Rent',
                   titleTextStyle: {
        color:'white',    // any HTML string color ('red', '#cc00cc')
      //  fontName:'Times New Roman', // i.e. 'Times New Roman'
        fontSize: 14, // 12, 18 whatever you want (don't specify px)
        bold: true,    // true or false
        italic: false   // true of false
    },
                
                             legend: {  textStyle: {
      					      color: 'lightgray'    // sets the text color
          }},
                 backgroundColor: '#2b2b2b',
                  
                      is3D:true,  
                     pieHole: 0.8,
                       pieSliceBorderColor:'transparent',
                      chartArea: {width: 800, height: 240}
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script> 
              <script type="text/javascript">  

           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Status', 'Number'],  
                          <?php  
                          while($row3 = mysqli_fetch_array($result3))  
                          {  
                               echo "['".$row3["name"]."', ".$row3["total"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = { 
                'title':'Properties',
                   titleTextStyle: {
        color:'white',    // any HTML string color ('red', '#cc00cc')
       // fontName:'Times New Roman', // i.e. 'Times New Roman'
        fontSize: 14, // 12, 18 whatever you want (don't specify px)
        bold: true,    // true or false
        italic: false   // true of false
    },
    
                             legend: {  textStyle: {
            color: 'lightgray' // sets the text color
           
          }},
                 backgroundColor: '#2b2b2b',
                       pieSliceBorderColor:'transparent',
                      pieHole: 0.4,
                   is3D:true,
                      chartArea: {width: 500, height: 240}
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart3'));  
                chart.draw(data, options);  
           }  
           </script> 
             <script>
        $(document).ready(function () {
            showGraph();
        });
        function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];

                    for (var i in data) {
                        name.push(data[i].x);
                        marks.push(data[i].y);
                    }

                    var chartdata = {
                        labels: name,
                       
                       
         				
                        datasets: [
                            {
                        
                            labelcolor:'white',
                                label: 'Monthly Rent',
                                backgroundColor: 'transparent',
                               borderColor: 'white',  
                               strokeColor : "white",
                               pointColor : "white",
                               pointStrokeColor : "white",  
                                
                                data: marks
                            }
                        ]
                    };
var options = {
   responsive: true,

   legend: {
      fontColor: "white",
   },
   scales: {
      xAxes: [{
         ticks: {
            fontColor: "white",
         }
      }],
      yAxes: [{
         ticks: {
            fontColor: "white",
          
         }
      }]
   }
};
                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata,
                           options: options //<- assign this
                    });
                });
            }
        }
        </script>
         <script>
        $(document).ready(function () {
            showGraph1();
        });


        function showGraph1()
        {
            {
                $.post("data1.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];
                    var marks1 = [];

                    for (var i in data) {
                        name.push(data[i].x);
                        marks.push(data[i].y);
                  
                    }

                    var chartdata = {
                        labels: name,
                 datasets: [
                            {
                               label: 'Collect Rent',
                               backgroundColor: '#e0e0e0',
                               borderColor: '#212121',  
                               strokeColor : "#ACC26D",
                               pointColor : "#fff",
                               pointStrokeColor : "#9DB86D",  
                               onProgress: function(animation) {
              						  progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
            },
                                data: marks
                            },
                          
                        ]
                    };
var options = {
   responsive: true,
  
   legend: {
      fontColor: "white",
   },
   scales: {
      xAxes: [{
         ticks: {
            fontColor: "white",
         }
      }],
      yAxes: [{
         ticks: {
            fontColor: "white",
          
         }
      }]
   }
};
                    var graphTarget = $("#graphCanvas1");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
                         options: options //<- assign this
                    });
                });
            }
        }
        </script>
           <style>
           .mt {
    margin-top: 20px !important;
}
.new_mr{
margin-left:15px;margin-right:22px;
}
@media only screen and (max-width: 1024px){
.new_mr{
margin-left:15px;margin-right:0px;
}
}
           </style>
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
      <!--header start-->
      <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
  <a href="home.php" class="logo"><span>Rent</span></a>
      <!--logo end-->
     <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">

 			 <?php  include 'header-notify.php';?>
          <!-- notification dropdown start-->
   
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li>
          	<form action="logout.php" method="post">
          		<input type="submit" class="btn btn-large btn-primary" style="margin-top:10px;" value="logout">
          	</form>
          	</li>
        </ul>
      </div>
    </header>
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
         
          <li class="mt">
            <a  class="active"  href="home.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          
            <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-home"></i>
              <span>Manage Property</span><label class="label pull-right"><i class="fa fa-angle-down" style="color:#404E67;"></i></label>
              </a>
              <ul class="sub">
                 <li><a href="view-building.php">Add Building </a></li>
                 <li><a href="view-flat-building.php">Add Flat  </a></li>
            </ul>
          </li>
          
          <li>
             <a href="view-tenant-building.php">
             <i class="fa fa-user"></i>
              <span>Add Tenant </span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li>

          <li>
             <a href="view-rent-flat.php">
             <i class="fa fa-inr"></i>
              <span>Pay Rent</span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li>
 		 

           <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-money"></i>
              <span>Expense</span><label class="label pull-right"><i class="fa fa-angle-down" style="color:#404E67;"></i></label>
              </a>
              <ul class="sub">
                <li><a href="view-building-lightbill.php"> Building Lightbill </a></li>
                  <li><a href="view-flat-lightbill.php"> Flat Lightbill </a></li>
                 <li><a href="view-expenses.php"> Other Expense </a></li>
                 
            </ul>
          </li>
           <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-file"></i>
              <span>Report</span><label class="label pull-right"><i class="fa fa-angle-down" style="color:#404E67;"></i></label>
              </a>
              <ul class="sub">
              	  <li><a href="view-flat-tenant-report.php"> Tenant </a></li>
                 <li><a href="view_tenant_report.php"> Rent </a></li>
                 <li><a href="view_lightbill_report.php"> Building Lightbill </a></li> 
                  <li><a href="view_lightbill_flat_report.php"> Flat Lightbill </a></li> 
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
          <h3>Manager Dashboard</h3>
      		<p> Welcome : <?php echo $login_session; ?> </p>
        <!-- /row -->
          <div class="row " >
          <div class="col-md-12 col-sm-12 tile_count" style="padding: 0px;">
          
            <div class="col-md-2 col-sm-4 mt">
            <div class="theme-bg center mar-top">
             <a class="" href="view-tenant-building.php"> <span class="count_top"> Total Building</span>
              <div class="count  "> <?php   
                  $d=date("Y-m-d");
                $result=mysqli_query($conn,"select count(*) as total from building");
                $data=mysqli_fetch_assoc($result);
                echo $data['total'];
                
                ?>
             </div></a>
             </div>
            </div>
            <div class="col-md-2 col-sm-4 mt">
            <div class="theme-bg center mar-top">
              <a class="mar-top" href="view-building-flat-room.php">   <span class="count_top" > Total Flat/Room</span>
              <div class="count "> <?php   
                $result=mysqli_query($conn,"select count(*) as total from flat_details");
                $data=mysqli_fetch_assoc($result);
                echo $data['total'];
                
                ?>
             </div></a>
          </div>
            </div>
            
                <div class="col-md-2 col-sm-4 mt">
                 <div class="theme-bg center mar-top">
               <a class="mar-top" href="view_building_rent_flat.php">    <span class="count_top" >Flat On Rent</span>
              <div class="count"> <?php   
                $result=mysqli_query($conn,"select count(*) as total from flat_details where status='Occupied' ");
                $data=mysqli_fetch_assoc($result);
                echo $data['total'];
                
                ?>
               </div></a>
          </div>
            </div>
 
 				    <div class="col-md-2 col-sm-4 mt">
                 <div class="theme-bg center mar-top">
                <a class="mar-top" href="view_building_empty_rent_flat.php">    <span class="count_top" >Empty Flat</span>
              <div class="count"> <?php   
                $result=mysqli_query($conn,"select count(*) as total from flat_details where status='Empty' ");
                $data=mysqli_fetch_assoc($result);
                echo $data['total'];
                
                ?>
             </div>
                </div></a>
            </div>
            
                 
                <div class="col-md-2 col-sm-4 mt">
                 <div class="theme-bg center mar-top">
              <span class="count_top" >Pending Status</span>
              <div class="count"> <?php   
                $result=mysqli_query($conn,"select count(*) as total  FROM `flat_rent` WHERE rent_status='pending' ");
                $data=mysqli_fetch_assoc($result);
                echo $data['total'];
                
                ?>
             </div>
          </div>
            </div>
            
                 
                  <div class="col-md-2 col-sm-4 mt">
                 <div class="theme-bg center mar-top">
              <span class="count_top" >Month Rent Received</span>
              <div class="count"> <?php   
                $result=mysqli_query($conn,"select count(*) as total from flat_rent where date_format(rent_paid_date,'%m') = MONTH(CURRENT_DATE()) ");
                $data=mysqli_fetch_assoc($result);
                echo $data['total'];
                
                ?>
             </div>
          </div>
            </div>
            
            
          </div> 
        </div>
                
                 <div class="row mt" >
                <div class="col-md-4 col-sm-4">
                <div class="theme-bg mt " style="">
			    <div id="piechart" class="" style="width:95%; height: 320px;margin-left:10px;"></div>  
                </div>
                </div>
               <div class="col-md-4 col-sm-4">
                <div class="theme-bg mt " style="">
					 <div id="piechart2" class="" style="width:95%; height: 320px;margin-left:10px;"></div>  
                </div></div>
                  <div class="col-md-4 col-sm-4">
                <div class="theme-bg mt" style="">
					 <div id="piechart3" class="" style="width:95%; height: 320px;margin-left:10px;"></div>  
                </div>
                </div>
                </div> 
                
                <div class="row mt" >
      			<div class="col-md-6 col-sm-6 bg-white mt">
			    <canvas id="graphCanvas"  class="theme-bg white-panel" style="height: 370px; width: 100%;background:#2b2b2b;"></canvas>
                </div>
                <div class="col-md-6 col-sm-6 bg-white mt">
			     <canvas id="graphCanvas1"  class="theme-bg white-panel" style="height: 370px; width: 100%;background:#2b2b2b;"></canvas>
                </div>
                </div>   
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
            <p>
      Powered By 
        </p><a href="http://pnminfotech.com/"><img class="footer-img" src="img/logo1.png"></a>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
           
        </div>
        <a href="blank.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome!',
        // (string | mandatory) the text inside the notification
        text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
        // (string | optional) the image to display on the left
        image: 'logo1.png',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>
</html>