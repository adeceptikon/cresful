<?php session_start();
?>
<!DOCTYPE html>
<meta charset="UTF-8" >
<head>
<link rel="stylesheet" href="./css/bootstrap.css" />

    <style>
        body{
            font-family: 'Nirmala UI';
        }
    </style>

</head>

<body>
<?php include_once("./top.php");
    $received_file_index = $_GET['q'];
    // echo $received_file_index;
    $filename = $_SESSION['file'][$received_file_index];
    if(unlink($filename)){ //file delete karne ke liye abhi unsafe hai
        echo "<p> एंट्री को हटा दिया गया है ।</p>";
    }
    echo '<a href="createEntry.php">नया सवाल डालें</a>';

?>

</body>