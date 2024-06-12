   <div id="update-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg"> 
     <div class="modal-content modal-lg">  
   
        <div class="modal-header"> 
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button> 
            <h4 class="modal-title">
             Add Tenant Details
           </h4> 
        </div> 
        <div class="modal-body">                     
    <?php   
    include 'dbConfig.php';
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
$building_name=$_REQUEST['building_name'];
$b_id=$_REQUEST['b_id'];
$wing=$_REQUEST['wing'];
$flat_no=$_REQUEST['flat_no'];
        
$sql = "select a.* from flat_rental a where  a.flat_no='$flat_no' and a.building_name='$building_name' and a.wing='$wing' and status='Occupied'";
//$sql = "select a.*,b.building FROM building b,flat_details a where a.flat_no='$flat_no' and a.building_name='$building_name' and a.b_id=$id and a.wing='$wing' and a.building_name=b.building_name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

?>                          
           <!-- mysql data will be load here -->                          
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post" enctype="multipart/form-data">
  <h5><b> Flat Details :</b> </h5>
										<div class="item form-group">
							
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Flat Number <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
                                               <input type="hidden" readonly  id="first-name" name="id" required="required" class="form-control" value="<?php echo $row["id"];  ?>"  Placeholder="flat_no">
											   <input type="hidden" readonly  id="first-name" name="b_id" required="required" class="form-control" value="<?php echo $b_id;  ?>"  Placeholder="flat_no">
											   <input type="hidden" readonly  id="first-name" name="flat_no" required="required" class="form-control" value="<?php echo $row["flat_no"];  ?>"  Placeholder="flat_no">
                                               <input type="text" readonly  id="first-name" name="flat_name" required="required" class="form-control" value="<?php echo $row["flat_name"];  ?>"  Placeholder="flat name">
											</div>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Building Name <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="building_name" required="required" value="<?php echo $row["building_name"];  ?>" class="form-control " Placeholder="Building Name">
											</div>	
										</div>
										
										<div class="item form-group">
										
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name"> Area <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="area" required="required" value="<?php echo $row["area"];  ?>" class="form-control " Placeholder="Building Name">
											</div>
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Room Type <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="room" required="required" value="<?php echo $row["room"];  ?>" class="form-control " Placeholder="Building Name">
											</div>
										</div>
										
										
										<div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Area Sq.ft <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="area_sq_ft" required="required" value="<?php echo $row["area_sq_ft"];  ?>" class="form-control " Placeholder="Building Name">
											</div>
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name"> Wing <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="wing" required="required" value="<?php echo $row["wing"];  ?>" class="form-control " Placeholder="Building Name">
											</div>
											
										</div>
										
                                          <hr style="border-color:black;">
										   <h5><b> Tenant Details :</b> </h5>
											<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Renter Full Name<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="user_name" required="required"   value="<?php echo $row["user_name"];  ?>" class="form-control " Placeholder="Renter Full Name">
											</div>
											<script>
											function check()
                                            {
                                            
                                                var mobile = document.getElementById('mobile');
                                               
                                                
                                                var message = document.getElementById('message');
                                            
                                               var goodColor = "transparent";
                                                var badColor = "Red";
                                              
                                                if(mobile.value.length!=10){
                                                   
                                                    mobile.style.borderColor = badColor;
                                                    message.style.color = badColor;
                                                    message.innerHTML = "required 10 digits, match requested format!"
                                                }
                                                else{
                                                    mobile.style.borderColor = goodColor;
                                                    message.style.color = goodColor;
                                                    message.innerHTML = ""
                                                }}
											</script>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Mobile NO.<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="mobile" onkeyup="check(); return false;" value="<?php echo $row["phone"];  ?>" name="phone" required="required" class="form-control" Placeholder="Mobile No."><span id="message"></span>
											</div>
									
										</div>
										
										<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Alternate Mobile No.
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="phone2" class="form-control " value="<?php echo $row["phone2"];  ?>" Placeholder="Alternate Mobile No.">
											</div>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Email
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="email"   class="form-control " value="<?php echo $row["email"];  ?>" Placeholder="Email Id">
											</div>
											
									
										</div>
                                       <div class="item form-group">
										
												<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Permanent Address<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<textarea id="first-name" name="address" required="required"  class="form-control " Placeholder="Permanent Address"><?php echo $row["address"];  ?></textarea>
											</div>
										<!--  
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Flat Given On<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="date" id="first-name" name="flat_given_on" required="required" class="form-control" Placeholder="Flat Given On">
											</div>
