
<?php
include 'dbConfig.php';
?>
<?php
if(!empty($_POST['id']))
{
   // $id = intval($_REQUEST['id']);
    $output = '';

    $query = "select * from building_lightbill where id = '".$_POST["id"]."'";
    $result = mysqli_query($conn, $query);
    $output .= '

      <div class="table-responsive">
           <table class="table table-bordered table-with-border">';
    while($row = mysqli_fetch_array($result))
    {
        $output .= '
                 <tr>
                     <td width="30%"><label>Building Name</label></td>
                     <td width="70%">'.$row["building_name"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Area </label></td>
                     <td width="70%">'.$row["area"].' </td>
                </tr>
                <tr>
                     <td width="30%"><label>Consumer Name</label></td>
                     <td width="70%">'.$row["consumer_name"].'</td>
                </tr>
                         
                 <tr>
                     <td width="30%"><label>Meter No </label></td>
                     <td width="70%">'.$row["meter_no"].'</td>
                </tr>
            
          
                ';
    }
    $output .= "</table></div>";
    
    
    $query1 = "select * from building_lightbill_payment where b_light_id = '".$_POST["id"]."'";
    $result1 = mysqli_query($conn, $query1);
    $output .= '
      <div class="table-responsive">
           <table class="table table-bordered table-with-border">';
    $output .= '
                 <tr>
               
                      <td><label>Date</label></td>
                      <td><label>Reading</label></td>
                 <td><label>Amount</label></td>
                 <td><label>Photo</label></td>
                </tr>';
    while($row1 = mysqli_fetch_array($result1))
   
    {
        $output .= '
                 <tr>
                   
                      <td><label>'.$row1["date"].'</label></td>
                      <td><label>'.$row1["total_reading"].'</label></td>
                      <td><label>'.$row1["amount"].'</label></td>
                        <td><label>'."<img src='data:image/jpeg;base64,".base64_encode( $row1["photo"])."' width='100' class='img-thumnail' />".'</label></td>
                </tr>
                         
                ';
    }
    $output .= "</table></div>";
  
    echo $output;
}
?>