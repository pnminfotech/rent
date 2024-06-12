<?php
include('session.php');
?>
<?php

include 'dbConfig.php';

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

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <link href="css/table-responsive.css" rel="stylesheet">
  
<link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" rel="stylesheet">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
.Occupied{
color: #ff9800;
}
.Occupied-btn
{
background-color: #ff9800;
}
._bg0{
color:orange;
}
._bg1_btn{
background-color:green;
}
._bg2_btn{
background-color:orange;
}
._bg3_btn{
background-color:red;
}
.before_date {
color:green;
}
.after_date {
color:red;
}
.current_month{
color:green;
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


          <!-- notification dropdown start-->
     <?php  include 'header-notify.php';?>
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
            <a href="home.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          
         <li class="sub-menu">
            <a   href="javascript:;">
              <i class="fa fa-home"></i>
              <span>Manage Property</span><label class="label pull-right"><i class="fa fa-angle-down" style="color:#404E67;"></i></label>
              </a>
              <ul class="sub">
                 <li><a href="view-building.php">Add Building </a></li>
                 <li ><a href="view-flat-building.php">Add Flat  </a></li>
            </ul>
          </li>
           <li>
             <a href="view-tenant-building.php">
             <i class="fa fa-user"></i>
              <span>Tenant Details</span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li>
            <li>
             <a class="active" href="view-rent-flat.php">
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
				<div class="col-lg-12">
				 <?php
            		 $building_name=$_REQUEST['building_name'];
            		 $id=$_REQUEST['b_id'];
            		 $wing=$_REQUEST['wing'];
                     ?>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<h3><?php echo $building_name;?> - <?php echo $wing;?> Wing </h3>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6  mt-2 pl-0 pr-0 ">
						<div class="float-btn font11"><button type="button" class="green-bg btn btn-secondary btn-sm"></button> Upcoming
						<button type="button" class="red-bg btn btn-secondary btn-sm"></button> Pending
						<button type="button" class="orange-bg btn btn-secondary btn-sm"></button> Paid
						<a href="view-rent-wing.php?building_name=<?php echo $building_name;?>&b_id=<?php echo $id;?>"> <button
									type="button" class=" back-btn btn btn-secondary btn-sm back-btn1">
									<i class="fa fa-mail-reply-all"></i> Back
								</button></a>
						</div>
					</div>
				</div>

				<div class="row mt" style="margin-bottom:8px;">
          		<div class="col-lg-12">
          		<span><?php 
$building_name=$_REQUEST['building_name'];
$id=$_REQUEST['b_id'];
$wing=$_REQUEST['wing'];
$sql1 = "select floor from rent_update_details where building_name='$building_name' and b_id=$id and wing='$wing' and floor is not null and user_name is not null group by floor";
$result11 = $conn->query($sql1);
if ($result11->num_rows > 0) {
    while($row1 = $result11->fetch_assoc()) {
     
        $i= $row1["floor"];
        echo "<br>";
?>
 					 </span> 
           			 <div class="content-panel">
           			  <label class="floor_name" ><?php echo "Floor No : ". $row1["floor"];  ?></label>
           			  <div class="card-box table-responsive border-none">
                        <?php
include 'dbConfig.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$building_name=$_REQUEST['building_name'];
$id=$_REQUEST['b_id'];
$wing=$_REQUEST['wing'];
$sql = "select * from rent_update_details where building_name='$building_name' and b_id=$id and wing='$wing' and floor='$i' and user_name is not null and status = 'Occupied'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
        $room= $row["property"];
        $Residential ='Residential'; $Industrial ='Industrial';$Commercial ='Commercial';
        $Semi_Commercial ='Semi_Commercial';
?>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 text-center mt-2  mb-2">
										<?php 
										error_reporting(0);
											$create_date=$row["rent_due_date"];
											$month = date('m');
											$year = date('Y');
										//	echo $year;
											$main_date= "$year-$month-$create_date"; //5-03-2021
											$rent_date=$row["rent_paid_date"]; //27-02-2021
											
											$ts1 = strtotime($rent_date);
											$ts2 = strtotime($main_date);
											
											$year1 = date('Y', $ts1);
											$year2 = date('Y',$ts2);
										//	 echo $year1 ;
										//	 echo $year2;
											$month1 = date('m', $ts1);
											$month2 = date('m',$ts2);
											
											$diff =(($year2 - $year1) * 12) +($month2 - $month1);
									   
										//	echo $diff;
											$diff11=$diff;
											$today_date=date("Y-m-d");
											$main_date1= "$year-$month-$create_date"; //5-03-2021
										//	echo $main_date1;
											$date111=date_create($main_date1);
											date_sub($date111,date_interval_create_from_date_string("5 days"));
											$before_date= date_format($date111,"Y-m-d");
									//		echo $today_date;
											    ?>
									<a href='view-rent-flat-pay-info.php?flat_no=<?php echo $row["flat_no"];?>&flat_name=<?php echo $row["flat_name"];?>&building_name=<?php echo $row["building_name"]; ?>&b_id=<?php echo $row["b_id"]; ?>&wing=<?php echo $row["wing"]; ?>'> 
									<button type="button" class="high btn btn-sm btn-success new-width btn-building">

											<span
												class="material-icons building-icon _bg <?php echo $diff11;?> <?php  if(!empty($create_date)){
												                                                                if($diff == 0){
												                                                                    echo " orange";
												                                                                }
												                                                                if($diff == 1){
												                                                                    if(strtotime($before_date) <= strtotime($today_date) && strtotime($main_date1) > strtotime($today_date))
												                                                                    {
												                                                                       echo " before_date";
												                                                                    }
												                                                                    else if(strtotime($before_date) < strtotime($today_date) && strtotime($main_date1) < strtotime($today_date))
												                                                                        {
												                                                                            echo " after_date";
												                                                                        }
												                                                                   }
												                                                                   if($diff > 1)
												                                                                    {
												                                                                        echo" after_date";
												                                                                    }
												                                                                
												                                                            }
												                                                            else{ echo " gray";
												                                                            }?> "><?php if($room == $Residential){ ?>	night_shelter  <?php } ?> 
										<?php if($room == $Industrial){ ?>	corporate_fare  <?php } ?><?php if($room == $Commercial){ ?>	store  <?php } ?><?php if($room == $Semi_Commercial){ ?>	storefront  <?php } ?><?php if($room == ''){ ?>	room_preferences  <?php } ?>
										</span>
										</button>
									<br> <span class="font-weight-bold f-16"><?php echo $row["flat_name"]; ?></span><br><span> <?php echo $row["room_type"]; ?> </span><br>
									<span style="color:wheat"><?php echo $row["user_name"]; ?> </span></a>
								</div>
								<?php }
                                    }?>
                          </div>
 					 </div>
 					 <?php }} ?>
  				</div>
  			</div>

      </section>
      
 
      <!-- /wrapper -->
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

  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  
    <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <!--custom switch-->
  <script src="lib/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="lib/jquery.tagsinput.js"></script>
  <script type="text/javascript" src="lib/adv-export/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" src="lib/adv-export/buttons.html5.min.js"></script>
  <!--script for this page-->
  
   <script>
 
$(document).ready(function(){
	$(".addCF").click(function(){
	  var counter = $("#customFields tbody tr").length;
	  var newId = counter + 0;
		$("#customFields").append('<tbody><tr id="1" ><td class="append-table"> '+newId+ '<input type="hidden" value="'+newId+ '" id="1" name="sn[]" ></td><td class="text-center append-table"><input required  class="form-control" name="total_flat[]" onblur="findTotal()"  type="text" placeholder="total Flat"></td><td class="text-center append-table"><input required name="wing[]" class="form-control" type="text" placeholder="Wing Name"> </td><td class="append-table"> <a href="javascript:void(0);" class="remCF"> <span class="fa fa-2x fa-minus-square removeItem"></span></a></td></tr></tbody>');
	});
    $("#customFields").on('click','.remCF',function(){
        $(this).parent().parent().remove();
    });
});
  </script>
  <script>

  </script>
<script type="text/javascript">
    /* Formating function for row details */
    

    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
     


      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [1]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
      $('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          /* This row is already open - close it */
          this.src = "lib/advanced-datatable/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          /* Open this row */
          this.src = "lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
  </script>

</body>
</html>