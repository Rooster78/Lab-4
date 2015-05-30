<html>
<head>

</head>
<body>

Hello there, <?php print("Enter your email: "); ?>
      <form action="lab4messagesub.php" method="post">
         <input type="text" name="email" value="">
      <br></br>Please enter your date and time: 
         <input type="datetime-local" name="time">
      <br></br>
      Input Message:
   <input type="text" name="message">
   <input type="submit" value="Delayed Send">
      </form>
</body>
</html>
