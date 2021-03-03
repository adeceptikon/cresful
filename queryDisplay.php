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
<div class="container-fluid" >
<?php include_once("./top.php") ; ?>
<?php
    $received_file_index =  $_GET['q'] ;
    $filename = $_SESSION['file'][$received_file_index];
   $f = simplexml_load_file( $filename);

   $question = $f->question;
//    $question = substr($question , 20);
   $answer  = htmlspecialchars( $f->answer);
   $user = $f->user;
   $date  = $f->date;
   $location = $f->location;
   
echo "<h1>$question</h1>
     <div id='article_data'>$date &nbsp; &nbsp;$user &nbsp; &nbsp; $location </div>
     <a href='editEntry.php?q=$received_file_index'><button>EDIT /IMPROVE</button></a>
    <div>
        <p>$answer</p>
    </div>";
?>
</div>
</body>
