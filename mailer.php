#!/usr/bin/env php

<?php

      require_once "Mail.php";
      
      $servername= "localhost";
      $username = "testuser";
      $password = "CHANGEME";
      $dbname = "databaseA";

      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }

      $result = $conn->query("SELECT email,message,timeTester FROM tableB WHERE timeTester<CURDATE()");

      if ($result->num_rows > 0)
         {
            while ($row=mysqli_fetch_row($result))
            {
            
            $from = '<dmitriypotemkin@gmail.com>';
            $to = '<'.$row[0].'>';
            $subject = 'Hi!';
            $body = $row[1];

            $headers = array(
              'From' => $from,
              'To' => $to,
              'Subject' => $subject
            );

            $smtp = Mail::factory('smtp', array(
              'host' => 'ssl://smtp.gmail.com',
              'port' => '465',
              'auth' => true,
              'username' => 'dmitriypotemkin@gmail.com',
              'password' => 'Mrfaker78'
            ));
            $mail = $smtp->send($to, $headers, $body);
            if (PEAR::isError($mail)) 
            {
               echo('<p>' . $mail->getMessage() . '</p>');
            }
            else {
            }
            $sql="DELETE FROM tableB WHERE email='$row[0]'";
            if (mysqli_query($conn, $sql)) {
            
            }
            else {
               echo "Error deleting record.";
            }    
            }
            mysqli_free_result($result);
         }
      elseif ($result->num_rows == 0)
         {
            
         }
      $conn->close();
?>
