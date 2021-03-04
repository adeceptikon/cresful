<?php session_start();
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
<style>
    textarea{
        width: 100%;
        height:30rem;
    }
    #sawaal{
        height:3rem;
        border: 1px solid rgb(20 , 30 ,140);

        border-radius: 5pt;
    }
    #jawaab{
        border: 1px solid rgb(20 , 130 ,40);
        border-radius: 5pt;

    }
</style>
</head>

<body>

<div class="container-fluid" >
<?php include_once("./top.php");
    $received_file_index = $_GET['q']; //dangerous
    $filename = $_SESSION['file'][$received_file_index];
    // echo $filename;
    $f = simplexml_load_file( $filename);
    $question  = $f->question;
    $answer = $f->answer;
    $location = $f->location;
    $tags = $f->tags;
    $user = $f->user;
    $context = $f->context;
?>
    <form method="POST" action="processEntry.php?editable=1&q=<?php echo $received_file_index?>">
    <h2>यहां सवाल / जवाब अपने हिसाब से एडिट कीजीये</h2>

    <label for="question">सवाल (question) (non -mutable) </label><br />
    <textarea id="sawaal" type="text" name="question"  id="question"><?php echo $question; ?></textarea><br /><br />
    <?php echo "<a href='deleteEntry.php?q=$received_file_index'>डिलीट</a><br /><br />" ?>

    <label for="context">विवरण (context) </label><br />
    <input type="text" name="context" value="<?php echo $context; ?>" /><br /><br />

    <label for="tags">फील्ड (tags) </label><br />
    <input type="text" name="tags" value="<?php echo $tags; ?> " /><br /><br />



    <label for="answer">जवाब(Answer) *</label><br />
    <textarea id="jawaab" value="जवाब" name="answer" id="answer"><?php echo $answer; ?></textarea><br /><br />

    <label for="user">User * </label><br />
    <input  name="user"  value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?>" /><br /><br />

    <label for="location">पता * </label><br />
    <input  name="location" value="<?php echo $location; ?>" /><br /><br />


    
    <button type="submit" name="submit">हो गया</button><br /><br />
</form>


</div>
</body>