<?php 
class CRUD {
    public $login = '';
    public $password = '';
    public $email = '';
    public $name = '';

    public function getLogin($login) {
        return $this->$login = $login;
    }
    public function getPass($password) {
        return $this->$password = $password;
    }
    public function getEmail($email) {
        return $this->$email = $email;
    }
    public function getName($name) {
        return $this->$name = $name;
    }
}


$CRUD = new CRUD;
$login =  $CRUD->getLogin(htmlspecialchars($_POST['login']));
$password =  $CRUD->getPass(htmlspecialchars($_POST['password']));
$email = $CRUD->getEmail(htmlspecialchars($_POST['email']));
$name =  $CRUD->getName(htmlspecialchars($_POST['name']));

$login = trim($login);
$salt = "6hdlKje";
$password = trim($password);
$email = trim($email);
$name = trim($name);

$jsonArray = [];

//Читаем db.json

if(file_exists('db.json')){
    $json = file_get_contents('db.json');
    $jsonArray = json_decode($json,true);
}

//Запись в файл
if($name && $login && $password && $email){
    $jsonArray[] = array('login'=>$login, 'name'=>$name, 'password' => $salt.md5($password), 'email' => $email); 
    file_put_contents('db.json', json_encode($jsonArray, JSON_FORCE_OBJECT));
    header('Location:'.$_SERVER['HTTP_REFERER']);
}

$key = $_POST['key'];
if (isset($_POST['save'])){
    $jsonArray[$key] = $_POST['users'];
}

//edit
$key = $_POST['key'];
if(isset($_POST['save'])){
    $jsonArray[$key] = array('login'=>$_POST['loginNew'], 'password'=>$salt.md5($_POST['passwordNew']), 'name' => $_POST['nameNew'], 'email' => $_POST['emailNew']); 
    file_put_contents('db.json', json_encode($jsonArray, JSON_FORCE_OBJECT));
    header('Location:'.$_SERVER['HTTP_REFERER']);
}

//delete

if(isset($_POST['del'])){

    unset($jsonArray[$key]);
    file_put_contents('db.json', json_encode($jsonArray, JSON_FORCE_OBJECT));
    header('Location:'.$_SERVER['HTTP_REFERER']);
}