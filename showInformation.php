<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = strval($_GET['q']);

$con = mysqli_connect('localhost','root','','students');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"student");
$sql="SELECT * FROM student WHERE code = '". $q ."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Code</th>
<th>Course Name</th>
<th>Description</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['code'] . "</td>";
  echo "<td>" . $row['CourseName'] . "</td>";
  echo "<td>" . $row['Description'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>
</html>