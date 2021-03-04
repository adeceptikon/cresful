<?php session_start();
?>
<!DOCTYPE html>
<meta charset="UTF-8" >
<meta name="viewport" content="width=device-width, initial-scale=1">


<head>
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
<div class="container-fluid">
<?php 

include_once("./top.php"); 
?>


<?php 
    $f = fopen("./users/".$_SESSION['username'].'/'.$_SESSION['username'].".log" ,"r+");
    $data = fgetcsv($f,1000 , ',' );//khali access time hai aur kuch bhi nahi
    echo "<h3>Data for account ".$_SESSION['username']."</h3>";
    echo "<a href='deleteAccount.php'><button>Delete Account</button></a>";
    echo "<p>";
    for($i =0 ; $i< count($data) ;$i++){
        echo "$data[$i] <br />";    
    }
    echo"</p>";

    ?>
</div>
</body>