<?php  session_start();

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
</head>

<body>
<div class="container-fluid" >


<?php

$edit = 0;

include_once("./top.php");
if(isset($_POST['submit'])) {
	
	if(isset($_GET['editable'])){
        $edit = $_GET['editable'];
        $received_file_index = $_GET['q'];
	}
//prepare the entry 
    $entry['question']  = $_POST['question'];
    $question = $entry['question'];
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

//check for duplicate question / file
    if(file_exists($filename) ){
		if ($edit == 0) {
			echo "This question already exists <!-- <a href='./queryDisplay?f=$filename'> here</a> !--><br />"; //security risk
		}
		else if ($edit == 1){
			if(unlink( $filename)){

                $xml = new DOMDocument('1.0', 'UTF-8');
                $root = $xml->createElement("article");
                $xml->appendChild($root);
                foreach($entry as $key => $value ){
                    $node = $xml->createElement($key);
                    $node->nodeValue = $value;
                    $root->appendChild($node);
                }
                $xml -> save($filename);
                echo '<h2>फाईल एडिट हो गया</h2>';
                echo "<li><a href='./queryDisplay.php?q=$received_file_index'>$question</a>";
            }
		}
	}
//dupicate nahi hai to naya bana do
	else {
        $xml = new DOMDocument('1.0', 'UTF-8');
        $root = $xml->createElement("article");
        $xml->appendChild($root);
        foreach($entry as $key => $value ){
            $node = $xml->createElement($key);
            $node->nodeValue = $value;
            $root->appendChild($node);
        }
        $xml -> save($filename);
		
		file_put_contents('./questions.txt' , $entry['question']."\r\n" , FILE_APPEND); // error here file gets appended without a newline character
		
		$confiramtion_meassage = "फाइल मे एंट्री हो गया ";
        echo "<h3>$confiramtion_meassage</h3>";
    }
    // echo "<h4><a href='createEntry.php'>एक और सवाल डालें </a><br /></h4>";



    // echo 'QUESTION: '.$question;
    // echo '<br />ANSWER:' .$answer;

}
?>
</div>
</html>