<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question2</title>
</head>
<body>
    <h1>Mathematic Table</h1>
    <form action="" method="POST">
        Enter your number: <input type="number" name="num"><br>
        <input type="submit" name="sub" value="Generate Table"><br>
    </form>
</body>
</html>

<?php
if(isset($_REQUEST["sub"]))
{
    if( (($_REQUEST["num"])=="") )
    {
        echo("<script>window.alert('Please neter the number'</script>");
    }

    else
    {
        $num=$_REQUEST["num"];
        
        for($i=1; $i<=10;$i++)
        {
            echo ($num . "X" . $i . "=" . $num*$i ."<br>" ) ;
        }
    }
}
?>