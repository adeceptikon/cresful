<?php 
    $d = opendir("../content/");
    while($file = readdir( $d) ){
        if(strpos($file , '.xml')){
            echo $file;
            $filename = '../content/'.$file;
            $f = simplexml_load_file($filename);
            $entry = array();
            $entry['question'] = $f->question;
            $entry['answer']  =  $f->answer;
            $entry['user'] = $f->user;
            $entry['date']  = $f->date;
            $entry['location'] = $f->location;
            $entry['tags'] = null;
            $entry['context'] = null;
            $entry['unixtime'] = localtime();
            unlink($filename);echo "$filename deleted<br />";//delete the xml file

            $str =""; //json object ke liye key
                foreach($entry as $key => $value ){
                    $str .='"'. $key.'" : "'.$value.'",';
                }
                $str = '{'.$str.'"end":"true"}';


                $filename = str_replace('.xml' , '.yaml' , $filename);
                echo "New File ".$filename;
                $newFile = fopen($filename , "w+");
                fwrite($newFile , $str);
                echo "$filename written<br />";
                fclose($newFile);

        }
    }
?>