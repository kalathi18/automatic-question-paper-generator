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
        <title>Courses</title>
        <style>
            table
            {   
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 1.1em;
                font-family: sans-serif;
                min-width: 400px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                text-align: center;   
            }
            th { 
                background: #009999;
                color: azure; 
                font-weight: bold; 
            }
            td, th 
            {
                border: 1px solid #777;
                padding: 0.5rem;
                text-align: center;
            }
            tbody tr:nth-child(odd) 
            {
                background: #eee;
            }
            caption 
            {
                font-size: 0.8rem;
            }
        </style>
    </head>
    <body>
        <div class="container">
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
                        <li class="list-group-item"><a href='generatePaper.php'>Generate Question Paper</a></li>
                        <li class="list-group-item"><a href='addCourse.php'>Add Course</a></li>
                        <li class="list-group-item">View Courses</li>
                        <li class="list-group-item"><a href='findPaper.php'>Download Question by ID</a></li>
                        <li class="list-group-item"><a href='showQuestions.php'>Show Questions</a></li>
                    </ul>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <div class="row">
                <div class="center">
                <h3>List of Courses</h3>
                <?php
                $fetchlist=mysqli_query($conn, "select * from courses");
                $i=0;
                echo "<table border='1'> 
                    <tr>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    </tr>";
                while($row=mysqli_fetch_array($fetchlist))
                {
                    echo "<tr>";
                    echo "<td>".$row['courseCode']."</td>";
                    echo "<td>".$row['courseTitle']."</td>";
                }
                ?>
                </div>
                </div>
            </div>
            </div>
    </body>
</html>