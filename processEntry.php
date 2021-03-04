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
                // $received_file_index = $_GET['q'];
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
            $filename = './content/'.$sha.'.yaml' ;

        //check for duplicate question / file
            if(file_exists($filename) ){
                if ($edit == 0) {
                    echo "This question already exists <!-- <a href='./queryDisplay?f=$filename'> here</a> !--><br />"; //security risk
                }
                else if ($edit == 1){ //agar editing ka request hai
                    if(rename( $filename , "./dump/$sha.delete")){
                        $str =""; //json object ke liye key
                        foreach($entry as $key => $value ){
                            if($value==""){ $value = null;}
                            $str .='"'. $key.'" : "'.$value.'",';
                        }
                    $str = '{'.$str.'"end":"true"}';
                    $newFile = fopen($filename , "w+");
                    fwrite($newFile , $str);
                    fclose($newFile);
                    $s_msg = " file edited succesfully";
                    $hs_msg = "फाइल एडिट  हो गया ";
                    echo "<h3>$hs_msg<br />$s_msg</h3>";
                    echo "<hr /><a href='./queryDisplay.php?q=$filename'><li>$question <br /></li></a>";

                        // $xml = new DOMDocument('1.0', 'UTF-8');
                        // $root = $xml->createElement("article");
                        // $xml->appendChild($root);
                        // foreach($entry as $key => $value ){
                        //     $node = $xml->createElement($key);
                        //     $node->nodeValue = $value;
                        //     $root->appendChild($node);
                        // }
                        // $xml -> save($filename);
                        // echo '<h2>फाईल एडिट हो गया</h2>';
                        // echo "<li><a href='./queryDisplay.php?q=$received_file_index'>$question</a>";
                    }
                }
            }
        //dupicate nahi hai aur edit karne ka request bhi nahi hai to naya file (yaml)bana do
            else {
                $str =""; //json object ke liye key
                foreach($entry as $key => $value ){
                    if($value==""){ $value = null;}
                    $str .='"'. $key.'" : "'.$value.'",';
                }
                $str = '{'.$str.'"end":"true"}'; //echo $str;
                /*// the following strings are valid JavaScript but not valid JSON

// the name and value must be enclosed in double quotes
// single quotes are not valid 
$bad_json = "{ 'bar': 'baz' }";
json_decode($bad_json); // null

// the name must be enclosed in double quotes
$bad_json = '{ bar: "baz" }';
json_decode($bad_json); // null

// trailing commas are not allowed
$bad_json = '{ bar: "baz", }';
json_decode($bad_json); // null
*/
                $newFile = fopen($filename , "w+");
                fwrite($newFile , $str);
                fclose($newFile);
                $s_msg = "New file succesfully made";
                $hs_msg = "फाइल मे एंट्री हो गया ";

                //question list me question daal do
                file_put_contents('./questions.txt' , $entry['question']."\r\n" , FILE_APPEND); 
                // FILE_APPEND jaroori hai taaki add ho nahi to baaki sab gayab ho jaega 
                
                echo "<h3>$hs_msg<br />$s_msg</h3>";
                echo "<hr /><a href='./queryDisplay.php?q=$filename'<li>$question <br />$filename</li>";
            }
            echo "<h5><a href='createEntry.php'>एक और सवाल डालें </a><br /></h5>";

        }
        ?>
    </div>
</body>
</html>