<html>
<body>
<?php 
  session_start();
  $_SESSION['username'];
  $_SESSION['password'];

  require("../db/dbconn.php");

  $sql = "SELECT * FROM `report` JOIN `employee` USING `employee_id`; WHERE date = $date";
  $result = $conn->query($sql);

  
echo '<div >
       <table border="0" cellspacing="2" cellpadding="2"> 
          <th>
            <td>S/N</td>
            <td>name</td>
            <td>department</td>
            <td>role</td>
            <td>time in</td>
            <td>time out</td>
          </th> ';
        
          if ($result = $conn->query($query)) {
            while($rows = $conn->fetch()){
              for(i=0; i<=count($rows); i++){
             echo "<tr><td>".     
             "</td></tr>";
              }
            }
          }
?>


</body>
</html>