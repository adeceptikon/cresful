<?php session_start();
?>
<!DOCTYPE html>
<meta charset="UTF-8" >
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
<div class="container">
<?php include_once("./top.php"); ?>

<?php

$d = opendir("./content");
if(isset($_GET['search_button']) && !empty($_GET['search_q'])){
	$search_string = $_GET['search_q'];
	// echo $search_string;
	$f = fopen('./questions.txt' , 'r');
	$t = 1000;
	$list = NULL;
	while($s = fgets($f)){
		if( strpos($s ,$search_string)!== false ){
			$file = './content/'.sha1(substr($s , 0 , -2)).'.xml';
			$_SESSION['file'][$t] = $file;
			// echo $file;
			$list .= "<li><a href='./queryDisplay.php?q=$t'>$s</a></li>";

		}
		
		$t++;
	}
	if($list == NULL) {
		echo "<h2>$search_string से संबंधित कुछ नहीं मिला । </h2>";
	}
	else {
		echo '<h2>Yes ! जवाब है। </h2> '.$s.'<br />';
		echo $list;	
	}
    // echo "<h2>:( सर्च अभी कम नहीं कर रहा है। <a href='./index.php'>मेन पेज</a></h2>";
} else{

    $i = 0;
    // new ArrayObject($_SESSION['file']);
    $_SESSION['file'] = array();
    while(($file  = readdir($d) )&& $i< 1024){    //file_path nahi deta hai isiliye
        $_SESSION['file'][$i] = "./content/".$file; //pura file path  ke liye
        // echo $_SESSION['file'][$i] ;
        if(is_dir($_SESSION['file'][$i] )) continue; //folder hai to chhod do aage badho
        // echo $file;

//prepare karo output 
        $f = simplexml_load_file($_SESSION['file'][$i] );
        $question = $f->question[0];
        $answer = $f->answer;
//display karo output		
        echo "<li><a href='./queryDisplay.php?q=$i'>$question</a>";//don't put filename in links
        if($f->answer == "") {echo "&nbsp;&nbsp;&nbsp;<a href='editEntry.php?q=$i'><i>जवाब नहीं है</i></a>";}
        echo "</li><br />";

        // print_r ($f);

        $i++;
    }
}
?>
</div>
</body>