-->
										<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Previous Address
											</label>
											<div class="col-md-4 col-sm-4 ">
												<textarea id="first-name" name="previous_address" class="form-control " Placeholder="Previous Address"><?php echo $row["previous_address"];  ?></textarea>
											</div>
										
										</div>
         							   <div class="item form-group">
										
										 
                                        <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Adhar Card No<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="adhar_no" name="adhar_no" data-type="adhaar-number" value="<?php echo $row["adhar_no"];  ?>" maxLength="14" required="required" class="form-control" Placeholder="Adhar Card No">
											</div>

                                          <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Age<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" name="age" class="form-control"  value="<?php echo $row["age"];  ?>"  Placeholder="Age">
											</div>
										</div>
            
                                         <hr style="border-color:black;">
										   <h5><b> Rent  Details : </b> </h5>
									
										<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Rent (in Rs.) <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="weight1" name="rent" required="required"  value="<?php echo $row["rent"];  ?>" oninput="weightConverter()" onchange="weightConverter()"  class="form-control " Placeholder="Rent">
											</div>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Maintenance<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="weight2" name="maintainence" required="required"  value="<?php echo $row["maintainence"];  ?>" oninput="weightConverter()" onchange="weightConverter()" class="form-control " Placeholder="Maintainence">
											</div>
										
									
										</div>
										
										<div class="item form-group">
										
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Final Rent <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="outputTon" name="final_rent" readonly value="<?php echo $row["final_rent"];  ?>" required="required" class="form-control" Placeholder="0.00">
											</div>
									                  <script>
                                                        function weightConverter() {
                                                          var first_number = document.getElementById("weight1").value;
                                                          var second_number =document.getElementById("weight2").value;
                                                          
                                                           var result = (parseInt(first_number) + parseInt(second_number));
                                                          document.getElementById("outputTon").value=result;
                                                        }           
                                                   </script>  
	<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Deposite (in Rs.)<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="first-name" name="Deposite" required="required" value="<?php echo $row["Deposite"];  ?>" class="form-control" Placeholder="Deposite">
											</div>
										</div>
									
									         <script>
$('[data-type="adhaar-number"]').keyup(function() {
  var value = $(this).val();
  value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join("-");
  $(this).val(value);
});

