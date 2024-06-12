
<?php 
include 'dbConfig.php';
$id=$_REQUEST["id"];

$query111 = "select * from flat_rent where id=$id";
$result111 = mysqli_query($conn,$query111) or die ( mysqli_error($conn));
$row111=mysqli_fetch_assoc($result111);
$building_name = $row111['building_name'];
$flat_no  = $row111['flat_no'];
$wing = $row111['wing'];
$b_id = $row111['b_id'];
$status='Approved';

$inss5="UPDATE flat_rent SET rent_status='$status'  WHERE id='$id'";
mysqli_query($conn,$inss5);

        echo '<script language="javascript">';
        echo 'alert("Rent Received");';
     echo 'location.href="view-rent-status-notify-report.php"';
      
        echo '</script>';
        

   



?> 
 