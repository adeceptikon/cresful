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
        .grey{
            background-color: gray;
        }
    </style>
</head>

<body class="">
    <div class="container-fluid " >

        <?php //top banner
            include_once("./top.php") ; 
        ?>
        <div class="row">
            <div class="col-sm-2">

            </div>
            <div class="col-sm-8 ">
                <?php
                $filename = $_GET['q'];
                    // $received_file_index =  $_GET['q'] ;
                    // $filename = $_SESSION['file'][$received_file_index];
                    // $f = simplexml_load_file( $filename);
                    $s  = file_get_contents( $filename );
                    $jsonObj = json_decode( $s);
                    $question = $jsonObj->question;
                    // //    $question = substr($question , 20);
                    $answer  = htmlspecialchars( $jsonObj->answer);
                    $user = $jsonObj->user;
                    $date  = $jsonObj->date;
                    $location = $jsonObj->location;
                    
                    echo "<h1>$question</h1>
                        <div id='article_data'>$date &nbsp; &nbsp;$user &nbsp; &nbsp; $location </div>
                        <a href='editEntry.php?q=$filename'><button>EDIT /IMPROVE</button></a>
                        <div>
                            <p>$answer</p>
                        </div>";
                ?>
            </div>
            <div class="col-sm-2">
                
            </div>
        </div>
	</div>
    </div>
</body>
