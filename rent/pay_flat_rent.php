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
    $rent_status ='Pending';
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


<?php
if(!empty($_POST['id']))
{
   // $id = intval($_REQUEST['id']);
  
    $query = "select a.* from rent_update_details a where a.id = '".$_POST["id"]."'";
    $result = mysqli_query($conn, $query);
  ?>
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post" enctype="multipart/form-data">
<?php
    while($row = mysqli_fetch_array($result))
    {
     ?>
       								 		<div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Flat Number <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="hidden" readonly  id="first-name" name="b_id" required="required" class="form-control" value="<?php echo $id; ?>"  Placeholder="flat_no">
												<input type="hidden" readonly  id="first-name" name="flat_no" required="required" class="form-control" value="<?php echo $row["flat_no"];  ?>"  Placeholder="flat_no">
												<input type="text" readonly  id="first-name" name="flat_name" required="required" class="form-control" value="<?php echo $row["flat_name"];  ?>"  Placeholder="flat_no">
											</div>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Building Name <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="building_name" required="required" value="<?php echo $row["building_name"];  ?>" class="form-control " Placeholder="Building Name">
											</div>	
										</div>

                                        
                                  	<div class="item form-group">
												<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name"> Wing <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="wing" required="required" value="<?php echo $row["wing"];  ?>" class="form-control " Placeholder="Building Name">
											</div>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Room Type <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="room_type" required="required" value="<?php echo $row["room_type"];  ?>" class="form-control " Placeholder="Building Name">
											</div>
										</div>
										
										
										
										
											<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Renter Full Name<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" readonly name="user_name" required="required"  value="<?php echo $row["user_name"];  ?>" class="form-control " Placeholder="Renter Full Name">
											</div>
											
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Mobile NO.<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="first-name" readonly name="phone" required="required"  value="<?php echo $row["phone"];  ?>" class="form-control" Placeholder="Mobile No.">
											</div>
									
										</div>
										
										<div class="item form-group">
											
								
									
										</div>
                      
											<div class="item form-group">
											<?php 
											$create_date=$row["rent_due_date"];
											$month = date('m');
											$year = date('yy');
											$main_date= "$year-$month-$create_date";
											$rent_date=$row["rent_paid_date"]; 
											
											$ts1 = strtotime($rent_date);
											$ts2 = strtotime($main_date);
											
											$year1 = date('yy', $ts1);
											$year2 = date('yy',$ts2);
											
											$month1 = date('m', $ts1);
											$month2 = date('m',$ts2);
											
											$diff =(($year2 - $year1) * 12) +($month2 - $month1);
									  
											$diff11=substr($diff,-2);
										//    echo $diff11;
											
											    ?>
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Rent ( Last <span style=" font-family: sans-serif;font-weight:bold;"><?php  echo $diff11; ?> </span>Month 
											
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="hidden" id="" name="total_rent" readonly required="required" value="<?php echo $row["final_rent_amt"] ?>" class="form-control " Placeholder="Rent">
												<input type="text" id="rent" name="rent" readonly required="required" value="<?php echo $row["final_rent_amt"] * $diff11; ?>" class="form-control " Placeholder="Rent">
											</div>
										
											
   									    	<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Pending Amout<span class="required">*</span></label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="pending_amt" name="pen" readonly required="required" value="<?php echo $row["remain_amt"]; ?>" oninput="weightConverter()" onchange="weightConverter()" class="form-control " Placeholder="Current Meter Reading">
											</div>
											

									     	</div>
                      
                      	<div class="item form-group">
										
												<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Last Meter Reading <span class="required">*</span></label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="weight1" name="last_meter_reading" readonly required="required" value="<?php echo $row["last_meter_reading"]; ?>" oninput="weightConverter()" onchange="weightConverter()" class="form-control " Placeholder="Current Meter Reading">
											</div>
											
												<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Current Meter Reading <span class="required">*</span></label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="weight2" name="current_meter_reading" required="required" value=""  oninput="weightConverter()" onkeyup="weightConverter()" class="form-control " Placeholder="Current Meter Reading">
											</div>
											
										</div>
											
										<div class="item form-group">

											   <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Total Reading <span class="required">*</span></label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="outputTon" readonly name="total_meter_reading" required="required" value="0" class="form-control " Placeholder="">
											</div>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Total LightBill Pay<span class="required">*</span></label>
											<div class="col-md-4 col-sm-4 ">
												<input type="hidden" id="amount_unit" name="" readonly  value="<?php echo $row["per_unit_reading"]; ?>"  class="form-control " Placeholder="Total Lightbill">									
												<input type="text" id="bill" readonly name="lightbill_amt" required="required" value=""  class="form-control"  Placeholder="Total Lightbill">
											</div>
											
										</div>
										
										<div class="item form-group">
										
											


											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Total Rent<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="total_rent" name="final_rent_amt" readonly   class="form-control " Placeholder="Total Rent">
											</div>
											
											
										
										
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Paid Rent<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="paid_rent" name="paid_amt" required="required" oninput="paidrent()" onchange="paidrent()" class="form-control" Placeholder="Paid Rent">
											</div>
											
													<script>
                                                        function weightConverter() {
                                                          var first_number = document.getElementById("weight1").value;
                                                          var second_number =document.getElementById("weight2").value;
                                                          var third_number =document.getElementById("amount_unit").value;
                                                          var fourth_number =document.getElementById("bill").value;
                                                          var rent =document.getElementById("rent").value;
                                                          var pending_amt = document.getElementById("pending_amt").value;
                                                            var result = (parseInt(second_number) - parseInt(first_number));
 														    var result2 = ((parseInt(second_number) - parseInt(first_number)) * parseInt(third_number));
 														    var result3 = parseInt(rent) + parseInt(fourth_number) + parseInt(pending_amt);
                                                            document.getElementById("outputTon").value=result;
                                                            document.getElementById("bill").value=result2;
                                                            document.getElementById("total_rent").value=result3;
                                                        }   
       
                                                   </script>  
											
										  </div>
										
										
										<div class="item form-group">
											
											
										   <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Remaining Rent<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="remain_rent" readonly name="remain_amt" required="required"  class="form-control" Placeholder="Remaining Rent">
											</div>
												<script>
										             function paidrent() {
                                                          var first_number = document.getElementById("total_rent").value;
                                                          var second_number =document.getElementById("paid_rent").value;
                                                        
                                                            var result = (parseInt(first_number) - parseInt(second_number) );
 														   
                                                            document.getElementById("remain_rent").value=result;
                                                      
                                                        }  
                                                        </script>
												</div>
										
										
										<br>
										
										<div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Rent Date <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="date" id="first-name" name="rent_paid_date" required="required"  class="form-control " Placeholder="Address">
											</div>
										
										</div>
									
										
										<div class="item form-group">
											<div class="pad-20 col-md-6 col-sm-6 offset-md-3" style="float:right;text-align: end">
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" name="add" class="add-btn btn btn-success">Submit</button>
											</div>
										</div>


									</form>
       
                <?php
    }
  
}
?>