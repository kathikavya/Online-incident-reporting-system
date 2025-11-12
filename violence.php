<?php

$$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "crime_reports"; 

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $incident_date = $_POST['incident_date'];
    $incident_time = $_POST['incident_time'];
    $incident_location = $_POST['incident_location'];
    $description = $_POST['description'];
    $violence_type = $_POST['violence_type'];
    $reporter_name = $_POST['reporter_name'];
    $reporter_email = $_POST['email'];
    $additional_info = $_POST['additional_info'];

    $sql = "INSERT INTO violence_reports (incident_date, incident_time, incident_location, description, violence_type, reporter_name, reporter_email, additional_info) VALUES ('$incident_date', '$incident_time', '$incident_location', '$description', '$violence_type', '$reporter_name', '$reporter_email', '$additional_info')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "<script>alert('REPORT SUBMITTED SUCCESSFULLY');</script>";
        header("Location: response.html");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
