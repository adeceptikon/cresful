<?php session_start();
?>
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
            width: 90%;
        }
    </style>
</head>

<body>
<?php include_once("./top.php") ; ?>
<?php
    $filename =  $_GET['q'] ;
   $f = simplexml_load_file( $filename);

   $question = $f->question;
//    $question = substr($question , 20);
   $answer  = htmlspecialchars( $f->answer);
   $user = $f->user;
   $date  = $f->date;
   $location = $f->location;
   
echo "<h1>$question</h1>
     <div id='article_data'>$date &nbsp; &nbsp;$user &nbsp; &nbsp; $location </div>
     <a href='editEntry.php?q=$filename'><button>EDIT /IMPROVE</button></a>
    <div>
        <p>$answer</p>
    </div>";
?>
</body>
