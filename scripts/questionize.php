<?php
$d = opendir('../content/');
$f = fopen('../questions.txt' , 'w+');

while($file  = readdir($d)){
	$file = '../content/'.$file;
	if(is_dir($file)){ continue;}
	else{
		$x = simplexml_load_file($file);
		$s = $x->question."\r\n";
		fputs($f , $s);
	}
}
fclose($f);
$content = file_get_contents('../questions.txt');
echo $content;

?>