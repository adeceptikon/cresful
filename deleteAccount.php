<?php session_start();
    $current = "./users/".$_SESSION['username']."/";
    $new = './dump/'.$_SESSION['username']."/";
    if (rename($current , $new)){
        session_destroy();
        header("Location: ./index.php");
    }
    else {
        include_once("./top.php");
        echo "<h2>एकाउंट डिलीट नहीं हो सका ! ";
    }
?>

