<?php session_start();
?>
<!DOCTYPE html>
<meta charset="UTF-8" >
<head>
<style>
        textarea{
            min-height: 300px;
            width: 90%;
            outline: none;
            
        }
        }#answer{
            min-height: 300px;
            width: 90%;
            outline: none;
            
        }
        #question{
            min-height: 100px;
            width: 80%;
            outline: none;
            
        }
        input{
           width: 90%;
        }
        #search{
            width: 50%;
        }
    </style>

</head>

<body>

<?php include_once("./top.php");
    $filename = $_GET['q'];
    // echo $filename;
    $f = simplexml_load_file( $filename);
    $question  = $f->question;
    $answer = $f->answer;
    $location = $f->location;
    $tags = $f->tags;
    $user = $f->user;
    $context = $f->context;
?>
    <form method="POST" action="processEntry.php">
    <h2>यहां सवाल / जवाब अपने हिसाब से एडिट कीजीये</h2>

    <label for="question">सवाल (question) *</label><br />
    <textarea type="text" name="question"  id="question"><?php echo $question; ?></textarea><br /><br />
    <?php echo "<a href='deleteEntry.php?q=$filename'><button>डिलीट</button></a><br /><br />" ?>

    <label for="context">विवरण (context) </label><br />
    <input type="text" name="context" value="<?php echo $context; ?>" /><br /><br />

    <label for="tags">फील्ड (tags) </label><br />
    <input type="text" name="tags" value="<?php echo $tags; ?> " /><br /><br />



    <label for="answer">जवाब(Answer) *</label><br />
    <textarea value="जवाब" name="answer" id="answer"><?php echo $answer; ?></textarea><br /><br />

    <label for="user">User * </label><br />
    <input  name="user"  value="<?php echo $_SESSION['username']; ?>" /><br /><br />

    <label for="location">पता * </label><br />
    <input  name="location" value="<?php echo $location; ?>" /><br /><br />


    
    <button type="submit" name="submit">हो गया</button><br /><br />
</form>


</body>