$('[data-type="adhaar-number"]').on("change, blur", function() {
  var value = $(this).val();
  var maxLength = $(this).attr("maxLength");
  if (value.length != maxLength) {
    $(this).addClass("highlight-error");
  } else {
    $(this).removeClass("highlight-error");
  }
});
</script>	
										
									
										<div class="item form-group">
										
											
												<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Current Meter Reading <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="current_meter_reading" value="<?php echo $row["current_meter_reading"];  ?>" required="required"  class="form-control " Placeholder="Current Meter Reading">
											</div>
											
												<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Lightbill One Unit Amount<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="amt_per_unit" value="<?php echo $row["amt_per_unit"];  ?>" required="required"  class="form-control " Placeholder="Amount Per Unit">
											</div>

										</div>
										
								
										
										<div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">From Date <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="date" id="first-name" name="from_date" required="required"  value="<?php echo $row["from_date"];  ?>" class="form-control " Placeholder="Address">
											</div>
										
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Rent Due Date <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="first-name" name="rent_due_date" required="required" value="<?php echo $row["rent_due_date"];  ?>" class="form-control" Placeholder="Rent Due Date">
											</div>

										</div>
										 <hr style="border-color:black;">
										   <h5><b>Family &amp; Work Details :</b> </h5>
										<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Total Family Members<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="Family_members" required="required" value="<?php echo $row["Family_members"];  ?>" class="form-control " Placeholder="Total Family Members">
											</div>
											
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Family Members Name<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<textarea id="first-name" name="family_members_name" class="form-control" Placeholder="Family Members Name"><?php echo $row["family_members_name"]; ?></textarea> 
											</div>
									
										</div>
									
										 <div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">No of Male in family<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="first-name" name="male_members"  value="<?php echo $row["male_members"];  ?>" class="form-control " Placeholder="No of Male in family">
											</div>
											
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">No of Female in family<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="first-name" name="female_members" value="<?php echo $row["female_members"];  ?>" class="form-control " Placeholder="No of Female in family">
											</div>
									
										</div>
                                 <div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">No of child in family<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="first-name" name="child_members"  value="<?php echo $row["child_members"];  ?>" class="form-control " Placeholder="No of Child in family">
											</div>
											
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Nature Of Work<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="natureofwork" value="<?php echo $row["natureofwork"];  ?>" class="form-control " Placeholder="Nature Of Work">
											</div>
									
										</div> 
											<div class="item form-group">
														
		
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Working Place With Ph.no<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="working_place" required="required" value="<?php echo $row["working_place"];  ?>" class="form-control" Placeholder="Working Place With Ph.no">
											</div>
										
                                             <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">
											</label>
											<div class="col-md-4 col-sm-4 ">
												
											</div>
											
										</div>
            
            							 <hr style="border-color:black;">
										   <h5><b>References of the 2 person :</b> </h5>
										<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Full Name,address &amp; age<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<textarea id="first-name" name="ref_person_one" class="form-control " Placeholder="1st Person Details"><?php echo $row["ref_person_one"];  ?></textarea>
											</div>
											
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Full Name,address &amp; age<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<textarea id="first-name" name="ref_person_two" class="form-control" Placeholder="2nd Person Details"><?php echo $row["ref_person_two"];  ?></textarea> 
											</div>
									
										</div>
									
                                          <hr style="border-color:black;">
										   <h5><b>Agent Details :</b> </h5>
										<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Agent Name,address &amp; Mobile no.<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<textarea id="first-name" name="agent_details" value="" class="form-control " Placeholder="1st Person Details"><?php echo $row["agent_details"];  ?></textarea>
											</div>
											
											
											
									
										</div> 
            
                                         <hr style="border-color:black;">
										   <h5><b> Upload Documents :</b> </h5>
            
                                         <div class="item form-group">
										 
                                           <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">
											</label>
											<div class="col-md-4 col-sm-4 ">
												
											</div>
											
										</div>
										
									
										
										<div class="item form-group">
										
									    	<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Rentar Photo<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="file"  name="photo" Placeholder="photo">
												  <?php echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row['photo']).'" height="100" width="100" class="img-thumnail" />  </td>  '?>
											</div>
											
                                        <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">ID Proof<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="file"  name="id_proof"  Placeholder="photo">
												  <?php echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row['id_proof']).'" height="100" width="100" class="img-thumnail" />  </td>  '?>
											</div>
                                        
											

									
										</div>
										<div class="item form-group">
											
									
                                        
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Lightbill<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="file"  name="lightbill" Placeholder="Lightbill">
												  <?php echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row['lightbill']).'" height="100" width="100" class="img-thumnail" />  </td>  '?>
											</div> 
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Pan Card<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="file" id="first-name" name="pancard"  Placeholder="Pan Card">
												  <?php echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row['pancard']).'" height="100" width="100" class="img-thumnail" />  </td>  '?>
											</div>
									
										</div>
											<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Adhar Card <span class="required">*</span>
											
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="file" id="first-name" name="adhar_card"  Placeholder="Adhar Card">
												  <?php echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row['adhar_card']).'" height="100" width="100" class="img-thumnail" />  </td>  '?>
											</div>
                                        
										
									
										</div>
									
										<div class="item form-group">
											<div class="pad-20 col-md-6 col-sm-6 offset-md-3" style="float:right;text-align: end">
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" name="update-form" class="btn btn-success add-btn">Submit</button>
											</div>
										</div>

									</form>
						<?php 
                       	   }
                            } else {
                                echo "0 results";
                            }                          
                            mysqli_close($conn);
                            ?>
        </div> 
                        
        <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
        </div> 
                        
    </div> 
  </div>
