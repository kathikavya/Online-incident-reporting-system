<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "crime_reports"; 

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $incident_date = $_POST['incident_date'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $impact = $_POST['impact'];
    $actions_taken = $_POST['actions_taken'];
    $reporter_name = $_POST['reporter_name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO environment (incident_date,location,description,impact,action,reporter,email) VALUES ('$incident_date', '$location', '$description',  '$impact' , '$actions_taken' ,'$reporter_name','$email')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "<script>alert('REPORT SUBMITTED SUCCESSFULLY');</script>";
        header("Location: response.html");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
$conn->close();
?>
