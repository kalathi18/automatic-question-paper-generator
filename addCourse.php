<?php
require_once './config.php';
session_start();
if(!isset($_SESSION["username"]) || empty($_SESSION["username"]) )
{
    header("location: index.php");
    exit;
}
$user_check = $_SESSION['username']; 
$ses_sql=mysqli_query($conn, "select * from users where username='$user_check'");
$uinfo=mysqli_fetch_assoc($ses_sql);
?>
<html> 
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <title>Dashboard</title>
</head>
<body>
    <div class='container'>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="Main.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>      
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Sacred Heart College</h1>
                <p class="lead">Automatic Question Paper Generation System</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <ul class="list-group">
                    <li class="list-group-item"><a href='addQuestion.php'>Add Question to DB</a></li>
                    <li class="list-group-item"><a href='generatePaper.php'>Generate Paper</a></li>
                    <li class="list-group-item">Add Course</li>
                    <li class="list-group-item"><a href='viewCourses.php'>View Courses</a></li>
                    <li class="list-group-item"><a href='findPaper.php'>Download Question by ID</a></li>
                    <li class="list-group-item"><a href='showQuestions.php'>Show Questions</a></li>
                </ul>
            </div>
            <?php
            $errorMsg="";
            $successMsg="";
            if(!empty($_POST['courseAddForm'])){
                $courseCode = $_POST['courseIDAddForm'];
                $courseName = $_POST['courseAddForm'];
                $addCourse = "INSERT INTO courses(courseCode,courseTitle) VALUES ('$courseCode','$courseName')";
                mysqli_query($conn, $addCourse);  
                $successMsg = "Successfully Added ".$courseName;
            }
            else{
                $errorMsg="Fill Course name field and ";
            }
            $fetchlist=mysqli_query($conn, "select * from courses");
            ?>
            <div class="col-4">
                <form method="POST">
                    <div class="form-group">
                        <?php echo $errorMsg; ?>
                        <label for="exampleInputEmail1">Add Course</label>
                        <input name="courseIDAddForm" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter course Code">
                        <br>
                        <input name="courseAddForm" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter course name">
                    </div>                    
                    <input type="submit" class="btn btn-primary"><br/><br/>
                    <div class="alert alert-success" role="alert">
                        <?php echo $successMsg; ?>
                    </div>
                </form>
            </div>
        </div>
                    </div>
    </div>
</body>
</html>