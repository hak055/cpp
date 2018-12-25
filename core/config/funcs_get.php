<?php

class Comment {

	public $on_page = 5;
	public $page;


function countRow(){
    global $pdo;

	$query = "SELECT * FROM comments";
	$res = mysqli_query($pdo, $query);
    $row_count = count(mysqli_fetch_all($res, MYSQLI_ASSOC));//количество строк в таблице
     return "$row_count";

}
/*
* метод выводит пагинацию страниц
*/
  function countPage(){

	$count = $this->countRow();
    


  $this->page = $page = isset($_GET["page"]) ? (int) $_GET["page"] : 1;

  $pages = ceil($count / $this->on_page);

  for ($i = 1; $i <= $pages; $i++) {
    // если текущая старница
    if($i == $page){
        echo " [$i] ";
    } else {
        echo "<a href='?page=$i'>$i</a> ";
    }
}


}
/*
* метод выводит коментарии постранично
*/
function getComment()
{
	global $pdo;
	$this->page = $page = isset($_GET["page"]) ? (int) $_GET["page"] : 1;
	$this->on_page = $on_page = 5;
    // (номер страницы - 1) * статей на страницу
     $limit_from = ($page - 1) * $on_page;

     $data = $pdo->query("SELECT * FROM comments LIMIT ".$limit_from.",".$on_page."")->fetch_all(MYSQLI_ASSOC);

     
	
	 return $data;
}


}