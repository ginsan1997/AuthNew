<?php


session_start();


class RegisterUser {
    public $login = '';
    public $password = '';
    public $confirmPassword = '';
    public $email = '';
    public $name = '';


    public function getLogin($login) {
        return $this->$login = $login;
    }

    public function getPass($password) {
        return $this->$password = $password;
    }
    public function getConfirmPass($confirmPassword) {
        return $this->$confirmPassword = $confirmPassword;
    }
    public function getEmail($email) {
        return $this->$email = $email;
    }
    public function getName($name) {
        return $this->$name = $name;
    }
}

$errors = 0;
// Проверка на пустые поля:
if(($_POST['login']) === '') {
    $_SESSION['messageErrLoginEmpty'] .= '<div class="error"> Пустое поле*</div>';
    $errors++;
        }
if(($_POST['password']) === '') {
    $_SESSION['messageErrPasswordEmpty'] .= '<div class="error"> Пустое поле*</div>';
    $errors++;
        }
if(($_POST['email']) === '') {
    $_SESSION['messageErrEmailEmpty'] .= '<div class="error"> Пустое поле*</div>';
    $errors++;
    }
if(($_POST['name']) === '') {
     $_SESSION['messageErrNameEmpty'] .= '<div class="error"> Пустое поле*</div>';
     $errors++;
    }
if(($_POST['confirmPassword']) === '') {
    $_SESSION['messageErrPassConfwordEmpty'] .= '<div class="error"> Пустое поле*</div>';
    $errors++;
    }

    
// Проверка на пробелы 
$preg = '/^[a-z0-9.-]{6,16}$/isu';
$check = preg_match($preg, $_POST['password']);
if($_POST['password'] && !$check) {
    $errors++;
    $_SESSION['messageErrPass'] .= '<div class="error">Ошибка!В пароле содержаться недопустимые символы</div>';
}

$checkNamePreg = preg_match('/^[a-z]{6,16}$/isu', $_POST['name']);
if($_POST['name'] && !$checkNamePreg) {
    $errors++;
    $_SESSION['messageErrName'] .= '<div class="error">Ошибка!В имени содержаться недопустимые символы</div>';
}

    
if ( $_SERVER['HTTP_X_REQUESTED_WITH'] && $errors === 0 &&trim($_POST['login']) && trim($_POST['email']) && trim($_POST['name']) && trim($_POST['password'])){
   



$register = New RegisterUser;
$checkLogin = $register->getLogin(trim($_POST['login'])); //получаю логин
$checkLogin = str_replace(' ','',$checkLogin);
$checkPass = $register->getPass(trim($_POST['password'])); // получаю пароль
$checkConfPass = $register->getConfirmPass(trim($_POST['confirmPassword'])); // получаю повтор пароля
$checkEmail = $register->getEmail(trim($_POST['email'])); // получаю имеил
$checkName = $register->getName(trim($_POST['name'])); // получаю имя


 if(strlen(trim($checkLogin))<6 || $checkLogin === '' || empty($checkLogin)) {
    $_SESSION['messageErrLogin'] .= '<div class="error"> Логин должен состоять минимум из 6 символов</div>';
     $errors++;
     }


 if(!preg_match('/[A-z]/u', trim($checkPass)) || (strlen(trim($checkPass)) < 6) || !preg_match('/[0-9]/u', trim($checkPass))){
    $_SESSION['messageErrPass'] .= '<div class="error">Пароль должен состоять минимум из 6 символов и иметь 1 букву</div>';
     $errors++;
 }
 if (trim($checkConfPass) !== trim($checkPass)) {
    $_SESSION['messageErrConfPass'].= '<div class="error">Пароли не совпадают</div>';
     $errors++;
 }
 if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$checkEmail)) {
    $_SESSION['messageErrEmail'] .= '<div class="error">Проверьте правильность введенного email</div>';
     $errors++;
 }

 if ((strlen(trim($checkName))<2)){
    $_SESSION['messageErrName'] .= '<div class="error">Ошибка! Имя должно содержать более двух символов</div>';
     $errors++;
} 





for($i=0; $i<=strlen(trim($checkName)); $i++){
    if(is_numeric( $checkName[$i])){
        $_SESSION['messageErrName'] .= '<div class="error">Имя не может содержать цифру. Обнаружена как минимум одна цифра: '.$checkName[$i]. '</div>';
         $errors++;
         break;
    };
}


// Загрузка в файл JSON данные нового пользователя
    if(!file_get_contents('db.json')){
        $file = file_get_contents('db.json'); 
        $dataUser = json_decode($file,true); 
        $dataUser[] = array('login'=>'test', 'name'=>'test', 'password' =>'test', 'email' => 'test');
        file_put_contents('db.json',json_encode($dataUser));  // Перекодировать в формат и записать в файл.          
    } 
     if(file_get_contents('db.json')){ 
        $file = file_get_contents('db.json'); 
        $dataUser = json_decode($file,true);        // Декодируем в массив
        
        $foundUserData = 0;
        
        foreach ( $dataUser  as $key => $value){  
             
            if (in_array( $checkLogin, $value)) {  //Проверяю на соответствие логина или почты
                 $foundUserData = 1;
                $_SESSION['messageErrLogin'] .= '<div class="error">Пользователь с таким логином уже зарегистрирован</div>';
                } 

            if (in_array( $checkEmail, $value)) {  //Проверяю на соответствие логина или почты
                $foundUserData = 1;
                $_SESSION['messageErrEmail'] .= '<div class="error">Такой Email уже зарегистрирован</div>';
                } 

        }   
       
        if ($foundUserData === 0 && $errors ===0){
            $salt = "6hdlKje";
                $resultCheckPass = $salt.md5($checkPass);
                $dataUser[] = array('login'=>$checkLogin, 'name'=>$checkName, 'password' => $resultCheckPass, 'email' => $checkEmail);        // Представить новую переменную как элемент массива, в формате 'ключ'=>'имя переменной'
                file_put_contents('db.json',json_encode($dataUser));  // Перекодировать в формат и записать в файл.   
                $_SESSION['message'] .= "<div class='success'>Спасибо за регистрацию. </div>";
                $CheckAncwer = json_encode($file);
                echo $CheckAncwer;
                
        } 
    }
    


} 


       
    





