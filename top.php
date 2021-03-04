
<div class="row bg-warning text-white "  >
	<div id="top" class="col">
		<a class="text-success lead" href="./index.php"><h2>लूपर.in</h2></a>
		<!-- <p> लूपर में आपका स्वागत है । </p> -->
	</div>


	<div class="col " id="searchBar" >
		<form method="GET" action="./index.php">
			 <input id="search" type="search" name="search_q" />
			 <button type="submit" name="search_button">खोजो</button>        
		</form>
	</div>
</div>
	
	
<div id="account" class="row bg-warning text-dark">
	<div class="col-sm-8" >

		<a class="text-secondary" href="./index.php">मेन पेज</a>&nbsp;
		<a class="text-secondary" href="createEntry.php"><b style="font-size: 1.5em;">नया सवाल+</b> </a>&nbsp;
		<a class="text-secondary" href="request.php">रिक़ुएस्ट</a>&nbsp;
		<a class="text-secondary" href="offers.php">ऑफर</a>&nbsp;
	</div>

    
<div class="col-sm-4" >

    <?php 
//agar login info daala hai to
if(isset($_POST['submitUsername']) ) {
	
		if(!empty($_POST['username']) ) { 
			$_SESSION['username'] = $_POST['username'];
			//agar pehle se hi user hai to Access time record kar lo	
			if(is_dir("./users/".$_SESSION['username'])){
				$f = fopen("./users/".$_SESSION['username'].'/'.$_SESSION['username'].".log"  , "a+");
					$log = 'Access_time : '.date("d-m-Y" , time() ).',';
					fwrite($f , $log);
					fclose($f);
			}
			//user nahi hai to banane ke liye naya user register kar lo
			else {
				mkdir("./users/".$_SESSION['username']);
				$f = fopen("./users/".$_SESSION['username'].'/'.$_SESSION['username'].".log" , "w+");
					$log = 'Access_time : '.date("d-m-Y", time() ).',';
					fwrite($f , $log);
					fclose($f);
			}
		}
}


//agar login hai to 
        if( isset($_SESSION['username']) ) {
        $usr = $_SESSION['username'];
        echo "<a href='account.php'>नमस्ते , $usr</a>&nbsp;&nbsp;";
        echo "<a href='./logout.php'>लौग आउट</a>";
    }
//nahi to registration form dikhao
    else {
        echo "<form action='./index.php' method='POST'>
            <label for='usr'></label>
            <input type='text' placeholder='नाम' name='username' />
            <button type='submit' name='submitUsername'>लौग इन</button>
            </form>
                ";
    }
    ?>
    
</div>
   
</div>
<hr />
