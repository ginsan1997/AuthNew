<?php session_start();



?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тестовое задание</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<noscript>
<meta http-equiv="refresh" content="0;url=nojs.php">
<style type="text/css">.mainBlock{display:none;}</style>
<span>Чтобы зарегистироваться, вам необходимо включить поддержку JavaScript в вашем браузере</span>
</noscript>


<script type="text/html">
 <style type="text/css">.mainBlock{display:flex;}</style>
</script>

<div class="mainBlock">
<?php
               
                if($_SESSION['name'] != '') {?>
                <div class="blockLK">
                    <?php echo '<div class="helloName">Hello, '.$_SESSION['name'].'</div>'?>
                        
                    <div class="divBtns"><a class="exitA" href="/exit.php"><div class="btn_exit">Выход</div></a>
                        <?php if ($_SESSION['login'] === 'AdminKira') {
                            echo '<a class="aCrud" href="/crud.php"><div class="CRUD_enter">Войти в CRUD</div></div></a>';
                        }?>
                </div><?php }
                ?>


    <?php  
            if(!$_SESSION['name']) :


                include 'register.php';
                include 'login.php';


    ?>
</div>


                <?php endif;?> 






<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="app.js"></script>
</body>
</html>
