<?php 
$link = mysqli_connect("localhost", "root", "", "students");
$sql = "SELECT * FROM student";
$result = mysqli_query($link, $sql);
$opt = "<select name='codes' onchange='showInfo(this.value)'>";

while($row = mysqli_fetch_assoc($result)){
    $opt .= "<option value='{$row['code']}'>{$row['code']}</option>\n";
}
$opt .= "</select>";
?>
<!DOCTYPE html>
<html>
    <head>
    <title> PHP AJAX AND MYSQL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;
            text-align: left;
        }

        .collapsible {
            background-color: #777;
            color: white;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
        }

            .active, .collapsible:hover {
                background-color: #555;
            }

        .content {
            padding: 0 18px;
            display: none;
            overflow: hidden;
            background-color: #f1f1f1;
        }
    </style>
    </head>

    
    <body>
        <div>
            <h1>My Courses</h1>
            <p>Mr.Khalled Turkestani</p>
        </div>

        <div>
            <p>Select a course from the menu to see the details.</p>
        </div>
        
        <?php
            echo $opt;
            ?>
         
<br>
    <div id="info"><b>Person info will be listed here.</b></div>

        

     

        <br />
      
        <button type="button" class="collapsible">Add New Course</button>
        <div class="content">
            <form action="insert.php" method="POST">
                <input type="text" name="code" placeholder="code">
                <br>
                <input type="text" name="CourseName" placeholder="CourseName">
                <br>
                <input type="text" name="Description" placeholder="Description">
                <br>
                <button type="submit" name="submit">Add Course</button>
            </form>
        </div>
       

    </body>
    

</html>

<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }

  function showInfo(str) {
  if (str=="") {
    document.getElementById("info").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("info").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","showInformation.php?q="+str,true);
  xmlhttp.send();
}


</script>