<?php session_start();
?>

<!DOCTYPE html>
<meta charset="UTF-8">

<head>
    <style>
        #answer{
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

<?php include_once("./top.php")?>

<?php if(TRUE) {
$form = '<form method="POST" action="processEntry.php">
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
    <input placeholder="user" name="user"  /><br /><br />

    <label for="location">पता * </label><br />
    <input placeholder="user" name="location"  /><br /><br />


    
    <button type="submit" name="submit">हो गया</button><br /><br />
</form>

<hr />';

echo $form ;
}
    else echo 'please login with a username first';
?>
</body>