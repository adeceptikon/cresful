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

$d = opendir("./content");
if(isset($_POST['search_query'])){
    echo "<h2>सेर्च अभी कम नहीं कर रहा है। <a href='./index.php'>मेन पेज</a></h2>";
} else{

    $i = 0;
    // new ArrayObject($_SESSION['file']);
    $_SESSION['file'] = array();
    while(($file  = readdir($d) )&& $i< 1024){    //file_path nahi deta hai isiliye
        $_SESSION['file'][$i] = "./content/".$file; //pura file path  ke liye
        // echo $_SESSION['file'][$i] ;
        if(is_dir($_SESSION['file'][$i] )) continue; //folder hai to chhod do aage badho
        // echo $file;


        $f = simplexml_load_file($_SESSION['file'][$i] );
        $question = $f->question[0];
        $answer = $f->answer;
        echo "<li><a href='./queryDisplay.php?q=$i'>$question</a>";//don't put filename in links
        if($f->answer == "") {echo "&nbsp;&nbsp;&nbsp;<a href='editEntry.php?q=$i'><i>जवाब नहीं है</i></a>";}
        echo "</li><br />";

        // print_r ($f);

        $i++;
    }
}
?>
</body>