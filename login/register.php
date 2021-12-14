<?php
   include_once('../session.php');
   if (array_key_exists('email', $_SESSION)) {
    header('location: ../index.php');
  }
    $database = new Database();
  	$db = $database->getConnection();
	  // instantiate object table 
  	$User = new User($db);
    $formerr=array();
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
   
    $name = test_input($_POST["name"]);
    $username = test_input($_POST["username"]);
    $email=test_input($_POST["email"]);
	  $phone= test_input($_POST["phone"]);
    $password = test_input($_POST["password"]);
    $confirm_password = test_input($_POST["confirm_password"]);
    // $gender= test_input($_POST["gender"]);
    /*************validate name ****************** */
    if(empty($name))
    {
       $formerr["name"]="the name can't be empty";
    }
    elseif(strlen($name)>25)
    {
      $formerr["name"]="the name is soo long";
  
    }
    elseif(strlen($name)<3)
    {
      $formerr["name"]="the name is soo short";
    }
  /*********************end validate name************************** */
     /*************validate username ****************** */
     $User->checkuser('username',$username);
     if(empty($username))
     {
        $formerr["username"]="the username can't be empty";
     }
     elseif(strlen($username)>25)
     {
       $formerr["username"]="the username is soo long";
   
     }
     elseif(strlen($username)<4)
     {
       $formerr["username"]="the username is soo short";
     }
   
     if($User->checkuser('username',$username)==true)
     {
         $formerr["username"]="the username is already token";
     }
  
     /*********************end validate username************************** */


      /*************validate email ****************** */
      if(empty($email))
      {
         $formerr["email"]="the email can't be empty";
      }
      elseif(strlen($email)>30)
      {
        $formerr["email"]="the email is soo long";
    
      }
      elseif(strlen($email)<4)
      {
        $formerr["email"]="the email is soo short";
      }
      if($User->checkuser('email',$email)==true)
      {
          $formerr["email"]="the email is already token";
      }
      /*********************end validate email************************** */


    /*************validate phone ****************** */
    if(empty($phone))
    {
       $formerr["phone"]="the phone can't be empty";
    }
    elseif(strlen($phone)>25)
    {
      $formerr["phone"]="the name is soo long";
  
    }
    elseif(strlen($phone)<3)
    {
      $formerr["phone"]="the name is soo short";
    }
    if($User->checkuser('phone',$phone)==true)
    {
        $formerr["phone"]="the phone is already token";
    }

    /*******************validate password********************* */
          if(empty($password))
          {
              $formerr["password"]="the password can't be empty";
          }
          elseif(strlen($password)>25)
            {
            $formerr["password"]="the password is soo long";
            }
            elseif(strlen($password<6))
            {
            $formerr["password"]="the password is soo short";
            }
            else{
               
                    if($password==$confirm_password)
                    {
                    $password= password_hash($password, PASSWORD_DEFAULT);
                    }
                    else{
                        $formerr["confirmpassword"]="thw confirm password don't identical password";
                    }
                }
    /******************end validate password************************ */
      if(empty($formerr))
      {
          // $stmt=$conn->prepare("insert into users (name,username,password) values(?,?,?)");
          // $stmt->execute([$name,$username,$password]);
          // $count=$stmt->rowCount();
          // if($count>0)
          // {       
          //    $_SESSION["name"]=$name;
          //    $_SESSION["username"]=$username;
          //    header('location: home.php');
          // }
          $User->name=$name;
          $User->email=$email;
          $User->username=$username;
          $User->phone=$phone;
          $User->password=$password;
          $User->create();
          
          // header('location: ../index.php');
      }
  }  
  ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v1 by Colorlib</title>
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
					<h3>Registration</h3>
					
					<div class="form-wrapper">
						<input type="text" placeholder="name" name="name" class="form-control" value="<?php if(isset($name)){echo $name;} ?>"required>
						<p class="alert-danger"><?php if(isset($formerr['name'])){echo  $formerr["name"]; } ?></p>
						<i class="zmdi zmdi-account"></i>
					</div>
          <div class="form-wrapper">
						<input type="text" placeholder="username" name="username" class="form-control" value="<?php if(isset($username)){echo $username;} ?>" required>
						<p class="alert-danger"><?php if(isset($formerr['username'])){echo  $formerr["username"]; } ?></p>
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Email Address" name="email" class="form-control"  value="<?php if(isset($email)){echo $email;} ?>" required>
						<p class="alert-danger"><?php if(isset($formerr['email'])){echo  $formerr["email"]; } ?></p>
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="phone" name="phone" class="form-control"  value="<?php if(isset($phone)){echo $phone;} ?>" required>
            <p class="alert-danger"><?php if(isset($formerr['phone'])){echo  $formerr["phone"]; } ?></p>
						<i class="zmdi zmdi-phone"></i>
					</div>
					<!-- <div class="form-wrapper">
						<select name="gender" id="" class="form-control">
							<option value="" disabled selected>Gender</option>
							<option value="male">Male</option>
							<option value="femal">Female</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div> -->
					<div class="form-wrapper">
						<input type="password" placeholder="Password" name="password" class="form-control" required>
					  <p class="alert-danger"><?php if(isset($formerr['password'])){echo  $formerr["password"];}   ?></p>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" name="confirm_password" placeholder="Confirm_Password" class="form-control" required>
            <p class="alert-danger"><?php if(isset($formerr['confirmpassword'])){echo  $formerr["confirmpassword"];}  ?></p>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<input type="submit" name="register" class="btn btn-primary" value="register" > <i class="zmdi zmdi-arrow-right" ></i>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>