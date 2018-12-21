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
	
	
	$query = "INSERT INTO comments (name, text) VALUES ('$name', '$msg')";
	mysqli_query($pdo, $query);
	unset($_POST);
	
	
}
function get_mess(){
	global $pdo;
	$query = "SELECT * FROM comments ORDER BY id DESC";
	$res = mysqli_query($pdo, $query);
	return mysqli_fetch_all($res, MYSQLI_ASSOC);
	
}


function print_arr($arr){
	echo '<pre>' . print_r($arr, true) . '</pre>';
}






