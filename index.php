<?php
require_once './config.php';
$username=$password=$id="";
$usernameErr=$password_err="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty(trim($_POST["username"])))
    {
        $usernameErr="Please enter Username";
    }
    else
    {
        $username= trim($_POST["username"]);
    }
    
    if(empty(trim($_POST['password'])))
    {
        $password_err = 'Please enter password.';
    } 
    else
    {
        $password = trim($_POST['password']);
    }
    if(empty($username_err) && empty($password_err)){
        if($stmt=$conn->prepare('SELECT username,password FROM users WHERE username = ?'));
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $stmt->store_result(); 
        if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password);
	$stmt->fetch();
	if ($_POST["password"]==$password) {
                session_start();
		session_start();
                $_SESSION['username'] = $id;
                $_SESSION['id'] =  $id;
                header("location: Main.php");
	} else {
		echo '<script type="text/JavaScript"> 
                    alert("Incorrect username or password!");
                    </script>';
	}
} else {
	echo '<script type="text/JavaScript"> 
                    alert("Incorrect username or password!");
                    </script>';
}
    }
    mysqli_close($conn);
}
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Automatic Question Paper Generator</title>
        <link href="main.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="card card-container">
                <center><b>Automatic Question Paper Generator</b></center><br/>
                <img id="profile-img" class="profile-img-card" src="avatar.png" />
                <p id="profile-name" class="profile-name-card"></p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($usernameErr)) ? 'has-error' : ''; ?>">
                        <label>Username</label>
                        <input type="text" placeholder="Username" name="username"class="form-control" value="<?php echo $username; ?>">
                        <span class="help-block"><?php echo $usernameErr; ?></span>
                    </div>                    
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label>Password</label>
                        <input type="password" placeholder="Password" name="password" class="form-control">
                        <span class="help-block"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <center><input type="submit" class="btn btn-primary" value="Login"></center>
                    </div>
                    <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
                </form>
            </div>
        </div>
    </body>
</html>