<!DOCTYPE html>
<meta charset="UTF-8">

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

<?php include_once("./top.php")?>
<form method="POST" action="processEntry.php">
    <h2>यहां सवाल और जवाब दोनो एंट्री कीजिये</h2>
    <label for="question">सवाल</label><br />
    <input type="text" name="question" placeholder="सवाल"/><br /><br />
    <!-- <input type="text" placeholder="जवाब" /><br /> -->
    <label for="answer">जवाब</label><br />
    <textarea placeholder="जवाब" name="answer"></textarea><br /><br />
    <button type="submit" name="submit">हो गया</button><br /><br />
</form>