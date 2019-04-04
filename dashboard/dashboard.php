<html>
<body>
<?php 
  session_start(); 
  require("../db/dbconn.php");



  $data = json_decode(file_get_contents("php://input"), TRUE);
  $date = $data['date'];


  // $query = "SELECT * FROM timesheet JOIN employee USING employee_id WHERE date = $date";
  $query = "SELECT * from EMPLOYEE";
    
  if ($result = $conn->query($query)) {
  
      echo "<table border='4' cellspacing='2' cellpadding='6'>";
                echo "<tr><th>S/N</th>".
                   "<th>name</th>".
                  "<th>department</th>".
                  "<th>role</th>".
               " </tr> ";
              
              
               while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row['id'] . "</td>".
                 "<td>" . $row['firstname'] . " ".$row['lastname']. "</td>".
                 "<td>" . $row['department'] . "</td>".
                 "<td>" . $row['role'] . "</td></tr>";  
               
             
                    }  
                echo "</table>";

                  }
          
?>


</body>
</html>