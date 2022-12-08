<?php
session_start();

class loginUser {
    public $login = '';
    public $password = '';

    public function getLogin($login) {
        return $this->$login = $login;
    }

    public function getPass($password) {
        return $this->$password = $password;
    }
}

if(($_POST['login']) === '') {
    $_SESSION['messageErrLoginEmptyLogin'] .= '<div class="error"> Пустое поле*</div>';
    $errors++;
        }
if(($_POST['password']) === '') {
    $_SESSION['messageErrPasswordEmptyLogin'] .= '<div class="error"> Пустое поле*</div>';
    $errors++;
        }


if ($_SERVER['HTTP_X_REQUESTED_WITH'] && trim($_POST['login']) && trim($_POST['password'])){



$login = New loginUser;
 $checkLogin = $login->getLogin($_POST['login']); //получаю логин
$checkPass = $login->getPass($_POST['password']); // получаю пароль

    $salt = "6hdlKje";
    $resultCheckPass = $salt.md5($checkPass);

    $loginValid = 0;
    $passValid = 0;
    if(file_get_contents('db.json')){ 
        $file = file_get_contents('db.json'); 
        $dataUser = json_decode($file,true);  
        for($i=0; $i<= sizeof($dataUser); $i++){
// Проверяю логин и пароль на соответствие с базой
            if (($checkLogin === $dataUser[$i]['login'])&& $resultCheckPass === $dataUser[$i]['password']){
                $loginValid = 1;
                $passValid = 1;
                $userName = $dataUser[$i]['name'];
                $loginUser = $_POST['login'];
                $_SESSION['login'] = $loginUser;
                $_SESSION['name'] = $userName;
                setcookie("name", "$userName", time()+ 60,'/'); // expires after 60 seconds
                
                $_SESSION['messageLoginSucces'] .= ", Вы успешно вошли в систему.";
                $CheckAncwer = json_encode($file);
                echo $CheckAncwer;
                break;
            } 
                
          }
        }   else {

            if ($loginValid === 0 || $passValid === 0){
                $_SESSION['messageLoginValid']  = '<div class="error">Неверный логин или пароль</div>';

            }



    }


}


       






