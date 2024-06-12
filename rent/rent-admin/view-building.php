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
<script src="ajax-js/building-data.js"></script>	
<style>
.modal-footer {

    border-top: none !important;
}
/*
	Max width before this PARTICULAR table gets nasty. This query will take effect for any screen smaller than 760px and also iPads specifically.
	*/
	#employeeList>tbody>tr>td:nth-of-type(4) {
   
    height: 29px !important;
}
	@media
	  only screen 
    and (max-width: 760px), (min-device-width: 768px) 
    and (max-device-width: 1024px)  {


		#employeeList{
			display: block;
		}
		 #thead {
			display: block;
		}
		#employeeList>tbody{
			display: block;
		}
		#employeeList>tbody>th{
			display: block;
		}
		#employeeList>tbody>tr>td, #employeeList>tbody>tr {
			display: block;
		}

		/* Hide table headers (but not display: none;, for accessibility) */
		thead tr {
			position: absolute;
			top: -9999px;
			left: -9999px;
		}


      
    tr:nth-child(odd) {
      background: #ccc;
    }
    
		td {
			/* Behave  like a "row" 
		
			 border-bottom: 1px solid #eee !important;*/
		}

		td:after {
			/* Now like a table header */
			;
			/* Top/left values mimic padding */
			top: 0;
			left: 6px;
			    float: left;
				width: 26%;
			padding-right: 10px;
			margin-left:10px;
			white-space: nowrap;
			font-weight:bold;
		}

		/*
		Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
		*/
	
		#employeeList>tbody>tr>td:nth-of-type(1):after { content: "Buiilding"; }
		#employeeList>tbody>tr>td:nth-of-type(2):after { content: "Area"; }
		#employeeList>tbody>tr>td:nth-of-type(3):after { content: "Total Flat"; }
		#employeeList>tbody>tr>td:nth-of-type(4):after { content: "Meter"; }
		#employeeList>tbody>tr>td:nth-of-type(5):after { content: "Remove"; }

	}
		@media only screen and (max-width: 768px){
		td:after {
			/* Now like a table header */
			;
			/* Top/left values mimic padding */
			top: 0;
			left: 6px;
			 float: left;
			width: 23%;
			padding-right: 10px;
			white-space: nowrap;
		}
}
		@media only screen and (max-width: 450px){
		td:after {
			/* Now like a table header */
			;
			/* Top/left values mimic padding */
			top: 0;
			left: 6px;
			 float: left;
			width: 30%;
			padding-right: 10px;
			white-space: nowrap;
		}
        #employeeList>tbody>tr>td:nth-of-type(4) {
    height: 47px !important;
}
        		#employeeList_filter:before {
  
    padding-left: 5px;
		}
	}
	@media only screen and (max-width: 325px){
		td:after {
			/* Now like a table header */
			;
			/* Top/left values mimic padding */
			top: 0;
			left: 6px;
			    float: left;
			width: 27%;
			padding-right: 10px;
			white-space: nowrap;
		}
		div.dataTables_wrapper div.dataTables_filter input {
    margin-left: 5px;
    display: block !important;
    width: 75px !important;
}
		#employeeList>tbody>tr>td, #employeeList>tbody>tr {
    display: block;
    font-size: 13px;
}
	}
	#employeeList_filter:before {
  
    color: #ec94ec !important;
    content: "Building Details";
    float:left;
    font-size:18px;
}
@media screen and (max-width: 767px){
.dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_paginate {
    float: inline-end;
}
.dataTables_info {
    width: 42%;
}
}
tr:last-child th:first-child { border-top-left-radius: 10px;    border-color: transparent; }
tr:last-child th:last-child { border-top-right-radius: 10px;     border-color: transparent;}

