<?php 
session_start();
?>


<!DOCTYPE html>
<meta charset="UTF-8" >
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
<div class="container" >
    <?php include_once("./top.php");
    ?>

<form action="./offers.php">
        <label for="offer">Create your offer</label>
        <textarea name="offer"></textarea><br /><br />
        <label for="username" >Username</label>
        <input type="text" value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username'];?>" /><br /><br />
        <label for="bountyAmount">Bounty </label>
        <input type="number" name="bountyAmount" /><br /><br />
        <button type="submit" name="offerSubmit">submit</button>
</form>

<?php

        $xml = simplexml_load_file("./others/offers.xml");
        echo $xml;        
?>
</div>
</body>

