<?php session_start();
?>
<?php

include_once("./top.php");
if(isset($_POST['submit'])) {
    //prepare the entry 
    $entry['question']  = $_POST['question'];
    $entry['answer'] = $_POST['answer'];
    $entry['location'] = $_POST['location'];
    $entry['tags'] = $_POST['tags'];
    $entry['user'] = $_POST['user'];
    $entry['context'] = $_POST['context'];
    $entry['unixTime']  = time();
    $entry['date'] = date("d-m-Y" , time());

    $sha = sha1($entry['question']);
    
    //create filename
    $filename = './content/'.sha1($entry['question']).'.xml' ;

    //check for duplicate question
    if(file_exists($filename)){
        echo "This question already exists";
    } else {
        $xml = new DOMDocument('1.0', 'UTF-8');
        $root = $xml->createElement("article");
        $xml->appendChild($root);
        foreach($entry as $key => $value ){
            $node = $xml->createElement($key);
            $node->nodeValue = $value;
            $root->appendChild($node);

        }
        $xml -> save("$filename.xml");
        echo "<h3>फाइल मे एंट्री हो गया </h3>";
    }
    echo "<a href='createEntry.php'>एक और सवाल डालें </a><br />";



    // echo 'QUESTION: '.$question;
    // echo '<br />ANSWER:' .$answer;

}
?>