</div>   


<div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg"> 
     <div class="modal-content modal-lg">  
   
        <div class="modal-header"> 
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button> 
            <h4 class="modal-title">
             Add Tenant Details
           </h4> 
        </div> 
        <div class="modal-body">                     
    <?php   
    include 'dbConfig.php';
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
$building_name=$_REQUEST['building_name'];
$id=$_REQUEST['b_id'];
$wing=$_REQUEST['wing'];
$flat_no=$_REQUEST['flat_no'];
$sql = "select a.*,b.area from flat_details a,building b where a.building_name=b.building_name and a.flat_no='$flat_no' and a.building_name='$building_name' and a.b_id=$id and a.wing='$wing'";
//$sql = "select a.*,b.building FROM building b,flat_details a where a.flat_no='$flat_no' and a.building_name='$building_name' and a.b_id=$id and a.wing='$wing' and a.building_name=b.building_name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

?>                          
           <!-- mysql data will be load here -->                          
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post" enctype="multipart/form-data">
            <h5><b> Flat Details :</b> </h5>
										<div class="item form-group">
							
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Flat Number <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
											<input type="hidden" readonly  id="first-name" name="b_id" required="required" class="form-control" value="<?php echo $id;  ?>"  Placeholder="flat_no">
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
										
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name"> Area <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="area" required="required" value="<?php echo $row["area"];  ?>" class="form-control " Placeholder="Building Name">
											</div>
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Room Type <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="room" required="required" value="<?php echo $row["room_type"];  ?>" class="form-control " Placeholder="Building Name">
											</div>
										</div>
										
										
										<div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Area Sq.ft <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="area_sq_ft" required="required" value="<?php echo $row["sq_ft"];  ?>" class="form-control " Placeholder="Building Name">
											</div>
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name"> Wing <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="wing" required="required" value="<?php echo $row["wing"];  ?>" class="form-control " Placeholder="Building Name">
											</div>
											
										</div>
                                          <hr style="border-color:black;">
										   <h5><b> Tenant Details :</b> </h5>
											<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Renter Full Name<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="user_name" required="required"  class="form-control " Placeholder="Renter Full Name">
											</div>
											<script>
											function check()
                                            {
                                            
                                                var mobile = document.getElementById('mobile');
                                               
                                                
                                                var message = document.getElementById('message');
                                            
                                               var goodColor = "transparent";
                                                var badColor = "Red";
                                              
                                                if(mobile.value.length!=10){
                                                   
                                                    mobile.style.borderColor = badColor;
                                                    message.style.color = badColor;
                                                    message.innerHTML = "required 10 digits, match requested format!"
                                                }
                                                else{
                                                    mobile.style.borderColor = goodColor;
                                                    message.style.color = goodColor;
                                                    message.innerHTML = ""
                                                }}
											</script>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Mobile NO.<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="mobile" onkeyup="check(); return false;" name="phone" required="required" class="form-control" Placeholder="Mobile No."><span id="message"></span>
											</div>
									
										</div>
										
										<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Alternate Mobile No.
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="phone2" class="form-control " Placeholder="Alternate Mobile No.">
											</div>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Email
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="email"  value="" class="form-control " Placeholder="Email Id">
											</div>
											
									
										</div> 
                                       <div class="item form-group">
										
												<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Permanent Address<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<textarea id="first-name" name="address" required="required"  class="form-control " Placeholder="Permanent Address"></textarea>
											</div>
										<!--  
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Flat Given On<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="date" id="first-name" name="flat_given_on" required="required" class="form-control" Placeholder="Flat Given On">
											</div>
