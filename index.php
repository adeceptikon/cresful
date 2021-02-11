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
<?php include_once("./top.php"); ?>


<?php
$d = opendir("./content");
while($file  = readdir($d)){
    $file = "./content/".$file;
    if(is_dir($file)) continue;
    // echo $file;
    $f = fopen($file , "r+");
    $question = fgets($f);
    fclose($f);
    echo "<li><a href='./queryDisplay.php?q=$file'>$question</a></li><br />";

}


?>




</body>