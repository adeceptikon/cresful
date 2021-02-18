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
while($file  = readdir($d)){    //file_path nahi deta hai isiliye
    $file = "./content/".$file; //pura file path  ke liye
    if(is_dir($file)) continue; //folder hai to chhod do aage badho
    // echo $file;
    $f = simplexml_load_file($file);
    //yahan change karna hoga, file format etc banana hoga
    $question = $f->question[0];
    echo "<li><a href='./queryDisplay.php?q=$file'>$question</a></li><br />";//don't put filename in links
}
?>
</body>