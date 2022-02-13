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
    /*$sql = "INSERT INTO UserInfo VALUES(02, 'test', 'pass', 'test@gmail.com');
    INSERT INTO StudentUser VALUES(1, 02);";*/
    $sql = "SELECT * FROM UserInfo";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Registration Sucsessfull";
    //Your code
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>