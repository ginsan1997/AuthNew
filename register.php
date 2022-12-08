<?php 
include 'registerCheck.php';
                
if (isset($_POST["register_btn"])) {
    echo 'Проверяем';
}

echo'
<div class="registerForm">
    <span class="reg_text">Регистрация</span>
    <form class="formReg" action="registerCheck.php" method="post">
        <input class="login" name="login" type="text" placeholder="Логин"> 
        '?> <?php if ($_SESSION['messageErrLogin']){
            echo $_SESSION['messageErrLogin'];
        }else if ($_SESSION['messageErrLoginEmpty']) {
            echo $_SESSION['messageErrLoginEmpty'];
        }
        unset($_SESSION['messageErrLoginEmpty']);
        unset($_SESSION['messageErrLogin']) ?>

        <?php echo 
        '<input class="password" name="password" type="password" placeholder="Пароль">  
        '?>

        <?php if ($_SESSION['messageErrPass']){
            echo $_SESSION['messageErrPass'];
        }else if ($_SESSION['messageErrPasswordEmpty']) {
            echo $_SESSION['messageErrPasswordEmpty'];
        }
        unset($_SESSION['messageErrPasswordEmpty']);
        unset($_SESSION['messageErrPass']);
         ?>


        <?php echo '  
        <input class="confirmPassword" name="confirmPassword" type="password" placeholder="Повторите пароль"> 
        ' ?> 
        <?php if ($_SESSION['messageErrConfPass']){
            echo $_SESSION['messageErrConfPass'];
        } else if ($_SESSION['messageErrPassConfwordEmpty']) {
            echo $_SESSION['messageErrPassConfwordEmpty'];
        }
        unset($_SESSION['messageErrPassConfwordEmpty']);
        unset($_SESSION['messageErrConfPass']) ?>
        <?php echo '
        <input class="email" name="email" type="text" placeholder="Почта"> '?>
        
        <?php if ($_SESSION['messageErrEmail']){
            echo $_SESSION['messageErrEmail'];
        }
        else if ($_SESSION['messageErrEmailEmpty']) {
            echo $_SESSION['messageErrEmailEmpty'];
        }
        unset($_SESSION['messageErrEmailEmpty']);
        unset($_SESSION['messageErrEmail']) ?>
        
        <?php echo '<input class="name" name="name" type="text" placeholder="Имя">    '?>
        <?php if ($_SESSION['messageErrName']){
            echo $_SESSION['messageErrName'];
        }else if ($_SESSION['messageErrNameEmpty']) {
            echo $_SESSION['messageErrNameEmpty'];
        }
        unset($_SESSION['messageErrNameEmpty']);
        unset($_SESSION['messageErrName']) ?>
        
      <?php echo ' <button class="submit_btn" type="submit" id="#register_btn" name="register_btn" >Зарегистрироваться</button>
    </form> ' ?>
        <?php if ($_SESSION['message']){
            echo $_SESSION['message'];
        }
        unset($_SESSION['message']) ?>

        <?php echo '
        <p>*Чтобы войти в CRUD, зарегистрируйтесь под логином: <br>Login: AdminKira</p>
        </div>';


?>
