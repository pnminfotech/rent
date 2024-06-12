<?php
include('session.php');
?>
<?php

include 'dbConfig.php';
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
?>
<?php

if(isset($_POST['add'])) {
//error_reporting(0);
    // create a variable
    $b_id=$_POST['b_id'];
    $flat_no=$_POST['flat_no'];
    $flat_name=$_POST['flat_name'];
    $building_name=$_POST['building_name'];
    $area=$_POST['area'];
    $wing=$_POST['wing'];
    $room=$_POST['room'];
    $area_sq_ft=$_POST['area_sq_ft'];
    $user_name=$_POST['user_name'];
    $phone=$_POST['phone'];
    $phone2=$_POST['phone2'];
    $email=$_POST['email'];
    $working_place=$_POST['working_place'];
    $rent=$_POST['rent'];
    $adhar_no=$_POST['adhar_no'];
    $Deposite=$_POST['Deposite'];
    $Family_members=$_POST['Family_members'];
	$female_members=$_POST['female_members'];
    $child_members=$_POST['child_members'];
	$male_members=$_POST['male_members'];
    $family_members_name=$_POST['family_members_name'];
    $current_meter_reading=$_POST['current_meter_reading'];
    $previous_address=$_POST['previous_address'];
    $age=$_POST['age'];
    $address=$_POST['address'];
    $final_rent=$_POST['final_rent'];
    $rent_due_date=$_POST['rent_due_date'];
    $from_date=$_POST['from_date'];
    $adhar_card = addslashes(file_get_contents($_FILES["adhar_card"]["tmp_name"])); 
    $pancard = addslashes(file_get_contents($_FILES["pancard"]["tmp_name"])); 
    $lightbill = addslashes(file_get_contents($_FILES["lightbill"]["tmp_name"])); 
    $photo = addslashes(file_get_contents($_FILES["photo"]["tmp_name"])); 
    $id_proof = addslashes(file_get_contents($_FILES["id_proof"]["tmp_name"])); 
    $maintainence=$_POST['maintainence'];
    $amt_per_unit=$_POST['amt_per_unit'];
    $natureofwork=$_POST['natureofwork'];
    $ref_person_one=$_POST['ref_person_one'];
    $ref_person_two=$_POST['ref_person_two'];
    $status = 'Occupied';
    $agent_details = $_POST['agent_details'];
    //Execute the query
    
    $query=mysqli_query($conn,"INSERT INTO flat_rental (b_id,flat_no,flat_name,building_name,area,room,wing,area_sq_ft,user_name,phone,phone2,email,working_place,rent,Deposite,Family_members,family_members_name,current_meter_reading,address,rent_due_date,from_date,status,maintainence,amt_per_unit,final_rent,adhar_no,id_proof,male_members,female_members,child_members,previous_address,age,natureofwork,ref_person_one,ref_person_two,agent_details)
		        VALUES ('$b_id','$flat_no','$flat_name','$building_name','$area','$room','$wing','$area_sq_ft','$user_name','$phone','$phone2','$email','$working_place','$rent','$Deposite','$Family_members','$family_members_name','$current_meter_reading','$address','$rent_due_date','$from_date','$status','$maintainence','$amt_per_unit','$final_rent','$adhar_no','$id_proof','$male_members','$female_members','$child_members','$previous_address','$age','$natureofwork','$ref_person_one','$ref_person_two','$agent_details')");
    if($query==1)
    {
        $last_id = $conn->insert_id;
    	if(!empty($adhar_card))
        {
            $query=mysqli_query($conn,"update  flat_rental set adhar_card='$adhar_card' where id='$last_id' and b_id='$b_id'");
        }
        if(!empty($pancard))
        {
            $query=mysqli_query($conn,"update  flat_rental set pancard='$pancard' where id='$last_id' and b_id='$b_id'");
        }
        if(!empty($lightbill))
        {
            $query=mysqli_query($conn,"update  flat_rental set lightbill='$lightbill' where id='$last_id' and b_id='$b_id'");  
        }
        if(!empty($photo))
        {
            $query=mysqli_query($conn,"update  flat_rental set photo='$photo' where id='$last_id' and b_id='$b_id'");
        }
        $query1=mysqli_query($conn,"update flat_details set status='$status',rent_due_date  = '$rent_due_date' where flat_no='$flat_no' and wing='$wing' and building_name='$building_name'");
        if($query1==1){
            mysqli_query($conn,"update rent_update_details set status='$status',user_name='$user_name',phone='$phone',rent_from='$from_date',rent_due_date='$rent_due_date',rent_paid_date='$from_date',last_meter_reading='$current_meter_reading',per_unit_reading='$amt_per_unit',final_rent_amt='$final_rent',remain_amt='0' where flat_no='$flat_no' and wing='$wing' and building_name='$building_name'");
            if(mysqli_affected_rows($conn) > 0){
                echo '<script>alert("Successfully Add Tenant");</script>';
            } else {
                echo "NOT Added<br />";
                echo mysqli_error ($conn);
            }
        }
  
    }
else{
echo "NOT Added<br />";
                echo mysqli_error ($conn);
}
}

//error_reporting(0);
if(isset($_POST['update-form'])) {
    // create a variable
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
    $b_id=$_POST['b_id'];
    $id=$_POST['id'];
    $flat_no=$_POST['flat_no'];  
    $building_name=$_POST['building_name'];
    $area=$_POST['area'];
    $wing=$_POST['wing'];
    $room=$_POST['room'];
    $area_sq_ft=$_POST['area_sq_ft'];
    $user_name=$_POST['user_name'];
    $phone=$_POST['phone'];
    $phone2=$_POST['phone2'];
    $email=$_POST['email'];
    $working_place=$_POST['working_place'];
    $rent=$_POST['rent'];
    $Deposite=$_POST['Deposite'];
    $Family_members=$_POST['Family_members'];
    $family_members_name=$_POST['family_members_name'];
    $current_meter_reading=$_POST['current_meter_reading'];
    $address=$_POST['address'];
    $final_rent=$_POST['final_rent'];
    $rent_due_date=$_POST['rent_due_date'];
    $from_date=$_POST['from_date'];
    $adhar_card = addslashes(file_get_contents($_FILES["adhar_card"]["tmp_name"])); 
    $pancard = addslashes(file_get_contents($_FILES["pancard"]["tmp_name"])); 
    $lightbill = addslashes(file_get_contents($_FILES["lightbill"]["tmp_name"])); 
    $photo = addslashes(file_get_contents($_FILES["photo"]["tmp_name"])); 
    $id_proof = addslashes(file_get_contents($_FILES["id_proof"]["tmp_name"])); 
    $adhar_no=$_POST['adhar_no'];
    $maintainence=$_POST['maintainence'];
    $amt_per_unit=$_POST['amt_per_unit'];
    $natureofwork=$_POST['natureofwork'];
    $ref_person_one=$_POST['ref_person_one'];
    $ref_person_two=$_POST['ref_person_two'];
    $status = 'Occupied';
    $agent_details = $_POST['agent_details'];
    $previous_address=$_POST['previous_address'];
    $age=$_POST['age'];
	$female_members=$_POST['female_members'];
    $child_members=$_POST['child_members'];
	$male_members=$_POST['male_members'];
    //Execute the query
    
    $query=mysqli_query($conn,"update  flat_rental set b_id='$b_id',flat_no='$flat_no',building_name='$building_name',area='$area',room='$room',wing='$wing',area_sq_ft='$area_sq_ft',user_name='$user_name',phone='$phone',phone2='$phone2',email='$email',working_place='$working_place',rent='$rent',Deposite='$Deposite',Family_members='$Family_members',family_members_name='$family_members_name',
            current_meter_reading='$current_meter_reading',address='$address',rent_due_date='$rent_due_date',from_date='$from_date',male_members='$male_members',female_members='$female_members',child_members='$child_members',previous_address='$previous_address',age='$age',natureofwork='$natureofwork',ref_person_one='$ref_person_one',ref_person_two='$ref_person_two',agent_details='$agent_details',
            status='$status',maintainence='$maintainence',adhar_no='$adhar_no',amt_per_unit='$amt_per_unit',final_rent='$final_rent' where flat_no='$flat_no' and wing='$wing' and building_name='$building_name' and b_id='$b_id' and id='$id'");
    if($query == 1)
    {
   
        if(!empty($id_proof))
        {
            $query=mysqli_query($conn,"update flat_rental set id_proof='$id_proof' where flat_no='$flat_no' and wing='$wing' and building_name='$building_name' and b_id='$b_id' and id='$id'");
        }
        if(!empty($adhar_card))
        {
            $query=mysqli_query($conn,"update flat_rental set adhar_card='$adhar_card' where flat_no='$flat_no' and wing='$wing' and building_name='$building_name' and b_id='$b_id' and id='$id'");
        }
        if(!empty($pancard))
        {
            $query=mysqli_query($conn,"update  flat_rental set pancard='$pancard' where flat_no='$flat_no' and wing='$wing' and building_name='$building_name' and b_id='$b_id' and id='$id'");
        }
        if(!empty($lightbill))
        {
            $query=mysqli_query($conn,"update  flat_rental set lightbill='$lightbill' where flat_no='$flat_no' and wing='$wing' and building_name='$building_name' and b_id='$b_id' and id='$id'");      
        }
        if(!empty($photo))
        {
            $query=mysqli_query($conn,"update  flat_rental set photo='$photo' where flat_no='$flat_no' and wing='$wing' and building_name='$building_name' and b_id='$b_id' and id='$id'");      
        }

        $query12=mysqli_query($conn,"update flat_details set status='$status',rent_due_date  = '$rent_due_date' where flat_no='$flat_no' and wing='$wing' and building_name='$building_name'");
        if($query12 ==1){
            mysqli_query($conn,"update rent_update_details set status='$status',user_name='$user_name',phone='$phone',rent_from='$from_date',rent_due_date='$rent_due_date',rent_paid_date='$from_date',last_meter_reading='$current_meter_reading',per_unit_reading='$amt_per_unit',final_rent_amt='$final_rent',remain_amt='0' where flat_no='$flat_no' and wing='$wing' and building_name='$building_name'");
            if(mysqli_affected_rows($conn) > 0){
                echo '<script>alert("Successfully update Tenant");</script>';
            } else {
          
              echo '<script>alert("Successfully update Tenant");</script>';
            }
        }
  
    }
else{
   echo("Error description: " . mysqli_error($conn));
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
<script type="text/javascript">
function delete_data(id)
{
 if(confirm('Sure To Remove This Record ?'))
 {
  window.location.href='remove_tenant.php?id='+id;
 }
}
</script>
<Style>
.ln_solid {
   
    margin-top: 45px;
    margin-bottom: 20px;
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
             <a class="active" href="view-tenant-building.php">
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
          <li>Tenant Details</li>
          <li>Building</li>
          <li>Wing</li>
          <li>Tenant </li>
        </ul></div>
   
      
            <div class="showback">    
         <?php 
         $building_name=$_REQUEST['building_name'];
$id=$_REQUEST['b_id'];
$wing=$_REQUEST['wing'];
$flat_no=$_REQUEST['flat_no'];
$sql = "select * from flat_details where flat_no='$flat_no' and building_name='$building_name' and b_id=$id and wing='$wing'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>       


                    <?php if($row["status"]=='Empty'){?> <button data-toggle="modal" data-target="#add-modal" id="getUser" class="btn btn-success add-btn"><i class="fa fa-edit"></i> Add Tenant</button><?php } else {?>
     					 <button data-toggle="modal" data-target="#add-modal" id="getUser" disabled class="btn btn-success add-btn"><i class="fa fa-edit"></i> Add Tenant</button> <?php }?>
<?php }}?>   
          </div>   
      
      
            <div class="row mt1">
          		<div class="col-lg-12">
           			 <div class="content-panel">
           			
            		 <div class="col-lg-12"><div class="col-lg-6"><h4>Flat Details</h4></div>
            	
            		 <div class="col-lg-6"><a href="view-tenant-flat-details.php?building_name=<?php echo $building_name;?>&wing=<?php echo $wing;?>&b_id=<?php echo $id;?>"><button type="button" class="float-r back-btn btn btn-secondary btn-sm"><i class="fa fa-mail-reply-all"></i>Back</button></a>
            		 </div>
            		 </div>
            		 
  		<div class="adv-table" id="no-more-tables">
                <table id="" class="table  table-striped">
			    <thead >
				<tr role="row">
					<th role="columnheader">Flat No</th>
					<th role="columnheader">Wing</th>
					<th role="columnheader">room_type</th>				
					<th role="columnheader">property</th>	
					<th role="columnheader">Sqft</th>
					<th role="columnheader">Owner Name</th>
					<th role="columnheader">Phone</th>
					<th role="columnheader">Meter</th>					
					<th role="columnheader">Floor</th>		
				
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
$sql = "select * from flat_details where flat_no='$flat_no' and building_name='$building_name' and b_id=$id and wing='$wing'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
?>
			      <tbody>
                         <?php 
                         $count = 1;
                         while($row = $result->fetch_assoc()) {
                             ?>
                        <tr>
	                          <td data-title="Flat No"><?php echo $row["flat_no"];?></td>   
                                <td data-title="Wing"><?php echo $row["wing"];?></td>   
                               <td data-title="Room Type"><?php echo $row["room_type"];?></td>   
                               <td data-title="Property"><?php echo $row["property"];?></td>   
                               <td data-title="Sq Ft"><?php echo $row["sq_ft"];?></td>   
                               <td data-title="Owner"><?php echo $row["owner_name"];?></td>    
                               <td data-title="Phone"><?php echo $row["phone"];?></td>    
                               <td data-title="Meter No"><?php echo $row["meter_no"];?></td>           
                               <td data-title="Floor"> <?php echo $row["floor"];?></td>   
                              
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
            		 <div class="col-lg-12"><div class="col-lg-6"><h4>Tenant Details</h4></div>
            		 <?php 
            		 $building_name=$_REQUEST['building_name'];
            		 $id=$_REQUEST['b_id'];
            		 $wing=$_REQUEST['wing'];
            		 ?>
            		
            		 </div>
            		 	<div class="ln_solid"></div>
  		<div class="adv-table" id="no-more-tables">
                <table id="" class="table table-striped">
			    <thead >
				<tr role="row">
					<th role="columnheader">Tenant Name</th>
					<th role="columnheader">Mobile</th>		
				
					<th role="columnheader">Total Rent</th>
							
					<th role="columnheader">Deposite</th>	
					<th role="columnheader">Amount Per Unit</th>
				
					<th role="columnheader">Rent From</th>	
					<th role="columnheader">Rent Date</th>
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
$sql = "select * from flat_rental where flat_no='$flat_no' and building_name='$building_name' and wing='$wing' and status='Occupied'";
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
                       
                          <td data-title="Rent"><?php echo $row["final_rent"];  ?></td>  
                          
                          <td data-title="Deposite"><?php echo $row["Deposite"];  ?></td>   
                          <td data-title="Amt Per Unit"><?php echo $row["amt_per_unit"];  ?></td>   
                        
                          <td data-title="From Date"><?php echo $row["from_date"];  ?></td>   
                          <td data-title="Rent Due"><?php echo $row["rent_due_date"];  ?></td> 
                          <td data-title="Action"><button data-toggle="modal" data-target="#view-modal-police" id="getUser" class="btn btn-sm btn-info">Police <i class="fa fa-print"></i></button> <button data-toggle="modal" data-target="#view-modal" id="getUser" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></button> <button data-toggle="modal" data-target="#update-modal" id="getUser" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i></button>
                              <a href="javascript:delete_data(<?php echo $row["id"]; ?>)"> <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                          </td> 
                               
    
                        </tr>
                       	<?php 
                       	    $count=$count+1;}
                            } else {
                                echo "<center>0  results </center>";
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
            		 <div class="col-lg-12"><div class="col-lg-6"><h4>Old Tenant Details</h4></div>
            		 <?php 
            		 $building_name=$_REQUEST['building_name'];
            		 $id=$_REQUEST['b_id'];
            		 $wing=$_REQUEST['wing'];
            		 ?>
            		
            		 </div>
            		 	<div class="ln_solid"></div>
  		<div class="adv-table" id="no-more-tables">
                <table id="hidden-table-info" class="table table-striped">
			    <thead >
				<tr role="row">
					<th role="columnheader">Tenant Name</th>
					<th role="columnheader">Mobile</th>		
				
					<th role="columnheader">Total Rent</th>
							
					<th role="columnheader">Deposite</th>	
					<th role="columnheader">Amount Per Unit</th>
					<th role="columnheader">Flat Given</th>
					<th role="columnheader">Rent From</th>	
					<th role="columnheader">Rent Date</th>
							
				
				
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
$sql = "select * from flat_rental where flat_no='$flat_no' and building_name='$building_name' and wing='$wing' and status='Empty'";
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
                       
                          <td data-title="Rent"><?php echo $row["final_rent"];  ?></td>  
                          
                          <td data-title="Deposite"><?php echo $row["Deposite"];  ?></td>   
                          <td data-title="Amt Per Unit"><?php echo $row["amt_per_unit"];  ?></td>   
                          <td data-title="Flat Given"><?php echo $row["flat_given_on"];  ?></td> 
                          <td data-title="From Date"><?php echo $row["from_date"];  ?></td>   
                          <td data-title="Rent Due"><?php echo $row["rent_due_date"];  ?></td> 
                      
                               
    
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
  </div>
  </div>
      </section>
<?php include 'modal_tentant.php' ?>
       <?php include 'modal_police.php' ?>
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