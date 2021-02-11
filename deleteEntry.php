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
<?php include_once("./top.php");
    $filename = $_GET['q'];
    if(unlink($filename)){
        echo "<p> एंट्री को हटा दिया गया है ।</p>";
    }
    echo '<a href="createEntry.php">नया सवाल डालें</a>';

?>

</body>