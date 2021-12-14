<?php
 include_once('../session.php');
 if (array_key_exists('email', $_SESSION)) {
	header('location: ../dashboard/dashboard.php');
}
 $database = new Database();
   $db = $database->getConnection();
   // instantiate object table 
   $Admin = new Admin($db);
 $formerr=array();
 function test_input($data) {
	 $data = trim($data);
	 $data = stripslashes($data);
	 $data = htmlspecialchars($data);
	 return $data;
 }
 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])){
    $email=test_input($_POST['email']);
    $password=test_input($_POST['password']);
    // $password= password_hash($password, PASSWORD_DEFAULT);
	$Admin->password=$password;
	$Admin->email=$email;
    if( $Admin->checkuser('email',$email))
    {
		if($Admin->login('email',$email)==false)
		 {
			$formerr['email']="email or password is wrong";
		 }
    }
    else{
       $formerr['email']="email or password is wrong";
    }
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/registration-form-1.jpg" alt="">
				</div>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<h3>login</h3>
				
					<div class="form-wrapper">
						<input type="email" name="email" placeholder="email" class="form-control"> 
						<i class="zmdi zmdi-email"></i>
					</div>
					
					<div class="form-wrapper">
						<input type="password" name="password" placeholder="Password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					  <p class="alert-danger"><?php if(isset($formerr['email'])){ echo $formerr['email']; } ?></p>
					  <p><a href="<?php echo"register.php" ?>">create acount</a></p>
					  <input type="submit" name="login" class="btn btn-primary" value="login" > <i class="zmdi zmdi-arrow-right" ></i>
				</form>
			</div>
		</div>
		
	</body>
</html>
<?php

?>