-->
										<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Previous Address<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<textarea id="first-name" name="previous_address" required="required"  class="form-control " Placeholder="Previous Address"></textarea>
											</div>
										
										</div>
         							   <div class="item form-group">
										
										 
                                        <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Adhar Card No<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="adhar_no" name="adhar_no" data-type="adhaar-number" maxLength="14" required="required" class="form-control" Placeholder="Adhar Card No">
											</div>

                                          <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Age<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" name="age" required="required" class="form-control" Placeholder="Age">
											</div>
										</div>
            
                                         <hr style="border-color:black;">
										   <h5><b> Rent  Details : </b> </h5>
									
										<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Rent (in Rs.) <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="weight1" name="rent" required="required" value="" oninput="weightConverter()" onchange="weightConverter()"  class="form-control " Placeholder="Rent">
											</div>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Maintenance<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="weight2" name="maintainence" required="required"  oninput="weightConverter()" onchange="weightConverter()" class="form-control " Placeholder="Maintainence">
											</div>
										
									
										</div>
										
										<div class="item form-group">
										
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Final Rent <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="outputTon" name="final_rent" readonly required="required" class="form-control" Placeholder="0.00">
											</div>
									                  <script>
                                                        function weightConverter() {
                                                          var first_number = document.getElementById("weight1").value;
                                                          var second_number =document.getElementById("weight2").value;
                                                          
                                                           var result = (parseInt(first_number) + parseInt(second_number));
                                                          document.getElementById("outputTon").value=result;
                                                        }           
                                                   </script>  
                                        <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Deposite (in Rs.)<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="first-name" name="Deposite" required="required" class="form-control" Placeholder="Deposite">
											</div>
											

										</div>
										<div class="item form-group">
										
											
                                        
                                        	<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Current Meter Reading <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="current_meter_reading" required="required"  class="form-control " Placeholder="Current Meter Reading">
											</div>
									
												<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Lightbill One Unit Amount<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="amt_per_unit" required="required"  class="form-control " Placeholder="Amount Per Unit">
											</div>
										
										</div>
									
										
								
										
										<div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">From Date <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="date" id="first-name" name="from_date" required="required"  class="form-control " Placeholder="Address">
											</div>
										
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name"> Rent Due Date<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="hidden" id="first-name" name="rent_due_date" required="required" class="form-control" Placeholder="Rent Due Date">
                                            <select name="rent_due_date" class="form-control" required>
                                            <option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                             <option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											<option value="24">24</option>
											<option value="25">25</option>
										    <option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>
                                            <option value="29">29</option>
											<option value="30">30</option>
											<option value="31">31</option>

                                            
                                            </select>
											</div>

										</div>
										  <hr style="border-color:black;">
										   <h5><b>Family &amp; Work Details :</b> </h5>
										<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Total Family Members<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="Family_members" required="required" value="" class="form-control " Placeholder="Total Family Members">
											</div>
											
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Family Members Name<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<textarea id="first-name" name="family_members_name" class="form-control" Placeholder="Family Members Name"></textarea> 
											</div>
									
										</div>
									
                                     <div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">No of Male in family<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="first-name" name="male_members" required="required" value="" class="form-control " Placeholder="No of Male in family">
											</div>
											
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">No of Female in family<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="first-name" name="female" required="required" value="" class="form-control " Placeholder="No of Female in family">
											</div>
									
										</div>
                                 <div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">No of child in family<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="first-name" name="child_members" required="required" value="" class="form-control " Placeholder="No of Child in family">
											</div>
											
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Nature Of Work<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="first-name" name="natureofwork" required="required" value="" class="form-control " Placeholder="Nature Of Work">
											</div>
									
										</div>
            
										
											<div class="item form-group">
													
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Working Place With Ph.no<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<textarea id="first-name" name="working_place" required="required" class="form-control" Placeholder="Working Place"></textarea>
											</div>
										
										    <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">
											</label>
											<div class="col-md-4 col-sm-4 ">
												
											</div>
											
										</div>
										
                                          <hr style="border-color:black;">
										   <h5><b>References of the 2 person :</b> </h5>
										<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Full Name,address &amp; age<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<textarea id="first-name" name="ref_person_one" required="required" value="" class="form-control " Placeholder="1st Person Details"></textarea>
											</div>
											
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Full Name,address &amp; age<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<textarea id="first-name" name="ref_person_two" class="form-control" Placeholder="2nd Person Details"></textarea> 
											</div>
									
										</div>
									
                                          <hr style="border-color:black;">
										   <h5><b>Agent Details :</b> </h5>
										<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Agent Name,address &amp; Mobile no.<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<textarea id="first-name" name="agent_details" required="required" value="" class="form-control " Placeholder="1st Person Details"></textarea>
											</div>
											
											
											
									
										</div> 
            
                                         <hr style="border-color:black;">
										   <h5><b> Upload Documents :</b> </h5>
            
            		                   <div class="item form-group">
													
											
									    	<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Rentar Photo
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="file"  name="photo"  Placeholder="photo">
											</div>
										
										    <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">ID Proof<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="file"  name="id_proof"  Placeholder="photo" required>
											</div>
											
										</div>
            
										
										<div class="item form-group">
										
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Lightbill
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="file"  name="lightbill"  Placeholder="Lightbill">
											</div>
                                               <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Pan Card
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="file" id="first-name" name="pancard"   Placeholder="Pan Card">
											</div>
									
										</div>
										<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Adhar Card 
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="file" id="first-name" name="adhar_card"   Placeholder="Adhar Card">
											</div>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">
											</label>
											<div class="col-md-4 col-sm-4 ">
												
											</div>
											
									
										</div>
										
									
										<div class="item form-group">
											<div class="pad-20 col-md-6 col-sm-6 offset-md-3" style="float:right;text-align: end">
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" name="add" class="btn btn-success add-btn">Submit</button>
											</div>
										</div>

									</form>
         <script>
