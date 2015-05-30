<html>
<body>
   <?php
      $servername= "localhost";
      $username = "testuser";
      $password = "CHANGEME";
      $dbname = "databaseA";

      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
         print("Failure!");
      }
      $usr=$_POST["usernameSet"];
      $pswd=$_POST["passwordSet"];
      $sql = "INSERT INTO tableA (username, password) VALUES ('$usr','$pswd')";

      if ($conn->query($sql) === TRUE) {
         print("New record created successfully, press return to return to login page.");
         $conn->close();
         print("<form action='lab4.php'><input type='submit' value='Return'></form>");
      }
      else {
         echo "Error: " . $sql . "<br>" . $conn->error;
      }
   ?>
</body>
</html>
