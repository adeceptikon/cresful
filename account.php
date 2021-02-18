<?php session_start();
?>
<!DOCTYPE html>
<meta charset="UTF-8" >
<head>
    <style>
        body{
            font-family: 'Nirmala UI';
        }
    </style>

</head>

<body>
<?php 

include_once("./top.php"); 
?>


<?php 
    $f = fopen("./users/".$_SESSION['username'].'/'.$_SESSION['username'].".log" ,"r+");
    $data = fgetcsv($f,1000 , ',' );
    echo "<h3>Data for account ".$_SESSION['username']."</h3>";
    echo "<a href='deleteAccount.php'><button>Delete Account</button></a>";
    echo "<p>";
    for($i =0 ; $i< count($data) ;$i++){
        echo "$data[$i] <br />";    
    }
    echo"</p>";

    ?>
</body>