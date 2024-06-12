<?php
header('Content-Type: application/json');
include 'dbConfig.php';

$sqlQuery = "select sum(paid_amt) as y,date_format(rent_paid_date,'%M') as x from flat_rent where date_format(rent_paid_date,'%M') is not null group by month(rent_paid_date)";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>