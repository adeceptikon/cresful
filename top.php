<div id="top" >
    <div >
<a href="./index.php"><h2>लूपर.in</h2></a>
<!-- <p> लूपर में आपका स्वागत है । </p> -->
    </div>

    <div  >
        <form method="post" action="./index.php">
             <input id="search" type="search" name="search_query" /><button type="submit" name="search_query">खोजो</button>        
        </form>
    </div>
<div id="account" >
    <a href="./index.php">मेन पेज</a>&nbsp;
<a href="createEntry.php"><b style="font-size: 1.5em;">नया सवाल+</b> </a>&nbsp;
    <a href="request.php">रिक़ुएस्ट डालें</a>&nbsp;
    <a href="offers.php">ऑफर</a>&nbsp;
    

    <?php 
    if(isset($_POST['submitUsername']) && !empty($_POST['username']) ) { 
        $_SESSION['username'] = $_POST['username'];
        //time log karne ke liye 
        if(is_dir("./users/".$_SESSION['username'])){
            $f = fopen("./users/".$_SESSION['username'].'/'.$_SESSION['username'].".log"  , "a+");
                $log = 'Access_time : '.date("d-m-Y" , time() ).',';
                fwrite($f , $log);
                fclose($f);
        }
        else {
            //user nahi hai to banane ke liye 
            mkdir("./users/".$_SESSION['username']);
            $f = fopen("./users/".$_SESSION['username'].'/'.$_SESSION['username'].".log" , "w+");
                $log = 'Access_time : '.date("d-m-Y", time() ).',';
                fwrite($f , $log);
                fclose($f);
        }
    }
        if( isset($_SESSION['username']) ) {
        $usr = $_SESSION['username'];
        echo "<a href='account.php'>नमस्ते , $usr</a>&nbsp;&nbsp;";
        echo "<a href='./logout.php'>लौग आउट</a>";
    }
    else {
        echo "<form action='./index.php' method='POST'>
            <label for='usr'>Username</label>
            <input type='text' name='username' />
            <button type='submit' name='submitUsername'>लौग इन</button>
            </form>
                ";
    }
    ?>
    
        <ul>
            <!-- <li><a href=""></a></li> -->
        </ul>
</div>
<hr />
</div>