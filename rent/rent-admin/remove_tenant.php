
<?php 
include 'dbConfig.php';
$id=$_REQUEST["id"];

$query111 = "select * from flat_rental where id=$id";
$result111 = mysqli_query($conn,$query111) or die ( mysqli_error($conn));
$row111=mysqli_fetch_assoc($result111);
$building_name = $row111['building_name'];
$flat_no  = $row111['flat_no'];
$wing = $row111['wing'];
$b_id = $row111['b_id'];
$status='Empty';

$inss5="UPDATE flat_details SET status='$status'  WHERE building_name='$building_name' and flat_no='$flat_no' and wing='$wing'";
mysqli_query($conn,$inss5);

    $inss15="UPDATE rent_update_details SET status='$status'  WHERE building_name='$building_name' and flat_no='$flat_no' and wing='$wing'";
    mysqli_query($conn,$inss15);

    $inss151="UPDATE flat_rental SET status='$status'  WHERE building_name='$building_name' and flat_no='$flat_no' and wing='$wing'";
    mysqli_query($conn,$inss151);

 
        echo '<script language="javascript">';
        echo 'alert("Remove Tenant");';
     echo 'location.href="view-tenant-flat-main-info.php?flat_no='.$flat_no.'&building_name='.$building_name.'&b_id='.$b_id.'&wing='.$wing.'"';
      
        echo '</script>';
        

   



?> 
 