<?php

include_once("./top.php");
if(isset($_POST['submit'])) {
    $question  = $_POST['question']."\n";
    $answer = $_POST['answer'];
    $file = './content/'.sha1($question) ;

    if($f = fopen($file , "w+")){
        fwrite($f , $question); // have to modify for entry editing

        fwrite($f,$answer);
        fclose($f);
        echo "<h3>फाइल $file मे एंट्री हो गया </h3>";
    }
    echo "<a href='createEntry.php'>एक और सवाल डालें </a><br />";

    echo 'QUESTION: '.$question;
    echo '<br />ANSWER:' .$answer;

}
?>