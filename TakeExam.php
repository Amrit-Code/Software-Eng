<?php 

session_start();
$Uusername = $_SESSION['username'];
$ExamID = $_POST["ExamID"];
$_SESSION["ExamID"] = $ExamID;

$servername = "dbprojects.eecs.qmul.ac.uk";
$username = "as396";
$password = "nPLVi52BQXSMS";
$dbname = "as396";
// Creates connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Checks connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {

    $sql = "SELECT * FROM UserInfo u, StudentUser s 
    WHERE u.UserID = s.UserID AND '$Uusername' = u.Username;
    " ;

    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $name = $row["UName"];
        $ID = $row["StudentID"];
    }

    $sql = "SELECT * FROM Exam e WHERE ExamID = $ExamID";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $time = $row['ExamLength'];
    $minStay = $row['MinStay'];
    $endStay = $time - $row['EndTime'];
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
        </style>
        <title>Take Exam</title>
    <link rel="icon" href="logo.png">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button type="button" class="btn btn-danger" id="leaveStatus">You Can't Leave</button>
    <div class="w-100 p-1"><h5 id="timeLeft" class="float-right">You have <?php echo $time; ?> min left</h5></div>
    </nav>
          <div class="card middle">
          <h5 class="card-header"><?php echo "Exam ID : ".$_SESSION["ExamID"]."" ; ?></h5>
            <div class="card-body">
                <form action="http://webprojects.eecs.qmul.ac.uk/as396/se19/SubmitAnswers.php" method="POST" >
                    

                    <?php 

                        $QID = array();
                        
                        $sql = "SELECT * FROM Question q, MCQuestion m
                        WHERE q.QuestionID = m.QuestionID AND q.ExamID = $ExamID;";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            foreach($result as $row){
                                $Question = $row["Question"];
                                $Options = explode("-", $row["PAnswer"]);
                                $Qnum = $row["QuestionNo"];
                                echo '

                                <div class="card middle">
                                <div class="card-body">
                                
                                <div class="form-group">
                                <label for="exampleInputEmail1">'.$Qnum.') '.$Question.'</label><br>
                                ';

                                foreach($Options as $Option){
                                    echo'<input type="checkbox" class="MCquestion" name="Question'.$Qnum.'[]" value="'.$Option.'" ><label>'.$Option.'</label><br/>';
                                }

                                echo '
                                </div>

                                </div>
                                </div>
                                ';
                                array_push($QID,$row["QuestionID"]);
                            }
                        }

                        $sql = "SELECT * FROM Question q, EssayQuestion e 
                        WHERE q.QuestionID = e.QuestionID AND q.ExamID = $ExamID;";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            foreach($result as $row){
                                $Question = $row["Question"];
                                $Qnum = $row["QuestionNo"];

                                echo'
                                <div class="card middle">
                                <div class="card-body">
                                
                                <div class="form-group">
                                <label for="exampleInputEmail1">'.$Qnum.') '.$Question.'</label><br>
                                <textarea class="form-control Equestion" id="exampleFormControlTextarea1" rows="3" name="Question'.$Qnum.'"></textarea>
                                </div>

                                </div>
                                </div>
                                ';
                                array_push($QID,$row["QuestionID"]);
                            }
                        }
                    
                    
                    ?>


                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                



        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
    <script>

        var leave = false;
        document.getElementById("submit").addEventListener('click',leaveExam);
        var leaveStatus = document.getElementById("leaveStatus");
        var timer = document.getElementById("timeLeft");
        console.log(timer);
        function leaveExam(e){
            if(!leave){
                e.preventDefault();
                alert("You Can't Leave Right Now!");
            }
        }

        function activate(e){
            leave = true;
            leaveStatus.classList.replace("btn-danger","btn-success");
            leaveStatus.innerHTML="You can Leave";
            clearInterval(e);
        }

        function deactivate(e){
            leave = false;
            leaveStatus.classList.replace("btn-success","btn-danger");
            leaveStatus.innerHTML="You can't leave";
            clearInterval(e);
        }

        function endExam(e){
            leave = true;
            leaveStatus.classList.replace("btn-danger","btn-success");
            leaveStatus.innerHTML="You can Leave";
            alert("Exam is finished, you will now be redirected!");
            document.getElementById("submit").click();
            clearInterval(e);
        }

        setInterval(activate,<?php echo $minStay ; ?> *60000);
        setInterval(deactivate,<?php echo $endStay ; ?> *60000);
        setInterval(endExam,<?php echo $time; ?>*60000);

        var timeLeft = <?php echo $time; ?>;
        function updateTime(e){
            timeLeft -= 1;
            timer.innerText ="You have " + timeLeft.toString() + "min left" ;
        }
        setInterval(updateTime,60000);
    </script>
</html>

<?php 
$conn->close();
?>