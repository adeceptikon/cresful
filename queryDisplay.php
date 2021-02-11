<!DOCTYPE html>
<meta charset="UTF-8" >
<head>
<style>
        textarea{
            min-height: 300px;
            width: 90%;
            outline: none;
            
        }
        input{
            width: :90%;
        }
    </style>


</head>

<body>
<?php include_once("./top.php") ; ?>
<?php
    $filename =  $_GET['q'] ;
   $f = fopen( $filename, "r");
   $question = fgets($f);
//    $question = substr($question , 20);
   $body  = file_get_contents($filename);
   
   fclose($f);
echo "<h1>$question</h1> <a href='editEntry.php?q=$filename'><button>EDIT</button></a>
    <div>
        <p>$body</p>
    </div>";
?>
</body>
