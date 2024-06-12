
<?php
include 'dbConfig.php';
?>
<?php
if(!empty($_POST['id']))
{
   // $id = intval($_REQUEST['id']);
    $output = '';
    $query = "select * from building_lightbill WHERE id = '".$_POST["id"]."'";
    $result = mysqli_query($conn, $query);
    $output .= '
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post" enctype="multipart/form-data">
';
    while($row = mysqli_fetch_array($result))
    {
        $output .= '
                        <div class="item form-group">
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Building Name <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="hidden" id="" name="b_id" readonly  value="'.$row["b_id"].'"  class="form-control " Placeholder="Total Lightbill">									
												<input type="text" readonly  id="first-name" name="building_name" required="required" class="form-control" value="'.$row["building_name"].'"  Placeholder="flat_no">
											</div>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Area Name <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="hidden" id="" name="b_light_id" readonly  value="'.$row["id"].'"  class="form-control " Placeholder="Total Lightbill">									

												<input type="text" readonly id="first-name" name="area" required="required" value="'.$row["area"].'" class="form-control " Placeholder="Building Name">
											</div>	
										</div>
											<div class="item form-group">
											
										</div>
										
										<div class="item form-group">
												<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name"> Consumer Name <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="consumer_name" required="required" value="'.$row["consumer_name"].'" class="form-control " Placeholder="Building Name">
											</div>
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Meter No <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" readonly id="first-name" name="meter_no" required="required" value="'.$row["meter_no"].'" class="form-control " Placeholder="Building Name">
											</div>
										</div>
										
										
										<div class="item form-group">
											
										
											
										</div>
										
											<div class="item form-group">
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Date<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="date" id="first-name"  name="date" required="required"  value="" class="form-control " Placeholder="date">
											</div>
											
											
											<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Total Reading<span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="number" id="first-name" name="total_reading" required="required"  value="" class="form-control" Placeholder="Total Reading">
											</div>
									
										</div>
										
										<div class="item form-group">
											
										
											
										</div>

										<div class="item form-group">
												<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Total Amount<span class="required">*</span></label>
											<div class="col-md-4 col-sm-4 ">
												<input type="text" id="" name="amount"  required="required" value="" class="form-control " Placeholder="Total Amount">
											</div>
											
												<label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Lightbill Photo</label>
											<div class="col-md-4 col-sm-4 ">
												<input type="file" id="weight2" name="photo"  value=""   Placeholder="Current Meter Reading">
											</div>
											
										</div>
											
										
										<div class="item form-group">
											<div class="pad-20 col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" name="add" class="add-btn btn btn-success">Submit</button>
											</div>
										</div>

									</form>
       
                ';
    }
    $output .= "</table></div>";
    echo $output;
}
?>