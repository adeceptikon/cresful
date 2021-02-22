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

<div class="container" >
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
    <form method="POST" action="processEntry.php">
    <h2>यहां सवाल / जवाब अपने हिसाब से एडिट कीजीये</h2>

    <label for="question">सवाल (question) *</label><br />
    <textarea type="text" name="question"  id="question"><?php echo $question; ?></textarea><br /><br />
    <?php echo "<a href='deleteEntry.php?q=$received_file_index'>डिलीट</a><br /><br />" ?>

    <label for="context">विवरण (context) </label><br />
    <input type="text" name="context" value="<?php echo $context; ?>" /><br /><br />

    <label for="tags">फील्ड (tags) </label><br />
    <input type="text" name="tags" value="<?php echo $tags; ?> " /><br /><br />



    <label for="answer">जवाब(Answer) *</label><br />
    <textarea value="जवाब" name="answer" id="answer"><?php echo $answer; ?></textarea><br /><br />

    <label for="user">User * </label><br />
    <input  name="user"  value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?>" /><br /><br />

    <label for="location">पता * </label><br />
    <input  name="location" value="<?php echo $location; ?>" /><br /><br />


    
    <button type="submit" name="submit">हो गया</button><br /><br />
</form>


</div>
</body>