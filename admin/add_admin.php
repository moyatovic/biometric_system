<?php

    require('../db/dbconn.php');
    
    
?>
<html>
    <style>
        body{
            background-color: whitesmoke;
        }
        form{ 
            background-color: lightblue;
            border: 2px solid black;
            margin: 13% 35%;
            padding: 3em;
            border-radius: 0 2em ;
            
           
        }
        input{
            width: 100%;
            height: 3em;
            border-radius: 0.5em;
        }
    </style>
    <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <legend>ADD A NEW ADMIN</legend>
            <p><input type="text" name="username" placeholder="username" required/></p>
            <p><input type="password" name="password" placeholder="password" required/></p>
            <input type="submit" name="submit" value="submit"/>
        </form>
                
    </body>
</html>
    <?php

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $username = $_POST['username'];
                        $password = md5($_POST['password']);
                        echo  $_POST['username'];

                        $sel_query ="INSERT INTO admins values(null, '$username', '$password')";
                        if (mysqli_query($conn, $sel_query)) {                  
                            echo "New record created successfully";
                           
                            mysqli_close($conn);
                            header('HTTP// 200 ok');
                      } else {
                            echo "Error: " . $sel_query . "<br>" . mysqli_error($conn);
                      }
                          
                    }
?>