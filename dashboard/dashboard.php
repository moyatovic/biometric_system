<html>
<body>
<?php 
  session_start(); 
   require("../db/dbconn.php");

  echo  $_SESSION['username'];


  $data = json_decode(file_get_contents("php://input"), TRUE);
  $date = $data['date'];


  $query = "SELECT * FROM `report` JOIN `employee` USING `employee_id`; WHERE date = $date";
    
  if ($result = $conn->query($query)) {
  
      echo '<table border="0" cellspacing="2" cellpadding="2"> 
                <th>';
               echo   "<td>S/N</td>";
                  echo "<td>name</td>";
                echo  "<td>department</td>".
                  "<td>role</td>".
                  "<td>time in</td>".
                "  <td>time out</td>".
               " </th> ";
              
              
               while ($row = $result->fetch_assoc()) {
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['department'] . "</td>";
                echo "<td>" . $row['role'] . "</td>";  
                echo "<td>" . $row['time_in'] . "</td>";
                echo "<td>" . $row['time_out'] . "</td>";
             
                    }
                  }
          
?>


</body>
</html>