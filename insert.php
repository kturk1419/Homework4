<?php
$link = mysqli_connect("localhost", "root", "", "students");

$code = mysqli_real_escape_string($link, $_POST['code']);
$CourseName = mysqli_real_escape_string($link, $_POST['CourseName']);
$Description = mysqli_real_escape_string($link, $_POST['Description']);


$sql = "INSERT INTO student (code, CourseName, Description) VALUES ('$code', '$CourseName', '$Description')";

if(mysqli_query($link, $sql)){
echo "RecorDescription added successfully.";
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// close connection
mysqli_close($link);
?>
