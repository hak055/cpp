<?php
function clear(){
	global $pdo;
	foreach ($_POST as $key => $value) {
		$_POST[$key] = mysqli_real_escape_string($pdo, $value);
		
	}
}

function save_mess(){
	global $pdo;
	clear();
	extract($_POST);
	
	
	$query = "INSERT INTO comments (name, msg) VALUES ('$name', '$msg')";
	mysqli_query($pdo, $query);
	unset($_POST);
	
}