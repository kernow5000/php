<HTML>
<BODY>  
	        
	<h1>Edit Wiki entry</h1>
        
	<form method="POST" action="saveEntry.php">

        Please make alterations to your wiki post<br>
	
	<?php
	include "db-utils.php";
        $id = $_GET['id'];
        //echo "editing $id<br>";
        
        // now I need to query based on id, then pull out wikibody to edit, timestamp not needed
	// as its not going to change, being an edit.
	db_connect("localhost","web","skunky","wiki");
        $sql="select wikiText from entry where id=$id";
        $result=db_query($sql);
        db_close();

        $row = mysql_fetch_row($result);
        // did we get data? seems so else there would be an error!
	$wikiText=$row[0];
        // sigh, regexp to get the html out?
	$wikiText = htmlspecialchars($wikiText,ENT_QUOTES);
        //$wikiText = nl2br($wikiText);
        // sigh , with changing newlines to br's , it adds more stuff
	// make sure they dont edit the textarea data to 0 bytes, looks messy	
	?>

        <textarea name="wikibody" rows="14" cols="80" wrap="virtual"><? echo $wikiText; ?></textarea>
        <?php
	echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
        ?>
        <br><br>                
	<input type="submit" value="Save" name="Save">
	
	</form>

	<a href=index.php>Back to main index page.</a>	

</BODY>
</HTML>
