<!-- PHP Codes  -->

<?php

if (isset($_POST["rsub"]))
{
    if ($_POST["rname"] == "")
    {
        echo "Fill all the Field " ;
    }
    else
    {
        $name = $_POST["rname"] ;
        echo "Your name is ", $name ;
    }
    
}

?>

<!-- HTML Codes -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Using Post</title>
</head>
<style>
    body{
        text-align:center ;
    }
</style>
<body>
    <form action="" method="POST">
        <div>
            Name : <input type="text" name="rname" >
        </div>
        <br>
        <div>
            <input type="submit" value="Submit" name="rsub">
        </div>
    </form>
    
</body>
</html>