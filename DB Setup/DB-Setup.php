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
    $sql = "CREATE TABLE UserInfo (
        UserID int NOT NULL ,
        Username varchar(100),
        UPassword varchar(100),
        UEmail varchar(100),
        UName varchar(30),
        PRIMARY KEY (UserID)
    );"; 

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "CREATE TABLE StudentUser(
        StudentID int NOT NULL ,
        UserID int,
        FOREIGN KEY(UserID) REFERENCES UserInfo(UserID),
        PRIMARY KEY (StudentID)
    );"; 

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "CREATE TABLE MarkerUser(
        MarkerID int NOT NULL ,
        UserID int,
        FOREIGN KEY(UserID) REFERENCES UserInfo(UserID),
        PRIMARY KEY (MarkerID)
    );"; 

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "CREATE TABLE TeacherUser(
        TeacherID int NOT NULL ,
        UserID int,
        MarkerID int,
        FOREIGN KEY(UserID) REFERENCES UserInfo(UserID),
        FOREIGN KEY(MarkerID) REFERENCES MarkerUser(MarkerID),
        PRIMARY KEY (TeacherID)
    );"; 

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "CREATE TABLE Exam(
        ExamID int NOT NULL ,
        ExamName varchar(255),
        ExamLength int,
        ExamDate varchar(10),
        StartTime int,
        MinStay int,
        EndTime int,
        PRIMARY KEY (ExamID)
    );"; 

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "CREATE TABLE Question(
        QuestionID int NOT NULL ,
        Question varchar(255),
        QuestionNo int,
        Marks int,
        ExamID int,
        FOREIGN KEY(ExamID) REFERENCES Exam(ExamID),
        PRIMARY KEY (QuestionID)
    );"; 

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "CREATE TABLE EssayQuestion(
        QuestionID int,
        Answer varchar(500),
        MarkerID int,
        FOREIGN KEY(QuestionID) REFERENCES Question(QuestionID),
        FOREIGN KEY(MarkerID) REFERENCES MarkerUser(MarkerID)
    );"; 

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "CREATE TABLE MCQuestion(
        QuestionID int,
        PAnswer varchar(255),
        Answer varchar(255),
        FOREIGN KEY(QuestionID) REFERENCES Question(QuestionID)
    );"; 

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "CREATE TABLE Answer(
        AnswerID int NOT NULL ,
        StudentID int,
        QuestionID int,
        Marks int,
        PRIMARY KEY (AnswerID),
        FOREIGN KEY(QuestionID) REFERENCES Question(QuestionID),
        FOREIGN KEY(StudentID) REFERENCES StudentUser(StudentID)
    );"; 

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $sql = "Create TABLE MCAnswer(
        AnswerID int,
        Answer varchar(200),
        FOREIGN KEY(AnswerID) REFERENCES Answer(AnswerID)
    );"; 

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "Create TABLE EssayAnswer(
        AnswerID int,
        Answer varchar(600),
        Marked varchar(5),
        FOREIGN KEY(AnswerID) REFERENCES Answer(AnswerID)
    );"; 

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "CREATE TABLE ExamToDo(
        StudentID int,
        ExamID int,
        Done varchar(5),
        FOREIGN KEY(StudentID) REFERENCES StudentUser(StudentID),
        FOREIGN KEY(ExamID) REFERENCES Exam(ExamID)
    );";

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $conn->close();
} 
?>