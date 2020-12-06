<?php
$link = mysqli_connect("localhost", "root", "", "students");

$sql = "SELECT * FROM student";
if($result = mysqli_query($link, $sql)){
if(mysqli_num_rows($result) > 0){
echo "<table>"; echo "<tr>"; 
echo "<th>code</th>"; echo "<th>course name</th>"; 
echo "<th>description</th>";

while($row = mysqli_fetch_array($result)){
echo "<tr>"; 
echo "<td>" . $row['code'] . "</td>";
echo "<td>" . $row['cn'] . "</td>";
echo "<td>" . $row['ds'] . "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_free_result($result);

} else{ echo "No records matching your query were found."; }
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>

