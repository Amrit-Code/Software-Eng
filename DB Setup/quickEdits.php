<?php 

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
    
    //$sql = "DROP TABLE UserInfo;"; 
    //$sql = "INSERT INTO UserInfo VALUES(1, 'BobisGreat', 'pass', 'bob@Gmail.com', 'Bob Jones')";
    //  $sql = "SELECT * FROM UserInfo";
    //  foreach( $conn->query($sql) as $row){
    //      foreach($row as $element){
    //          echo "$element <br>";
    //      }
    //  }
    //  echo"TEACHERS:<br>";
     $sql = "SELECT * FROM EssayQuestion";
     foreach( $conn->query($sql) as $row){
         echo"<br>";
         foreach($row as $element){
             echo "$element <br>";
         }
     }
    //  echo"<br><br>";
    //  $sql = "SELECT * FROM MarkerUser";
    //  foreach( $conn->query($sql) as $row){
    //      echo"<br>";
    //      foreach($row as $element){
    //          echo "$element <br>";
    //      }
    //  }
    //  echo"<br><br>";
    //  $sql = "SELECT * FROM TeacherUser";
    //  foreach( $conn->query($sql) as $row){
    //      echo"<br>";
    //      foreach($row as $element){
    //          echo "$element <br>";
    //      }
    //  }
    // $sql = "alter session set nls_Date_format = 'DD-MM-YYYY';" ;
    // if ($conn->query($sql) === TRUE) {
    //     echo "Sucsess";
    // //Your code
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    //     //header("Location: TeacherLandingPage.php");
    // }
    // //  echo"Markers:<br>";
    //  $sql = "SELECT * FROM MCAnswer";
    //  foreach( $conn->query($sql) as $row){
    //      foreach($row as $element){
    //          echo "$element <br>";
    //      }
    //  }
    // $date = date('d-m-Y', strtotime('05-04-2020') );
    // $sql ="INSERT INTO Exam VALUES(1,'General Knowlage', 50, '$date', 800, 10, 20 );";
    // // $sql = "CREATE TABLE Exam(
    //     ExamID int NOT NULL ,
    //     ExamName varchar(255),
    //     ExamLength int,
    //     ExamDate date,
    //     StartTime int,
    //     MinStay int,
    //     EndTime int,
    //     PRIMARY KEY (ExamID)
    // );";
    // $sql = "INSERT INTO ExamToDo VALUES(1,1)";
    // if ($conn->query($sql) === TRUE) {
    //     echo "Sucsess";
    // //Your code
    // } else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    // }

    // $sql = "DROP TABLE EssayQuestion";
    // $conn->query($sql);
    
    // $sql = "CREATE TABLE EssayQuestion(
    //     QuestionID int,
    //     Answer varchar(500),
    //     MarkerID int,
    //     FOREIGN KEY(QuestionID) REFERENCES Question(QuestionID),
    //     FOREIGN KEY(MarkerID) REFERENCES MarkerUser(MarkerID)
    // );"; 
    // $sql = "INSERT INTO MarkerUser VALUES(1,6);";
    // if ($conn->query($sql) === TRUE) {
    //         echo "Sucsess";
    //     //Your code
    //     } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    //     }

    // $sql = "DROP TABLE Question";
    // $conn->query($sql);
    // $sql = "CREATE TABLE Question(
    //     QuestionID int NOT NULL ,
    //     Question varchar(255),
    //     QuestionNo int,
    //     Marks int,
    //     ExamID int,
    //     FOREIGN KEY(ExamID) REFERENCES Exam(ExamID),
    //     PRIMARY KEY (QuestionID)
    // );";
    // if ($conn->query($sql) === TRUE) {
    //         echo "Sucsess";
    //     //Your code
    //     } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    // $sql = "DROP TABLE EssayAnswer";
    // $conn->query($sql);
    // $sql = "Create TABLE EssayAnswer(
    //     AnswerID int,
    //     Answer varchar(600),
    //     Marked varchar(5),
    //     FOREIGN KEY(AnswerID) REFERENCES Answer(AnswerID)
    // );"; 
    // $sql="INSERT INTO Question VALUES(1,'asdf',1,3,1)";
    // if ($conn->query($sql) === TRUE) {
    //         echo "Sucsess";
    //     //Your code
    //     } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    


    $conn->close();
}


?>