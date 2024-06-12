<?php
include('session.php');
?>
<?php

include 'dbConfig.php';

?>
<?php

if(isset($_POST['add'])) {
    // create a variable
    $b_id=$_POST['b_id'];
    $flat_no=$_POST['flat_no'];
    $flat_name=$_POST['flat_name'];
    $building_name=$_POST['building_name'];
    $wing=$_POST['wing'];
    $room_type=$_POST['room_type'];
    $user_name=$_POST['user_name'];
    $phone=$_POST['phone'];
   // $rent_from=$_POST['rent_from'];
   // $rent_due_date=$_POST['rent_due_date'];
    $rent_paid_date=$_POST['rent_paid_date'];
    $total_rent=$_POST['total_rent'];
    $last_meter_reading=$_POST['last_meter_reading'];
    $lightbill_amt=$_POST['lightbill_amt'];
    $final_rent_amt=$_POST['final_rent_amt'];
    $paid_amt=$_POST['paid_amt'];
    $remain_amt=$_POST['remain_amt'];
 //   $month = implode(',',array_filter($_POST['month']));
    $rent_status ='Approved';
    $rent=$_POST['rent'];
    $current_meter_reading=$_POST['current_meter_reading'];
    $total_meter_reading=$_POST['total_meter_reading'];
    //Execute the query
    $query=mysqli_query($conn,"INSERT INTO flat_rent(b_id,flat_no,flat_name,building_name,wing,room_type,user_name,phone,rent,rent_paid_date,total_rent,last_meter_reading,lightbill_amt,final_rent_amt,paid_amt,remain_amt,current_meter_reading,total_meter_reading,rent_status)
		        VALUES ('$b_id','$flat_no','$flat_name','$building_name','$wing','$room_type','$user_name','$phone','$rent','$rent_paid_date','$total_rent','$last_meter_reading','$lightbill_amt','$final_rent_amt','$paid_amt','$remain_amt','$current_meter_reading','$total_meter_reading','$rent_status')");
    if($query==1)
    {
        $query1=mysqli_query($conn,"update rent_update_details set last_meter_reading='$current_meter_reading',rent_paid_date ='$rent_paid_date',remain_amt='$remain_amt' where flat_no='$flat_no' and wing='$wing' and building_name='$building_name'");
        if($query1==1)
        {

        mysqli_query($conn,"update flat_details set rent_paid_date = '$rent_paid_date' where flat_no='$flat_no' and wing='$wing' and building_name='$building_name'");
     
    if(mysqli_affected_rows($conn) > 0){
        echo '<script>alert("Successfully Submitted");</script>';        
    } else {
        echo " NOT Added<br />";
        echo mysqli_error ($conn);
    }
        }
    }
}
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

<Style>
.btn-group-xs>.btn, .btn-xs {
    padding: 1px 5px !important;
    }
.ln_solid {
   
    margin-top: 45px;
    margin-bottom: 20px;
    }
    .content-panel h4 {
    margin-left: -15px;
    }
    .Approved{
    background-color:#5cb85c !important;
    }
    </style>	
<script type="text/javascript">
function delete_data(id)
{
 if(confirm('Sure To Received Rent?'))
 {
  window.location.href='receive_rent.php?id='+id;
 }
}
</script>
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
            <a   href="home.php">
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
             <a  class="active" href="view-rent-flat.php">
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
          
          
 			 <li>
             <a href="view-user.php">
             <i class="fa fa-user-circle-o"></i>
              <span>Add User</span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
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
       <div class="main-title-div">
       <?php 
            		 $building_name=$_REQUEST['building_name'];
            		 $id=$_REQUEST['b_id'];
            		 $wing=$_REQUEST['wing'];
            		 $flat_no=$_REQUEST['flat_no'];
            		 $flat_name=$_REQUEST['flat_name'];
            		 ?>
      <span class="main-title">Building : <b><?php echo $building_name;?></b>, Flat No : <b><?php echo $flat_name;?></b>, Wing : <b><?php echo $wing;?></b></span>  
         <ul class="breadcrumb">
          <li>Rent</li>
          <li>Building</li>
           <li>Wing</li>
            <li>Tenant Rent</li>
        </ul></div>
             
       <div class="showback">            
                     <button data-toggle="modal" data-target="#add-modal" id="getUser" class="btn btn-success add-btn"><i class="fa fa-edit"></i> Pay Rent</button>
       
          </div>  

  
              
            <div class="row mt1">
          		<div class="col-lg-12">
           			 <div class="content-panel">
            		 <div class="col-lg-12"><div class="col-lg-6"><h4>Tenant Details</h4></div>
            		 <?php 
            		 $building_name=$_REQUEST['building_name'];
            		 $id=$_REQUEST['b_id'];
            		 $wing=$_REQUEST['wing'];
            		 ?>
            		     <div class="col-lg-6"><a href="view-rent-flat-details.php?building_name=<?php echo $building_name;?>&wing=<?php echo $wing;?>&b_id=<?php echo $id;?>"><button type="button" class="float-r back-btn btn btn-secondary btn-sm"><i class="fa fa-mail-reply-all"></i>Back</button></a>
            		 </div>
            	</div>	
            		 
  		<div class="adv-table" id="no-more-tables">
                            <table id="" class="table  table-striped">
			    <thead >
				<tr role="row">
					<th role="columnheader">Tenant Name</th>
					<th role="columnheader">Mobile</th>				
					<th role="columnheader">Rent</th>			
					<th role="columnheader">Maintenance</th>	
				 	<th role="columnheader">Final Rent</th>	
                    <th role="columnheader">Deposite</th>	
					<th role="columnheader">Amount Per Unit</th>
					<th role="columnheader">Rent Due Date</th>
					<th role="columnheader">View</th>					
				
				
				</tr>
			   </thead>
<?php
include 'dbConfig.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$building_name=$_REQUEST['building_name'];
$id=$_REQUEST['b_id'];
$wing=$_REQUEST['wing'];
$flat_no=$_REQUEST['flat_no'];
$sql = "select * from flat_rental where flat_no='$flat_no' and building_name='$building_name' and wing='$wing'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
?>
			      <tbody>
                         <?php 
                         $count = 1;
                         while($row = $result->fetch_assoc()) {
                             ?>
                        <tr>
       					 <td data-title="Tenant Name"><?php echo $row["user_name"];  ?></td>   
                          <td data-title="Phone"><?php echo $row["phone"];  ?></td>   
                          <td data-title="Rent"><?php echo $row["rent"];  ?></td>  
                          <td data-title="Maintenance"><?php echo $row["maintainence"];  ?></td>   
                          <td data-title="Final Rent"><?php echo $row["final_rent"];  ?></td> 
                         <td data-title="Deposite"><?php echo $row["Deposite"];  ?></td> 
                          <td data-title="Amt Per Unit"><?php echo $row["amt_per_unit"];  ?></td>   
                          <td data-title="Rent Due"><?php echo $row["rent_due_date"];  ?> <?php echo date('M Y'); ?></td> 
                          <td data-title="Action"><button data-toggle="modal" data-target="#view-modal" id="getUser" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></button></td>    
                        </tr>
                       	<?php 
                       	    $count=$count+1;}
                            } else {
                                echo "0 results";
                            }                          
                            mysqli_close($conn);
                            ?>
                      </tbody>
		</table> 


         </div>
  </div>
  </div>
  </div>
  
  
              <div class="row mt1">
          		<div class="col-lg-12">
           			 <div class="content-panel">
            		 <div class="col-lg-12"><div class="col-lg-6"><h4>Rent Details</h4></div>
            		 <?php 
            		   $building_name=$_REQUEST['building_name'];
            		   $id=$_REQUEST['b_id'];
            		   $wing=$_REQUEST['wing'];
            		 ?>
            		
            		 </div>
            		 	<div class="ln_solid"></div>
  		<div class="adv-table" id="no-more-tables">
                <table id="example" class="table table-hover table-striped">
			    <thead >
				<tr role="row">
					<th role="columnheader">Tenant Name</th>
					<th role="columnheader">Mobile</th>	
					<th role="columnheader">Rent Date</th>					
					<th role="columnheader">Last Meter Reading</th>	
					<th role="columnheader">Current Meter Reading</th>
					<th role="columnheader">Meter Reading</th>
					<th role="columnheader">Lightbill</th>
					<th role="columnheader">Final Rent</th>
					<th role="columnheader">Paid Rent</th>
					<th role="columnheader">Remain Rent</th>		
					<th role="columnheader">Status</th>					
				    <th role="columnheader">Rent Accept</th>			
				
				</tr>
			   </thead>
