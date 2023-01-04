<!-- Start PHP Codes -->

<?php

if (isset($_POST['rsub']))
{
    if ( ($_POST['no1']=="") || ($_POST['no2']=="") )    
    {
        echo "<script>window.alert(' Please Fill All The Fields')</script>";
    }
    else
    {
        $n1 = $_REQUEST['no1'] ;
        $n2 = $_REQUEST['no2'] ;
        $sum = $n1 + $n2 ;
    }
}
?>

<!-- HTML Form For Taking Input for sum -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUM PHP</title>
    <style>
        *{
            font-family: cursive;
        }
        body{
            text-align: center;
        }
        #result{
            border: none;
            border-bottom: 2px solid black;
            margin: 4px;            
            width: 50px;
            text-align: center;
        }
        input{
            padding:4px;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <div>
            First Number : <input type="text" name="no1" placeholder="Write First Number">
        </div>
        <br>
        <div>
            Second Number : <input type="text" name="no2" placeholder="Write Second Number">
        </div>
        <br>
        <div>
            <input type="submit" value="Add Now" name="rsub">
        </div>
        <br>
        <div>
            <h1>Adding Numbers</h1>
        </div>
        <br>
        <div>
            Result : <input type="text" placeholder="Result" id="result" value="<?php if(isset($sum)){echo $sum;} ?>">
        </div>
    </form>
</body>
</html>

