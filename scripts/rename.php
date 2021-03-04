<?php 
$d = opendir('../content/');
while($file = readdir($d)){
	$file = '../content/'.$file;
		if(is_dir($file)) continue;
		else if (strpos($file , 'xml.xml')){
					
				$newName = substr($file , 0 , -4);
				rename($file , $newName);
				echo $file.' renamed to ' .$newName.'<br />';
		
		}
}
?>