<?php
include 'dbConfig.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$building_name=$_REQUEST['building_name'];
$id=$_REQUEST['b_id'];
$wing=$_REQUEST['wing'];
$flat_no=$_REQUEST['flat_no'];
$sql = "select * from  flat_rent where flat_no='$flat_no' and building_name='$building_name' and wing='$wing'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
?>
			      <tbody>
                         <?php 
                         $count = 1;
                         while($row = $result->fetch_assoc()) {
                             ?>
                        <tr>
       					 <td data-title="Tenant Name"><?php echo $row["user_name"];  ?></td>   
                          <td data-title="Phone"><?php echo $row["phone"];  ?></td>   
                          <td data-title="Rent Date"><?php echo $row["rent_paid_date"];  ?></td>      
                          <td data-title="Last Reading"><?php echo $row["last_meter_reading"];  ?></td>   
                          <td data-title="Current Reading"><?php echo $row["current_meter_reading"];  ?></td>   
                          <td data-title="Meter Reading"><?php echo $row["total_meter_reading"];  ?></td> 
                          <td data-title="Lightbill"><?php echo $row["lightbill_amt"];  ?></td> 
                          <td data-title="Final rent"><?php echo $row["final_rent_amt"];  ?></td>  
                          <td data-title="Rent Due"><?php echo $row["paid_amt"];  ?></td> 
                          <td data-title="Rent Due"><?php echo $row["remain_amt"];  ?></td> 
                        
  						  <td data-title="Action">
  						   <span class="label label-warning <?php echo $row["rent_status"];  ?>"><?php echo $row["rent_status"];  ?></span>
  						  </td> 
  						  <td> <a href="javascript:delete_data(<?php echo $row["id"]; ?>)">  <?php if($row["rent_status"]=='Approved'){?> <button class="btn btn-success btn-xs fa fa-check " disabled></button><?php } else { ?> <button class="btn btn-success btn-xs fa fa-check " ></button></a><?php }?></td>
                        </tr>
                       	<?php 
                       	    $count=$count+1;}
                            } else {
                                echo "";
                            }                          
                            mysqli_close($conn);
                            ?>
                      </tbody>
		</table>  
          


         </div>
  </div>
  </div>
  </div>
      </section>
      <?php include 'modal-rent.php' ?>
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
  
  
  <script type="text/javascript" src="lib/adv-export/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="lib/adv-export/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="lib/adv-export/jszip.min.js"></script>
  <script type="text/javascript" src="lib/adv-export/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" src="lib/adv-export/buttons.html5.min.js"></script>
  <!--script for this page-->
    <script>
  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
           
            'excelHtml5',
          
            'pdfHtml5'
        ]
    } );
} );
  </script>
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