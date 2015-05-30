<html>
<body>
   <?php
   $message=$_POST["message"];
   $email=$_POST["email"];
   $time=$_POST["time"];
   
   $timeToken=str_split("$time");

   $finalTime=$timeToken[0].$timeToken[1].$timeToken[2].$timeToken[3].$timeToken[4].$timeToken[5].$timeToken[6].$timeToken[7].$timeToken[8].$timeToken[9]." ".$timeToken[11].$timeToken[12].$timeToken[13].$timeToken[14].$timeToken[15].":00"; 

   $servername= "localhost";
   $username = "testuser";
   $password = "CHANGEME";
   $dbname = "databaseA";

   $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
         print("Failure!");
      }
   $sql = "INSERT INTO tableB (email, message, timeTester) VALUES ('$email','$message','$finalTime')";
      if ($conn->query($sql) === TRUE) {
         print("New record created successfully, we're done! Press return for another message.");
         $conn->close();
         print("<form action='lab4secondscreen.php'><input type='submit' value='Return'></form>");
      }
      else {
         echo "Error: " . $sql . "<br>" . $conn->error;
      }
   ?>
<body>
</html>
