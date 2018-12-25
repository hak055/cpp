<?php

header("Content-type: text/html; charset=utf-8");
error_reporting(-1);

require_once 'core/bootstrap.php';
//require_once 'view.php';

    $listComment = new Comment;
    $listComment->getComment();
    $messages = $listComment->getComment();


if(!empty($_POST)){
    save_mess();

  
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    
    <link rel="stylesheet" href="core/css/main.css">
    <link rel="stylesheet" href="core/css/normalize.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Комментарии</title>
</head>
<body>

<div class="wrapper">

    

    <div class="container1">

	       <div class="getComment">

                <?php if(!empty($messages)) :?>
                    <?php foreach ($messages as $message) :?>
                       <div class="card-header">
                           <?=$message['name'];?>
                           <p class="card-text"><?=$message['msg'];?></p>
                        </div>                  
                    <?php endforeach;?>
                <?php endif; ?>		        
	       </div>
		   <div class="page_number">
		         <?php 

                   $numberPage = new Comment;
                   $numberPage->countPage();

                  ?>
		   </div>       
    </div>

        <div class="form_block">
            <p class="comment">Оставить комментарий</p><br>
            
            <form action="index.php" method="post">
                <p>Имя:</p>
                <p><input name="name" required placeholder="Ваше имя"></p>
                <p>Ваше сообщение:</p>
                <p><textarea name="msg" required placeholder="Поле для Вашего сообщения" rows="5" cols="60"></textarea></p>
                <p><input type="submit" name=""></p>
            </form>
        </div>

</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>