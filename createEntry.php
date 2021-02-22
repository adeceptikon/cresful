<?php session_start();
?>

<!DOCTYPE html>
<meta charset="UTF-8">

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

<?php include_once("./top.php")?>

<?php if(TRUE) {
    if(isset($_SESSION['username']) ){
        $usr = $_SESSION['username'];
    }
    else $usr = "";
echo  '<form method="POST" action="processEntry.php">
    <h2>यहां सवाल  और जवाब दोनो एंट्री कीजिये</h2>

    <label for="question">सवाल (question) *</label><br />
    <textarea type="text" name="question" placeholder="सवाल" id="question"></textarea><br /><br />

    <label for="context">विवरण (context) </label><br />
    <input type="text" name="context" placeholder="विवरण"/><br /><br />

    <label for="tags">फील्ड (tags) </label><br />
    <input type="text" name="tags" placeholder="फील्ड "/><br /><br />



    <!-- <input type="text" placeholder="जवाब" /><br /> -->
    <label for="answer">जवाब(Answer) *</label><br />
    <textarea placeholder="जवाब" name="answer" id="answer"></textarea><br /><br />

    <label for="user">User * </label><br />
    <input placeholder="user" name="user"  value="'.$usr.'" /><br /><br />

    <label for="location">पता * </label><br />
    <input placeholder="user" name="location"  /><br /><br />


    
    <button type="submit" name="submit">हो गया</button><br /><br />
</form>

<hr />';

}
    else echo 'please login with a username first';
?>
</div>
</body>