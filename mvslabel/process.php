<html>

<h1>Here is your replacement MVS Label</h1>

<body>
	
<?php


$title = $_POST['title'];
$serial = $_POST['serial'];

$error = "<font color=red>You didn't enter an MVS cartridge Title.</font>";

echo "<img src=label.php>";
echo "<br>";

if ($title == "") {
    echo $error;
} else {
    $title=strtoupper($title);
    echo "<font size=10>$title</font>";
}


echo "<br>";

if ($serial == "") {
    // default to a sensible value
    // the one on the label will do for now hehe
    $serial = "004805";
}

echo "<font size=5>$serial</font>";
    
?>	


<br>
<br>
<a href="http://localhost/mvslabel/">Make another label</a>
		
</body>		
			
</html>		
		
