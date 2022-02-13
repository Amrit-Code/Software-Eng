<?php 

$servername = "dbprojects.eecs.qmul.ac.uk";
$username = "as396";
$password = "nPLVi52BQXSMS";
$dbname = "as396";
// Creates connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {
    $sql = "DROP TABLE EssayAnswer";

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "DROP TABLE MCAnswer";

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "DROP TABLE Answer";

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "DROP TABLE ExamToDo";

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "DROP TABLE MCQuestion";

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "DROP TABLE EssayQuestion";

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "DROP TABLE Question";

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "DROP TABLE Exam";

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    

    $sql = "DROP TABLE StudentUser";

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "DROP TABLE MarkerUser";

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "DROP TABLE TeacherUser";

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "DROP TABLE UserInfo";

    if ($conn->query($sql) === TRUE) {
        echo "Sucsess";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }


    

    $conn->close();
}

header("Location: DB-Setup.php");

?>