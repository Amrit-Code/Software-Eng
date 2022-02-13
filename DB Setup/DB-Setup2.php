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
    
    $sql = "CREATE TABLE ExamToDo(
        StudentID int,
        ExamID int,
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