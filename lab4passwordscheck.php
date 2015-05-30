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
      }


      $usr=$_POST["username"];
      $pswd=$_POST["password"];


      $result = $conn->query("SELECT username,password FROM tableA WHERE username='$usr' AND password='$pswd'"); 
     
      if ($result->num_rows > 0)
         {
            print ("Valid Password, Please proceed to message page.");
            print ("<form action='lab4secondscreen.php'><input type=hidden name='username' value=$usr> <input type=hidden name='password' value=$pswd><input type=hidden name='validity' value='valid'> <input type='submit' value='Proceed'");
            
         }
      if ($result->num_rows == 0)
         {
            print ("Invalid Password, go back!");
            print ("<form action='lab4.php'> <input type=hidden name='username' value=$usr> <input type=hidden name='password' value=$pswd> <input type=hidden name='validity' value='invalid'> <input type='submit' value='Return'");
         }
      $conn->close();
      
   ?>
</body>
</html>

