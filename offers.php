<?php 
session_start();
?>


<!DOCTYPE html>
<meta charset="UTF-8" >
<head>
<style>
        textarea{
            min-height: 100px;
            width: 90%;
            outline: none;
            
        }
        #answer{
            min-height: 300px;
            width: 90%;
            outline: none;
            
        }
        #question{
            min-height: 100px;
            width: 80%;
            outline: none;
            
        }
        input{
           width: 90%;
        }
        #search{
            width: 50%;
        }
    </style>

</head>

<body>
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
</body>

