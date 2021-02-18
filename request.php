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

<form action="./request.php">
        <label for="request">Create your request</label>
        <textarea name="request"></textarea><br /><br />
        <label for="username" >Username</label>
        <input type="text" value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username'];?>" /><br /><br />
        <button type="submit" name="requestSubmit">submit</button>
</form>

<?php

        $xml = simplexml_load_file("./others/requests.xml");
        echo $xml;        
?>
</body>

