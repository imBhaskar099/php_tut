<!-- PHP Codes -->

<?php

if (isset($_GET["rsub"]))
{
  $name = $_GET['rname'] ;
  echo "Your name is ", $name ;
}
?>

<!-- HTML Codes  -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <style>
    body{
      text-align: center;
    }
  </style>
</head>
<body>
  <form action="" method="GET">
    Name : <input type="text" name="rname">
    <br>
    <br>
    <input type="submit" value="Submit Now" name="rsub">
  </form>
</body>
</html>