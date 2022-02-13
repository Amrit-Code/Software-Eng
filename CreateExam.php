<?php 
    session_start();
    $Uusername = $_SESSION["username"];
    $Display = 0;

    $servername = "dbprojects.eecs.qmul.ac.uk";
    $username = "as396";
    $password = "nPLVi52BQXSMS";
    $dbname = "as396";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        $sql = "SELECT * FROM UserInfo u, TeacherUser t 
        WHERE u.UserID = t.UserID AND '$Uusername' = u.Username;
        " ;

        $result = $conn->query($sql);

        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $name = $row["UName"];
            $MarkerID = $row["MarkerID"];
        }
    }
?>

<!DOCTYPE html>
<html>
    <head lang="en">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <meta charset="utf-8">
        <style 
        type="text/css">
            .middle {
              margin-left: 10%;
              margin-right: 10%;
              margin-top: 5%;
            }
            .left{ 
                margin-left: 2%;
            }
        </style>
        <title>Create Exam</title>
    <link rel="icon" href="logo.png">
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><?php echo $name; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="TeacherLandingPage.php">Mark Exams <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Create Exam</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Search for Student</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    Marker ID : <?php echo $MarkerID ; ?>     
                </span>
            </div>
            <form class="form-inline left" action="http://webprojects.eecs.qmul.ac.uk/as396/se19/Logout.php" method="POST">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
          </nav>

          
          <div class="card middle">
            <div class="card-body">
                <form action="http://webprojects.eecs.qmul.ac.uk/as396/se19/GenerateExam.php" method="POST">
                    <div class="form-group">
                        <label for="ExamName">Exam Name</label>
                        <input type="text" class="form-control" id="ExamName" name="ExamName" required>
                    </div>
                    <div class="form-group">
                        <label for="ExamLength">Exam Length</label>
                        <input type="text" class="form-control numRec" id="ExamLength" name="Length" required>
                    </div>
                    <div class="form-group">
                        <label for="ExamDate">Exam Date</label>
                        <input type="text" class="form-control dateRec" id="ExamDate" name="Date" required>
                        <small id="emailHelp" class="form-text text-muted">Use the format "Day-Month-Year".</small>
                    </div>
                    <div class="form-group">
                        <label for="StartTime">Start Time</label>
                        <input type="text" class="form-control numRec" id="StartTime" name="StartTime" required>
                        <small id="emailHelp" class="form-text text-muted">Please enter a numerical value.(08:00 = 0800)</small>
                    </div>
                    <div class="form-group">
                        <label for="MinStayTime">Minimum Stay Time</label>
                        <input type="text" class="form-control numRec" id="MinStayTime" name="StayTime" required>
                    </div>
                    <div class="form-group">
                        <label for="EndStayTime">End Stay Time</label>
                        <input type="text" class="form-control numRec" id="EndStayTime" name="EndTime" required>
                    </div>
                    <div class="form-group">
                        <label for="NoMCQ">Number of MCQ</label>
                        <input type="text" class="form-control numRec" id="NoMCQ" name="MCQ" required>
                    </div>
                    <div class="form-group">
                        <label for="NoEssayQuestions">Number of Essay Questions</label>
                        <input type="text" class="form-control numRec" id="NoEssayQuestions" name="Essay" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </form>
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="verification.js"></script>
    </body>
    <script>
        var submit = document.getElementById("submit").addEventListener('click',checkTimes);
        function checkTimes(e){
            let x = document.getElementById("MinStayTime").value;
            let y = document.getElementById("EndStayTime").value;
            let z = document.getElementById("ExamLength").value;
            if(parseInt(x) + parseInt(y) > parseInt(z)){
                alert("Your min stay time and end stay time dont add up");
                e.preventDefault();
            }
        }
    </script>
</html>

<?php 
    $conn->close();
?>