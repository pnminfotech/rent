<?php
include 'dbConfig.php';
?>
<?php
if(!empty($_POST['id']))
{
   // $id = intval($_REQUEST['id']);
    $output = '';

    $query = "select * from flat_rental where id = '".$_POST["id"]."'";
    $result = mysqli_query($conn, $query);
    $output .= '

      <div class="table-responsive">
           <table class="table table-bordered table-with-border">';
    while($row = mysqli_fetch_array($result))
    {
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
                     <td width="70%"><img src="data:image/jpeg;base64,'.base64_encode( $row['id_proof']).'" height="100" width="100" class="img-thumnail " /></td>
                </tr>
                     <tr>
                     <td width="30%"><label>Photo</label></td>
                     <td width="70%"><img src="data:image/jpeg;base64,'.base64_encode( $row['photo']).'" height="100" width="100" class="img-thumnail" /></td>
                </tr>
                <tr>
                     <td width="30%"><label>adhar_card</label></td>
                     <td width="70%"><img src="data:image/jpeg;base64,'.base64_encode( $row['adhar_card']).'" height="100" width="100" class="img-thumnail" /></td>
                </tr>
                <tr>
                     <td width="30%"><label>Pancard</label></td>
                     <td width="70%">'."<img src='data:image/jpeg;base64,".base64_encode( $row["pancard"])."' height='100' width='100' class='img-thumnail' />".'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Lightbill</label></td>
                     <td width="70%">'."<img src='data:image/jpeg;base64,".base64_encode( $row["lightbill"])."' height='100' width='100' class='img-thumnail' />".'</td>
                </tr>
<tr>
                     <td width="30%"><label>Status</label></td>
                     <td width="70%">'.$row["status"].'</td>
                </tr>
                ';
    }
    $output .= "</table></div>";

  
    echo $output;
}
?>