$('[data-type="adhaar-number"]').keyup(function() {
  var value = $(this).val();
  value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join("-");
  $(this).val(value);
});

$('[data-type="adhaar-number"]').on("change, blur", function() {
  var value = $(this).val();
  var maxLength = $(this).attr("maxLength");
  if (value.length != maxLength) {
    $(this).addClass("highlight-error");
  } else {
    $(this).removeClass("highlight-error");
  }
});
</script>
						<?php 
                       	   }
                            } else {
                                echo "0 results";
                            }                          
                            mysqli_close($conn);
                            ?>
        </div> 
                        
        <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
        </div> 
                        
    </div> 
  </div>
</div>   




   <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg"> 
     <div class="modal-content modal-lg">  
   
        <div class="modal-header"> 
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button> 
            <h4 class="modal-title">
              Tentant Details
           </h4> 
        </div> 
            
        <div class="modal-body" id="modalbody">                     
    <?php   
    include 'dbConfig.php';
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
$building_name=$_REQUEST['building_name'];
$id=$_REQUEST['b_id'];
$wing=$_REQUEST['wing'];
$flat_no=$_REQUEST['flat_no'];
$sql = "select a.* from flat_rental a where  a.flat_no='$flat_no' and a.building_name='$building_name' and a.wing='$wing' and status='Occupied' ";
//$sql = "select a.*,b.building FROM building b,flat_details a where a.flat_no='$flat_no' and a.building_name='$building_name' and a.b_id=$id and a.wing='$wing' and a.building_name=b.building_name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $output='';
    $output .= '
      <div class="table-responsive table-with-border">
         <table class="table table-bordered table-with-border">';
    while($row = $result->fetch_assoc()) {

    
            $output .= '
                <tr>
                     <td width="30%"><label>Name</label></td>
                     <td width="70%">'.$row["user_name"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Phone No.</label></td>
                     <td width="70%">'.$row["phone"].' / '.$row["phone2"].'</td>
                </tr>
    <tr>
                     <td width="30%"><label>Email</label></td>
                     <td width="70%">'.$row["email"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Age</label></td>
                     <td width="70%">'.$row["age"].'</td>
                </tr>
                 <tr>
                     <td width="30%"><label>Adhar No</label></td>
                     <td width="70%">'.$row["adhar_no"].'</td>
                </tr>
                 <tr>
                     <td width="30%"><label>Rent</label></td>
                     <td width="70%">'.$row["rent"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Maintenance</label></td>
                     <td width="70%">'.$row["maintainence"].'</td>
                </tr>
                 <tr>
                     <td width="30%"><label>Final Rent</label></td>
                     <td width="70%">'.$row["final_rent"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Deposite</label></td>
                     <td width="70%">'.$row["Deposite"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Current Meter Reading</label></td>
                     <td width="70%">'.$row["current_meter_reading"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Rent From</label></td>
                     <td width="70%">'.$row["from_date"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Rent Due Date</label></td>
                     <td width="70%">'.$row["rent_due_date"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Permanent Address</label></td>
                     <td width="70%">'.$row["address"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Previous Address</label></td>
                     <td width="70%">'.$row["previous_address"].'</td>
                </tr>
                 <tr>
                     <td width="30%"><label>Nature Of Work</label></td>
                     <td width="70%">'.$row["natureofwork"].' </td>
                </tr>
                 <tr>
                     <td width="30%"><label>Working Place</label></td>
                     <td width="70%">'.$row["working_place"].' </td>
                </tr>
                <tr>
                     <td width="30%"><label>Total Family Members</label></td>
                     <td width="70%">'.$row["Family_members"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Total Male</label></td>
                     <td width="70%">'.$row["male_members"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Total Female</label></td>
                     <td width="70%">'.$row["male_members"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Total Child</label></td>
                     <td width="70%">'.$row["child_members"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Family Members Name</label></td>
                     <td width="70%">'.$row["family_members_name"].'</td>
                </tr>
                <tr>
                     <td width="30%" rowspan="2"><label>References of the two person</label></td>
                     <td width="70%">1. '.$row["ref_person_one"].'</td>
                </tr>
                <tr>
                   
                     <td width="70%">2. '.$row["ref_person_two"].'</td>
                </tr>
                  <tr>
                     <td width="30%"><label>Agent Details</label></td>
                     <td width="70%">'.$row["agent_details"].'</td>
                </tr>
 <tr>
                     <td width="30%"><label>ID Proof</label></td>
                     <td width="70%"><img src="data:image/jpeg;base64,'.base64_encode( $row['id_proof']).'" height="100" width="100" class="img-thumnail modalbodyimg" /></td>
                </tr>
                     <tr>
                     <td width="30%"><label>Photo</label></td>
                     <td width="70%"><img src="data:image/jpeg;base64,'.base64_encode( $row['photo']).'" height="100" width="100" class="img-thumnail modalbodyimg" /></td>
                </tr>
                <tr>
                     <td width="30%"><label>adhar_card</label></td>
                     <td width="70%"><img src="data:image/jpeg;base64,'.base64_encode( $row['adhar_card']).'" height="100" width="100" class="img-thumnail modalbodyimg" /></td>
                </tr>
                <tr>
                     <td width="30%"><label>Pancard</label></td>
                     <td width="70%">'."<img src='data:image/jpeg;base64,".base64_encode( $row["pancard"])."' height='100' width='100' class='img-thumnail modalbodyimg' />".'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Lightbill</label></td>
                     <td width="70%">'."<img src='data:image/jpeg;base64,".base64_encode( $row["lightbill"])."' height='100' width='100' class='img-thumnail modalbodyimg' />".'</td>
                </tr>
<tr>
                     <td width="30%"><label>Status</label></td>
                     <td width="70%">'.$row["status"].'</td>
                </tr>
                ';
        }
        $output .= "</table>
                    </div>";
        echo $output;
                 
                            } else {
                             
                            }                          
                            mysqli_close($conn);
                            ?>
        </div> 
                        
        <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
         <input type="button" id="doPrint" value="print" class="btn btn-sm btn-info"/>
        </div> 
                        
    </div> 
  </div>
</div>   


<!-- <script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        w=window.open();
        w.document.write(printContents);
        w.document.close(); // necessary for IE >= 10
        w.focus(); // necessary for IE >= 10*/
        w.print();
        w.close();
    }
</script> -->

<script>
document.getElementById("doPrint").addEventListener("click", function() {
     var printContents = document.getElementById('modalbody').innerHTML;
 		w=window.open();
        w.document.write(printContents);
        w.document.close(); // necessary for IE >= 10
        w.focus(); // necessary for IE >= 10*/
        w.print();
});
</script>