tbody:last-child tr:last-child td:first-child { border-bottom-left-radius: 10px;    border-color: transparent; }
tbody:last-child tr:last-child td:last-child { border-bottom-right-radius: 10px;     border-color: transparent;}
tr:first-child td { border-top-style: solid;    border-color: transparent; }
tr td:first-child { border-left-style: solid;    border-color: transparent; }
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
            <a  class="active"  href="javascript:;">
              <i class="fa fa-home"></i>
              <span>Manage Property</span><label class="label pull-right"><i class="fa fa-angle-down" style="color:#404E67;"></i></label>
              </a>
              <ul class="sub">
                 <li class="active"><a href="view-building.php">Add Building </a></li>
                 <li><a href="view-flat-building.php">Add Flat</a></li>
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
         <span class="main-title">Building Details</span>  
         <ul class="breadcrumb">
          <li>Manage Property</li>
          <li>Building</li>
        </ul></div>
         <div class="showback">            
         <a href="view-area.php"><button type="button" class="btn btn-success add-btn" >Area</button></a>&nbsp;&nbsp;&nbsp;
       <button type="button" name="add" id="addEmployee" class="btn btn-success add-btn" >Add Building</button>
          </div>
            
            <div class="row">
          		<div class="col-lg-12">
           			 <div class="content-panel">
            		
                <table role="table" id="employeeList" class="table  table-striped display  nowrap">
			    <thead id="thead" role="rowgroup">
				<tr role="row">
			
					<th role="columnheader">Building Name</th>
					<th role="columnheader">Area</th>					
					<th role="columnheader">Total flat</th>
					<th role="columnheader" style="height: 27px;">CommonMeter Number</th>				
					<th role="columnheader">Remove</th>
				</tr>
			   </thead>
		</table>              

	<div id="employeeModal" class="modal fade"   data-backdrop="static" data-keyboard="false">
    	<div class="modal-dialog modal-lg">
    	<div class="row">
    		<form method="post" id="employeeForm">
    			<div class="modal-content" >
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Building</h4>
    				</div>
    				<div class="modal-body">
					<div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 " for="first-name">Building Name <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="empName" name="building_name" required="required" class="form-control " Placeholder="Building Name">
											</div>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Area Name <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
    											 <select name="area" id="first-name" class="form-control" required="required">
                                                 	<option value="" disabled selected>Select From Here</option>
                                                       <?php  
                                                        $query = "select * from area;";  
                                                        $result = mysqli_query($conn, $query);  
                                                        while($row = mysqli_fetch_array($result))  
                                                        {  
                                                         ?>
                                                 	<option value="<?php echo $row["area"];  ?>"><?php echo $row["area"];  ?></option>
                                                 	<?php 
                                                        }
                                                        ?>
                                 		        </select>
                                             </div>
										</div><br>
										
										<div class="item form-group">
											<label class="col-form-label col-md-12 col-sm-12 " for="first-name">Wing &amp; Total Flat<span class="required">*</span>
											</label>
											<div class="col-md-12 col-sm-12">
                                             <table class="table table-bordered table-striped table-condensed" style="width:100%"" id="customFields">
                                            	 <tr>
                                                                        <th width="20" class="text-center"> S.N.</th>
                                                                     
                                                                         <th width="120" class="text-center">Total Flats</th>
                                                                        <th width="120" class="text-center">Wing Name</th>
                                                                   		 <th width="10" class="text-center"> </th>
                                                                    
                                                                    </tr>
                                                                    <tbody>
                                            		<tr id="1" >
                                                                        <td>
                                                                            1        <input type="hidden" value="1" id="1" name="sn[]" ></td>
                                                                    
                                                                         <td class="text-center">                                              
                                                                                <input required  class="form-control" name="total_flat[]" onblur="findTotal()"  type="text" placeholder="total Flat"> 
                                                                        </td>
                    
                                                                        <td class="text-center">                                              
                                                                           <!--  <input required name="weight[]" type="number" class="form-control" id="hsn" value="" placeholder="Weight"> -->
                                                                            <input required name="wing[]" class="form-control" type="text" placeholder="Wing Name"> 
                                                                        </td>
                                                                    
                                                                  <td><a href="javascript:void(0);" class="addCF"><span id="1" class="fa fa-2x fa-plus-square removeItem"></span></a></td>
                                                                    </tr>
                                            	
                                           </tbody> </table>
                                                </div>                                                     
                              
                                                  <script type="text/javascript">
                                                    function findTotal(){
                                                        var arr = document.getElementsByName('total_flat[]');
                                                        var tot=0;
                                                        for(var i=0;i<arr.length;i++){
                                                            if(parseInt(arr[i].value))
                                                                tot += parseInt(arr[i].value);
                                                        }
                                                        document.getElementById('weight2').value = tot;
                                                         document.getElementById('weight22').innerHTML = tot;
                                                    }
                                                    
                                                        </script>
										</div>

											
													<div class="item form-group">     
											<label class="col-form-label col-md-12 col-sm-12 " for="first-name">Common Meter Number<span class="required">*</span></label>
															<div class="col-md-12 col-sm-12">
																<table
																	class="table  table-striped table-condensed"
																	style="width: 100%"  id="commonNo">
																	<tr>
																		<th width="20" class="text-center">S.N.</th>
																		<th width="120" class="text-center">Common Meter</th>
																		<th width="120" class="text-center">Consumer Name</th>
																		<th width="10" class="text-center"></th>

																	</tr>
																	<tbody>
																		<tr id="1">
																			<td>1 <input type="hidden" value="1" id="1"
																				name="sn1[]"></td>

																			<td class="text-center"><input  class="form-control" name="common_meter_no[]"
																				 type="text" placeholder="Common Meter No"></td>

																			<td class="text-center"><input  class="form-control" name="consumer_name[]"
																				 type="text" placeholder="Consumer Name"></td>
																			<td><a href="javascript:void(0);" class="addCN"><span
																					id="1" class="fa fa-2x fa-plus-square removeItem"></span></a></td>
																		</tr>

																	</tbody>
																</table>
															</div>                                                     
               
							
										            </div><br>
												<div class="item form-group">
														<label class="col-form-label col-md-2 col-sm-2 " for="first-name">Total Flat<span class="required"> : </span> <span id="weight22" style="font-family: fantasy;"></span>		</label>
														
														<div class="col-md-6 col-sm-6 ">
														<input type="hidden" id="weight2" readonly name="all_flat" required="required" class="form-control" Placeholder="Total Flat">
														
										
														</div>
													</div><br>
													
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="empId" id="empId" />
    					<input type="hidden" name="action" id="action" value="" />
    					<input type="submit" name="save" id="save" class="btn btn-info add-btn" value="Save" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				</div>
    			</div>
    		</form>
    		</div>
    	</div>
    </div>
         
  </div></div></div>
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
 
$(document).ready(function(){
	$(".addCN").click(function(){
	  var counter = $("#commonNo tbody tr").length;
	  var newId = counter + 0;
		$("#commonNo").append('<tbody><tr id="1" ><td class="append-table"> '+newId+ '<input type="hidden" value="'+newId+ '" id="1" name="sn1[]" ></td><td class="text-center append-table"><input required  class="form-control" name="common_meter_no[]" type="text" placeholder="Common Meter No"></td><td class="text-center"><input required class="form-control" name="consumer_name[]" type="text" placeholder="Consumer Name"></td><td class="append-table"> <a href="javascript:void(0);" class="remCF"> <span class="fa fa-2x fa-minus-square removeItem"></span></a></td></tr></tbody>');
	});
    $("#commonNo").on('click','.remCF',function(){
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