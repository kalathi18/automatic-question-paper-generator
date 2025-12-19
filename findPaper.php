<?php
require_once './config.php';
session_start();
if(!isset($_SESSION["username"]) || empty($_SESSION["username"]) )
{
    header("location: index.php");
    exit;
}
$user_check=$_SESSION["username"];
$ses_sql= mysqli_query($conn, "select * from users where username='$user_check'");
$uinfo=mysqli_fetch_assoc($ses_sql);
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <title>Download Question Paper</title>
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
                        <li class="list-group-item"><a href='generatePaper.php'>Generate Question Paper</a></li>
                        <li class="list-group-item"><a href='addCourse.php'>Add Course</a></li>
                        <li class="list-group-item"><a href='viewCourses.php'>View Courses</a></li>
                        <li class="list-group-item">Download Question by ID</li>
                        <li class="list-group-item"><a href='showQuestions.php'>Show Questions</a></li>
                    </ul>
                </div>
                <?php
                $ques_array=array(); 
                $errorMsg = ""; 
                $successMsg = "";
                if(!empty($_POST['searchBox']))
                {
                    $searchString=$_POST['searchBox'];
                    $id=(int)$searchString;
                    $fetchpaper=mysqli_query($conn, "select questionBody from generatedquestion where id='$id'");
                    $printQues=mysqli_fetch_row($fetchpaper);
                    if(!empty($printQues))
                    {
                        $successMsg = "Found!";
                    }
                    else
                    {
                        $successMsg = "Could not Find!";
                    }
                    $sqlsub="select courseTitle from generatedquestion where id='$id'";
                    $resultsub = mysqli_query($conn, $sqlsub);
                    if(mysqli_num_rows($resultsub) > 0)
                    {
                        $row = mysqli_fetch_assoc($resultsub);
                        $value = $row["courseTitle"];
                    }
                    else
                    {
                        $value="None";
                    }
                }
                ?>
                <div class="col-8">
                    <form method="POST">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">ID</label>
                            <input name="searchBox" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Type unique ID">
                            </div>
                        <input value="Find" type="submit" class="btn btn-primary"><br/><br/>
                        <div class="alert alert-success" role="alert">
                            <?php echo $errorMsg; ?> 
                            <?php echo $successMsg; ?> 
                        </div>
                    </form>                   
                </div>
            </div>
            <center><input type="button" class="btn btn-primary" onclick="printDiv('questionBox')" value="PRINT" /></center>
            <br><br>
            <?php
                    if(!empty($printQues))
                    {
                        $successMsg = "Found!";
                        echo '
                        <div id="questionBox" style="border:1px solid black;">
                        <center>
                        <h2>College</h2>
                        <h5>Department of Computer Applications(UG)</h5>
                        '.'</h5>'.$value.'</h5>'.'
                        </center>
                        <br/><hr/><br/>
                        <font size="5">
                        <div style="margin-left:80px;">
                        '.$printQues[0].'
                            </div>
                            <br/><br/><br/><br/>
                            <center>**** THE END ****</center>
                            </div></font>
                        ';
                    }
                    ?>
                    <script>
                        function printDiv(divName)
                        {
                            var printContents = document.getElementById(divName).innerHTML;
                            var originalContents = document.body.innerHTML;
                            document.body.innerHTML = printContents;       
                            window.print();
                            document.body.innerHTML = originalContents;
                        }
                    </script>
        </div>
    </body>
</html>