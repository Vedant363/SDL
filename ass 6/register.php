<?php
$servername = "localhost";
$username = "root";
$password = "ved363";
$dbname = "practice";
//connection
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection Failed". $conn->connect_error);
}
//retrive data
$name = $_POST['name'];

//sql to insert

$sql_check = "SELECT * from emp where name ='$name'";
$result_check = $conn->query($sql_check);
if($result_check->num_rows > 0){
    echo "Already Exists!";
}
else{
    $sql = "INSERT INTO emp (name) VALUES ('$name')";

    if($conn->query($sql)==TRUE){
        echo "New record created successfully";
    }
    else{
        echo "Error in inserting record, Error is ".$conn->error;
    }
}


// Retrieve data from the database
$sql_select = "SELECT * FROM emp";
$result = $conn->query($sql_select);
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>