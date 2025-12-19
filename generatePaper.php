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
        <title>Generate Question Paper</title>
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
                        <li class="list-group-item">Generate Question Paper</li>
                        <li class="list-group-item"><a href='addCourse.php'>Add Course</a></li>
                        <li class="list-group-item"><a href='viewCourses.php'>View Courses</a></li>
                        <li class="list-group-item"><a href='findPaper.php'>Download Question by ID</a></li>
                        <li class="list-group-item"><a href='showQuestions.php'>Show Questions</a></li>
                    </ul>
                </div>
            <?php
            $ques_array=array();
            $errorMsg = "";
            $successMsg = "";
            $part_a_string="";
            $part_b_string="";
            $part_c_string="";
            if(!empty($_POST['courseSelect']))
            {
                $courseName=$_POST['courseSelect'];
                $part_a_count=$_POST['A'];
                $part_b_count=$_POST['B'];
                $part_c_count=$_POST['C'];
                #$countQues = $_POST['countQuestion'];
                $successMsg = "Successfully Generated Question Paper : ".$courseName."<br>";
                $fetchques1=mysqli_query($conn, "select question,courseTitle from questions where courseTitle='$courseName' AND section='A' AND question NOT IN (SELECT question FROM selected1 WHERE courseTitle='$courseName') ORDER BY RAND() LIMIT $part_a_count");
                $part_a_insert="INSERT INTO selected1(question,courseTitle) VALUES ";
                while($ques=mysqli_fetch_array($fetchques1))
                {
                    $part_a_insert .= "('" . $ques['question'] ."', '" . $ques['courseTitle']. "'), ";
                    $part_a_ques[] = $ques['question'];
                }
                $part_a_insert= rtrim($part_a_insert,", ");
                $result_a_insert = mysqli_query($conn, $part_a_insert);
                if(!$result_a_insert)
                {
                    die("Query failed: " . mysqli_error($conn));
                }
                $fetchques2=mysqli_query($conn, "select question,courseTitle from questions where courseTitle='$courseName' AND section='B' AND question NOT IN (SELECT question FROM selected2 WHERE courseTitle='$courseName') ORDER BY RAND() LIMIT $part_b_count");
                $part_b_insert="INSERT INTO selected2(question,courseTitle) VALUES ";
                while($ques=mysqli_fetch_array($fetchques2))
                {
                    $part_b_insert .= "('" . $ques['question'] ."', '" . $ques['courseTitle']. "'), ";
                    $part_b_ques[] = $ques['question'];
                }
                $part_b_insert= rtrim($part_b_insert,", ");
                $result_b_insert = mysqli_query($conn, $part_b_insert);
                if(!$result_b_insert)
                {
                    die("Query failed: " . mysqli_error($conn));
                }
                $fetchques3=mysqli_query($conn, "select question,courseTitle from questions where courseTitle='$courseName' AND section='C' AND question NOT IN (SELECT question FROM selected3 WHERE courseTitle='$courseName') ORDER BY RAND() LIMIT $part_c_count");
                $part_c_insert="INSERT INTO selected3 (question,courseTitle) VALUES ";
                while($ques=mysqli_fetch_array($fetchques3))
                {
                    $part_c_insert .= "('" . $ques['question'] ."', '" . $ques['courseTitle']. "'), ";
                    $part_c_ques[] = $ques['question'];
                }
                $part_c_insert= rtrim($part_c_insert,", ");
                $result_c_insert = mysqli_query($conn, $part_c_insert);
                if(!$result_c_insert)
                {
                    die("Query failed: " . mysqli_error($conn));
                }
                $i=1;
                foreach($part_a_ques as $questions)
                {
                    $part_a_string.=$i.".".$questions."<br>";
                    $i++;
                }
                $i=1;
                foreach($part_b_ques as $questions)
                {
                    $part_b_string.=$i.".".$questions."<br>";
                    $i++;
                }
                $i=1;
                foreach($part_c_ques as $questions)
                {
                    $part_c_string.=$i.".".$questions."<br>";
                    $i++;
                }
                $quesBodyString="<center><b>PART-A</b></center><br>".$part_a_string."<center><b>PART-B</b></center><br>".$part_b_string."<center><b>PART-C</b></center><br>".$part_c_string;
                $addPaper = "INSERT INTO generatedquestion(questionBody,courseTitle) VALUES ('$quesBodyString','$courseName')";
                if(mysqli_query($conn, $addPaper))
                {
                    $last_id=$conn->insert_id;
                    $successMsg1="<br>Unique ID:".$last_id;
                    $successMsg.=$successMsg1;
                }
                else
                {
                    printf("Question Not Available!");
                }
                
            }
            else
            {
                $errorMsg="Select Options";
            }
             $fetchlist=mysqli_query($conn, "select * from courses");
            ?>
            <div class="col-4">
                <form method="POST">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Course</label>
                            <select name="courseSelect" class="form-control" id="exampleFormControlSelect1">
                                <?php
                                while($row=mysqli_fetch_array($fetchlist))
                                {
                                    echo '<option>'.$row['courseTitle'].'</option>';
                                }
                                ?>
                            </select>
                            <br>
                            <label>Enter the number of questions</label>
                            <br><br>
                            <input name="A" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="PART-A"><br>
                            <input name="B" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="PART-B"><br>
                            <input name="C" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="PART-C">
                        </div>
                        <input value="Generate" type="submit" class="btn btn-primary"><br/><br/>
                        <div class="alert alert-success" role="alert">
                            <?php echo $errorMsg; ?>
                            <?php echo $successMsg; ?> 
                        </div>
                </form>
            </div>
        </body>
        </html>