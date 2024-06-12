  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
<li id="header_notification_bar" class="dropdown">
<a  data-toggle="dropdown"  class="dropdown-toggle" href="view-rent-upcoming-notify-report.php">
<i class="green fa fa-building-o"></i>
<?php
//SELECT count(12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date))) AS months FROM rent_update_details where 12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date)) = 1
?><span class="badge bg-warning green-bg">
                 <?php
                include('dbConfig.php');
                $result=mysqli_query($conn,"SELECT count(*) as total,DATE_SUB(concat(YEAR(CURRENT_DATE),'-',MONTH(CURRENT_DATE),'-',rent_due_date), INTERVAL 5 DAY) as date, curdate() AS today, concat(YEAR(CURRENT_DATE),'-',MONTH(CURRENT_DATE),'-',rent_due_date) as due_date FROM rent_update_details where ((DATE_SUB(concat(YEAR(CURRENT_DATE),'-',MONTH(CURRENT_DATE),'-',rent_due_date), INTERVAL 5 DAY)) <= curdate() and curdate() < (concat(YEAR(CURRENT_DATE),'-',MONTH(CURRENT_DATE),'-',rent_due_date))) and 12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date)) = 1");
                $data=mysqli_fetch_assoc($result);
                echo $data['total'];
                ?>
                </span>
              </a>
                  <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
              <p class="green-bg">You have <?php echo $data['total'];  ?> Upcoming Rent</p>
              </li>
              <?php 
              $sql="SELECT *,DATE_SUB(concat(YEAR(CURRENT_DATE),'-',MONTH(CURRENT_DATE),'-',rent_due_date), INTERVAL 5 DAY) as date, curdate() AS today, concat(YEAR(CURRENT_DATE),'-',MONTH(CURRENT_DATE),'-',rent_due_date) as due_date FROM rent_update_details where ((DATE_SUB(concat(YEAR(CURRENT_DATE),'-',MONTH(CURRENT_DATE),'-',rent_due_date), INTERVAL 5 DAY)) <= curdate() and curdate() < (concat(YEAR(CURRENT_DATE),'-',MONTH(CURRENT_DATE),'-',rent_due_date))) and 12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date)) = 1";
              $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                ?>
              <li>
              <?php  while($row = $result->fetch_assoc()) {
                  ?>
                <a href='view-rent-flat-pay-info.php?flat_no=<?php echo $row["flat_no"];?>&flat_name=<?php echo $row["flat_name"];?>&building_name=<?php echo $row["building_name"]; ?>&b_id=<?php echo $row["b_id"]; ?>&wing=<?php echo $row["wing"]; ?>'>
                  <span class="subject">
                  <span class="from"><?php echo $row["building_name"];  ?>, Flat/Room : <?php echo $row["flat_name"];  ?></span>
                  <span class="time"></span>
                  </span>
                  <span class="message"><?php echo $row["user_name"];  ?>, <?php echo $row["phone"];  ?> </span>
                  </a><?php }?>
              </li>
         <?php      }?>
       
              <li>
                <a href="view-rent-upcoming-notify-report.php">See all </a>
              </li>
            </ul>
          </li>
           <li id="header_notification_bar" class="dropdown">
            <a  data-toggle="dropdown"  class="dropdown-toggle" href="view-rent-notify-report.php">
              <i class="red fa fa-building-o"></i>
              <?php 
              //SELECT count(12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date))) AS months FROM rent_update_details where 12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date)) = 1
              ?><span class="badge bg-warning red-bg">
                 <?php
                include('dbConfig.php');
                $result=mysqli_query($conn,"SELECT *,count(*) as total,DATE_SUB(concat(YEAR(CURRENT_DATE),'-',MONTH(CURRENT_DATE),'-',rent_due_date), INTERVAL 5 DAY) as date, curdate() AS today, concat(YEAR(CURRENT_DATE),'-',MONTH(CURRENT_DATE),'-',rent_due_date) as due_date,(12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date))) AS total_month FROM rent_update_details where curdate() >= (concat(YEAR(rent_paid_date),'-',MONTH(CURRENT_DATE),'-',rent_due_date)) and 12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date)) <> 0");
                $data=mysqli_fetch_assoc($result);
                echo $data['total'];
                ?>
                </span>
              </a>
               <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-red"></div>
              <li>
                <p class="red-bg">You have <?php echo $data['total'];  ?> new Rent</p>
              </li>
              <?php 
              $sql="SELECT *,DATE_SUB(concat(YEAR(CURRENT_DATE),'-',MONTH(CURRENT_DATE),'-',rent_due_date), INTERVAL 5 DAY) as date, curdate() AS today, concat(YEAR(CURRENT_DATE),'-',MONTH(CURRENT_DATE),'-',rent_due_date) as due_date,(12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date))) AS total_month FROM rent_update_details where curdate() >= (concat(YEAR(rent_paid_date),'-',MONTH(CURRENT_DATE),'-',rent_due_date)) and 12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date)) <> 0 limit 5";
              $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  ?>
              <li>
       <?php        while($row = $result->fetch_assoc()) {
                  ?>
                <a href='view-rent-flat-pay-info.php?flat_no=<?php echo $row["flat_no"];?>&flat_name=<?php echo $row["flat_name"];?>&building_name=<?php echo $row["building_name"]; ?>&b_id=<?php echo $row["b_id"]; ?>&wing=<?php echo $row["wing"]; ?>'>
                  <span class="subject">
                  <span class="from"><?php echo $row["building_name"];  ?>, Flat/Room : <?php echo $row["flat_name"];  ?></span>
                  <span class="time"></span>
                  </span>
                  <span class="message"><?php echo $row["user_name"];  ?>, <?php echo $row["phone"];  ?> </span>
                  </a>
                      <?php }?>
              </li>
              <?php }?>
       
              <li>
                <a href="view-rent-notify-report.php">See all </a>
              </li>
            </ul>
          </li>


     <li id="header_notification_bar" class="dropdown">
            <a  data-toggle="dropdown"  class="dropdown-toggle" href="view-rent-notify-report.php">
              <i class="orange fa fa-inr"></i>
              <?php 
              //SELECT count(12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date))) AS months FROM rent_update_details where 12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date)) = 1
              ?><span class="badge bg-warning orange-bg">
                 <?php
                include('dbConfig.php');
                $result=mysqli_query($conn,"SELECT count(*) as total FROM `flat_rent` WHERE rent_status='Pending'");
                $data=mysqli_fetch_assoc($result);
                echo $data['total'];
                ?>
                </span>
              </a>
               <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-orange"></div>
              <li>
                <p class="orange-bg">You have <?php echo $data['total'];  ?> new Rent</p>
              </li>
              <?php 
              $sql="SELECT * FROM `flat_rent` WHERE rent_status='Pending' limit 5";
              $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  ?>
              <li>
       <?php        while($row = $result->fetch_assoc()) {
                  ?>
                <a href='view-rent-flat-pay-info.php?flat_no=<?php echo $row["flat_no"];?>&flat_name=<?php echo $row["flat_name"];?>&building_name=<?php echo $row["building_name"]; ?>&b_id=<?php echo $row["b_id"]; ?>&wing=<?php echo $row["wing"]; ?>'>
                  <span class="subject">
                  <span class="from"><?php echo $row["building_name"];  ?>, Flat/Room : <?php echo $row["flat_name"];  ?></span>
                  <span class="time"></span>
                  </span>
                  <span class="message"><?php echo $row["user_name"];  ?>, <?php echo $row["phone"];  ?> </span>
                  </a>
                      <?php }?>
              </li>
              <?php }?>
       
              <li>
                <a href="view-rent-status-notify-report.php">See all </a>
              </li>
            </ul>
          </li>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>



 
   
          
