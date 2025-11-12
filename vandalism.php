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
    $location = $_POST['location'];
    $description = $_POST['description'];
    $suspect_description = $_POST['suspect_description'];
    $witnesses = $_POST['witnesses'];
    $reporter_name = $_POST['reporter_name'];
    $reporter_email = $_POST['email'];

    $sql = "INSERT INTO vandalism_reports (incident_date, location, description, suspect_description, witnesses, reporter_name, reporter_email)
            VALUES ('$incident_date', '$location', '$description', '$suspect_description', '$witnesses', '$reporter_name', '$reporter_email')";

    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "<script>alert('REPORT SUBMITTED SUCCESSFULLY');</script>";
        header("Location: response.html");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
