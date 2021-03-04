<?php session_start();
?>
<!DOCTYPE html>
<html>
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
<style>
	.card{
		border:none;
	}
</style>
</head>

<body>
	<div class="container-fluid">
	<?php include_once("./top.php"); ?>
	<div class="row">
		<div class="col-sm-2">

		</div>
		<div class="col-sm-8">
			<?php
				$content_dir = opendir("./content");
				//agar koi search queary diya hai to
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
				}
				// nahi to articles ka list dikhao link ke sath 
				else{ 
					$i = 0;
					$_SESSION['file'] = array(); // yahan improve karna hai
					define("LIMIT" , 1024 , true);
					for($i=0 ; ($file  = readdir($content_dir) )&& $i<LIMIT ; $i++) {    //file_path nahi deta hai isiliye
						$_SESSION['file'][$i] = "./content/".$file; //pura file path  ke liye
						$filename = $_SESSION['file'][$i];
						// echo $_SESSION['file'][$i] ;
						if(is_dir($_SESSION['file'][$i] )) continue; //folder hai to chhod do aage badho
						// echo $file;

				//prepare karo question
						$quesOBJ = json_decode(file_get_contents( $_SESSION['file'][$i] ) );
						if($quesOBJ == NULL) rename($filename , "./dump/.$file");
						$question = $quesOBJ->question;
						$answer = $quesOBJ->answer;
				//display karo output		
						echo "<div class='card'><li><a href='./queryDisplay.php?q=$filename'>$question</a>";//don't put filename in links
						if($answer == "") {
							echo "&nbsp;&nbsp;&nbsp;<a href='editEntry.php?q=$filename'><span class=''><i>जवाब नहीं है</i></span></a>";
						}
						echo "</li></div>";

						// print_r ($f);
					}
				}
			?>
		</div>
		<div class="col-sm-2">

		</div>
	</div>
	</div>
	</body>
</html>