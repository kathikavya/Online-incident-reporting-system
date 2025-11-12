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
    $mname = $_POST['missing_name'];
    $age = $_POST['missing_age'];
    $gender = $_POST['missing_gender'];
    $description = $_POST['missing_description'];
    $lastseen = $_POST['missing_last_seen'];
    $last_seen_date = $_POST['missing_last_seen_date'];
    $last_seen_time = $_POST['missing_last_seen_time'];
    $reporter_name = $_POST['reporter_name'];
    $email = $_POST['email'];
    $additional_info = $_POST['additional_info'];
    $sql = "INSERT INTO missing (mname,age,gender,description,lastseen,lastdate,lasttime,reportername,email,additional) VALUES ('$mname', '$age', '$gender',  '$description' , '$lastseen' ,'$last_seen_date','$last_seen_time','$reporter_name','$email', '$additional_info')";
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
