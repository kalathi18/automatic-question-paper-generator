<?php
require_once './config.php';
$fname=$lname=$username=$password=$email=$phno=$dob=$role="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $fname= trim($_POST["first"]);
    $lname= trim($_POST["last"]);
    $username= trim($_POST["user"]);
    $password=trim($_POST["pass"]);
    $email= trim($_POST["email"]);
    $phno=trim($_POST["phone"]);
    $dob=trim($_POST["dob"]);
    $role=trim($_POST["role"]);    
    $sql="INSERT INTO users VALUES('$fname','$lname','$username','$password','$email','$phno','$dob','$role')";
    
    if(mysqli_query($conn, $sql))
    {
        echo '<script type="text/JavaScript"> 
                    alert("Registered Successfully");
                    </script>';    
    }
    else
    {
        echo '<script type="text/JavaScript"> 
                    alert("There is a problem in Registration");
                    </script>';
    }
    mysqli_close($conn);
}

?>
<html lang="en" dir="ltr">
  <head>
      <title>Registration</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="first" placeholder="Enter your firstname" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name="last" placeholder="Enter your lastname" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="user" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="pass" placeholder="Enter your Password" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="int" name="phone" placeholder="Enter your number" required>
          </div>          
          <div class="input-box">
            <span class="details">Date Of Birth</span>
            <input type="date" name="dob" placeholder="Enter your dateofbirth" required>
          </div>
            <div class="input-box">
            <span class="details">Role</span>
            <select name="role" style="background-color: #F5F5F5; color: #333; font-size: 24px;">
                <option>---Select Your Role---</option>
                <option value="Admin">Admin</option>
                <option value="Teacher">Teacher</option>
            </select>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
        <div class="button">
            <a href="index.php">
            <input type="button" value="Login Page">
            </a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>