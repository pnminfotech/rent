<?php
include('session.php');
?>
<?php
include 'dbConfig.php';
?>

<?php 
error_reporting(0);

if(isset($_POST['add'])) {
    // create a variable

    $building_name=$_POST['building_name'];
    $area=$_POST['area'];
    $consumer_name=$_POST['consumer_name'];
    $meter_no=$_POST['meter_no'];
    $date=$_POST['date'];
    $total_reading=$_POST['total_reading'];
    $amount=$_POST['amount'];
    $b_id=$_POST['b_id'];
    $b_light_id=$_POST['b_light_id'];
    $photo = addslashes(file_get_contents($_FILES["photo"]["tmp_name"])); 
    $query=mysqli_query($conn,"INSERT INTO building_lightbill_payment(building_name,area,consumer_name,meter_no,date,total_reading,amount,b_id,b_light_id)
		        VALUES ('$building_name','$area','$consumer_name','$meter_no','$date','$total_reading','$amount','$b_id','$b_light_id')");
    if($query==1)
    {
        if(!empty($photo))  
        {
            $last_id = $conn->insert_id;
            mysqli_query($conn,"update building_lightbill_payment set photo = '$photo' where id='$last_id'");
      
        }
            if(mysqli_affected_rows($conn) > 0){
                echo '<script>alert("Successfully Submitted");</script>';
            } else {
                echo " NOT Added<br />";
                echo mysqli_error ($conn);
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
  <title>Pnm Infotech</title>

  

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
function delete_data(id)
{
 if(confirm('Sure To Remove This Record ?'))
 {
  window.location.href='del_category.php?id='+id;
 }
}
</script>
<style>
div.dt-buttons {

    margin-left: 10px;
}
    
    @media only screen and (max-width: 768px)
    {   
    #example_filter {
    width: 100% !important;
}
#example_wrapper div.dt-buttons {
    margin-right: 20px;
    margin-bottom: 10px;
}
div.dt-buttons {
    position: relative !important;
    float: right !important
}
#example_filter:before {
    color:hotpink !important;
    content: "Building Lightbill";
    float: left;
    font-size: 18px !important;
    padding-left: 28px;
}
div.dataTables_wrapper div.dataTables_filter input {
    margin-left: 5px;
   
    width: 100px !important;
}
}

@media only screen and (max-width: 425px)
{
#example_filter:before {
    color: #ec94ec !important;
    content: "Building Lightbill";
    float: left;
    font-size: 18px !important;
    padding-left: 20px;
}
}
@media only screen and (max-width: 325px)
{
div.dataTables_wrapper div.dataTables_filter input {

    width: 75px !important;
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
            <a  href="home.php">
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
            <a class="active" href="javascript:;">
              <i class="fa fa-money"></i>
              <span>Expense</span><label class="label pull-right"><i class="fa fa-angle-down" style="color:#404E67;"></i></label>
              </a>
              <ul class="sub">
                <li class="active"><a href="view-building-lightbill.php"> Building Lightbill </a></li>
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
      <h3>Lightbill</h3>  
     
        <div class="row">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4 class="d-none hotpink">Building Lightbill</h4>
            <div class="adv-table" id="no-more-tables">
              <table cellpadding="0" cellspacing="0" border="0" class="table-striped   table table-hover table-condensed cf" id="example">
  			  														
                             <thead class="cf">
                    <tr>
                  
                   
                     <th>Building</th>
                       <th>Area</th>
					 <th>Consumer</th>  
                     <th>Meter No</th>
						  <th>Pay</th> 
                  </tr>

                  </thead>

<?php
include 'dbConfig.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from building_lightbill where meter_no <> ''";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
?>
     <tbody>
     <?php 
         $count = 1;
         while($row = $result->fetch_assoc()) {
     ?>
     <tr>
    				 	
   					
                     	<td data-title="Building"><?php echo $row["building_name"];  ?></td>
                     	<td data-title="Area "><?php echo $row["area"];  ?></td>
                        <td data-title="Consumer"><?php echo $row["consumer_name"];  ?></td>
                        <td data-title="Meter"><?php echo $row["meter_no"];  ?></td>

                       <td data-title="Pay" ><button class="btn-xs red-border red-bg new-btn" style="Cursor:pointer" data-toggle="modal" data-target="#view-modal"  data-id="<?php echo $row['id']; ?>"  id="getUser">Pay</button>
                       <button class="btn-xs  btn-warning new-btn shadow-none" style="Cursor:pointer" data-toggle="modal" data-target="#view-pay-modal"  data-id="<?php echo $row['id']; ?>"  id="getUser2">View</button>
                       </td>		    
		</tr>
		
	<?php 	
	$count=$count+1;}
                            } else {
                               
                            }
                            
                            mysqli_close($conn);
                            ?>
               </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
       <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg"> 
     <div class="modal-content modal-lg">  
   
        <div class="modal-header"> 
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button> 
           <h4 class="modal-title">
          Pay Building Lightbill
           </h4> 
        </div> 
            
        <div class="modal-body">                     
           <div id="modal-loader" style="display: none; text-align: center;">
           <!-- ajax loader -->
           <img src="ajax-loader.gif">
           </div>
                            
           <!-- mysql data will be load here -->                          
           <div id="dynamic-content"></div>
        </div> 
                        
        <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
        </div> 
                        
    </div> 
  </div>
</div>
             
 <script>  
  

 $(document).ready(function(){

    $(document).on('click', '#getUser', function(e){
  
     e.preventDefault();
  
     var uid = $(this).data('id'); // get id of clicked row
     var wid = $(this).data('weight-id'); // get id of clicked row
  
     $('#dynamic-content').html(''); // leave this div blank
     $('#modal-loader').show();      // load ajax loader on button click
 
     $.ajax({
          url: 'pay_lightbill.php',
          type: 'POST',
          data: 'id='+uid,
          dataType: 'html'
     })
     .done(function(data){
          console.log(data); 
          $('#dynamic-content').html(''); // blank before load.
          $('#dynamic-content').html(data); // load here
          $('#modal-loader').hide(); // hide loader  
     })
     .fail(function(){
          $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
          $('#modal-loader').hide();
     });

    });
});
  
 </script>
 
        <div id="view-pay-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg"> 
     <div class="modal-content modal-lg">  
   
        <div class="modal-header"> 
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button> 
           <h4 class="modal-title">
         view Building Lightbill
           </h4> 
        </div> 
            
        <div class="modal-body">                     
           <div id="modal-loader" style="display: none; text-align: center;">
           <!-- ajax loader -->
           <img src="ajax-loader.gif">
           </div>
                            
           <!-- mysql data will be load here -->                          
           <div id="dynamic-content1"></div>
        </div> 
                        
        <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
        </div> 
                        
    </div> 
  </div>
</div>
 <script>  
  

 $(document).ready(function(){

    $(document).on('click', '#getUser2', function(e){
  
     e.preventDefault();
  
     var uid = $(this).data('id'); // get id of clicked row
     var wid = $(this).data('weight-id'); // get id of clicked row
  
     $('#dynamic-content1').html(''); // leave this div blank
     $('#modal-loader').show();      // load ajax loader on button click
 
     $.ajax({
          url: 'pay_view_lightbill.php',
          type: 'POST',
          data: 'id='+uid,
          dataType: 'html'
     })
     .done(function(data){
          console.log(data); 
          $('#dynamic-content1').html(''); // blank before load.
          $('#dynamic-content1').html(data); // load here
          $('#modal-loader').hide(); // hide loader  
     })
     .fail(function(){
          $('#dynamic-content1').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
          $('#modal-loader').hide();
     });

    });
});
  
 </script>
    <!-- /MAIN CONTENT -->
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
        <a href="advanced_table.html#" class="go-top">
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
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
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
          "aTargets": [0]
        }],
        "aaSorting": [
          [0, 'asc']
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
