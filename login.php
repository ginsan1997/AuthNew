
<?php 
include 'loginCheck.php';
echo '


<div class="loginForm">
<span class="log_text">Вход</span>
    <form class="formLog" action="loginCheck.php" method="post">
        <input class="login" name="login" type="text" placeholder="login">' ?>

        <?php if ($_SESSION['messageErrLoginEmptyLogin']) {
            echo $_SESSION['messageErrLoginEmptyLogin'];
        }
        unset($_SESSION['messageErrLoginEmptyLogin']);
         ?>


        <?php echo '<input class="password" name="password" type="password" placeholder="password">  
'?>

<?php 
if ($_SESSION['messageErrPasswordEmptyLogin']) {
    echo $_SESSION['messageErrPasswordEmptyLogin'];
}
unset($_SESSION['messageErrPasswordEmptyLogin']);
?>


      <?php echo ' <button class="submit_btn" type="submit" id="login_btn" name="login_btn" >login</button>
    </form>' ?>
    <?php if ($_SESSION['messageLoginSucces'] ){
    echo $_SESSION['messageLoginSucces'] ;
} else if ($_SESSION['messageLoginValid']){
    echo $_SESSION['messageLoginValid'];
}
unset($_SESSION['messageLoginValid'] );
unset($_SESSION['messageLoginSucces'] )


?>
<?php 'echo 

</div>'; 

//Проверка на куки
//print_r($_COOKIE);
?>

