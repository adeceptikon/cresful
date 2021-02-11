<!DOCTYPE html>
<meta charset="UTF-8" >
<head>
<style>
        textarea{
            min-height: 300px;
            width: 90%;
            outline: none;
            
        }
        input{
            width: :90%;
        }
    </style>

</head>

<body>

<?php include_once("./top.php");
    $filename = $_GET['q'];
    // echo $filename;
    $f = fopen( $filename, "r");
   $question = fgets($f);
//    echo $question;
//    $question = substr($question , 20);
   $body  = file_get_contents($filename);
   
   fclose($f);
?>
    <form method="POST" action="processEntry.php">
    <h2>यहां सवाल / जवाब अपने हिसाब से एडिट कीजीये</h2>
    <label for="question">सवाल</label><br />
    <input type="text" name="question" placeholder="सवाल" value="<?php echo htmlspecialchars($question);?>"/>
    <?php echo "<a href='deleteEntry.php?q=$filename'>सवाल डिलीट कर दें</a><br /><br />" ?>
    <!-- <input type="text" placeholder="जवाब" /><br /> -->
    <label for="answer">जवाब</label><br />
    <textarea placeholder="जवाब" name="answer" ><?php echo  htmlspecialchars($body);?></textarea><br /><br />
    <button type="submit" name="submit">हो गया</button><br /><br />
</form>

</body>