<?php
include('login1.php'); // Includes Login Script
include 'dbConfig.php';
/*if(isset($_SESSION['login_user'])){
    if($role=='admin'){
    header("location: rent-admin/home.php");
    }
    if($role=='manager'){
        header("location: home.php");
    }
}*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Dashboard">
<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<title>Pnm Infotech</title>

<!-- Bootstrap core CSS -->
<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--external css-->
<link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="css/style.css" rel="stylesheet">
<link href="css/style-responsive.css" rel="stylesheet">
<link rel="stylesheet" href="login/style.css">
<style>

.btn-theme-login:hover {
  background-color: #2e3e4e !important;
    border-color: transparent !important;
      margin:0 auto;
      color:white !important;
      width:40%;
  
}
body {

    background-color: #000000 !important;
}
</style>
<script type = "text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
</head>

<body>
<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<div id='stars'></div>
<div id='stars2'></div>
<div id='stars3'></div>
<div id='title'>



<div id="login-page">
            <div class="container">
       <form class="form-login" action="" method="post" autocomplete="off">
      <div class="card-header border-0">
                  <div class="card-title text-center">
                    <div class="p-1">
                      <img src="logopnm.png" alt="branding logo" style="width: 170px;">
                    </div>
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Login with RENT Software</span>
                  </h6>
        </div>
        <div class="login-wrap">
            <input type="hidden" name="username1" class="form-control" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" placeholder="User ID" autofocus required/>
         <select class="form-control" name="username" required>
                    <?php
                    include 'dbConfig.php';
                    $sql = "select * from login";
                    
                    $result = mysqli_query($conn,$sql);
                    echo '<option value="">Select Username</option>';
                    while($row=mysqli_fetch_array($result))
                    {
                   
                    echo '<option value="'.$row['username'].'">'.$row['username'].'</option>';
                    }
                    ?>
					</select>
          <br>
          <br>
          <input type="password" name="password" class="form-control" placeholder="Password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" id="myInput" required/>
         <br> 
    	<?php /*   <select class="form-control" name="role"  >
   	 	  <option value="" selected disabled >Select From Here</option>
           <option value="manager">Manager</option>
            <option value="admin">Admin</option>        
					</select>
					     <br> */?>
        <label class="checkbox" style="text-indent:20px;">
          <!--  <input type="checkbox" value="remember-me">Remember me
            <input type="checkbox" onclick="myFunction()">Show Password -->
            <span class="pull-right">
            <input type="checkbox" onclick="myFunction()">Show Password
           <!--  <a data-toggle="modal" href="index.jsp#myModal"> Forgot Password?</a>--> 
            </span>
            </label>
            <div class="form-group">  
     <input type="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />  
     <label for="remember-me">Remember me</label>  
    </div> 
          <button class="btn btn-theme btn-block btn-theme-login add-btn"  type="submit" name="submit" autofill="off"><i class="fa fa-unlock"></i> SIGN IN</button>
          <span style="color:red;"><?php echo $error; ?></span>
          
          <hr>
       
        </div>
          </form>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <form  action="forgot_mail.php" method="post">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
               
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme add-btn " type="submit">Submit</button>
              </div>
             </form>
            </div>
          </div>
        </div>
        <!-- modal -->
      </div>
  </div>
</div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>

        <script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script  src="login/script.js"></script>
</body>
    
</html>


