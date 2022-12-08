<?php include 'CRUDfunc.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD DB JSON</title>
    <link rel="stylesheet" href="CRUD.css">
</head>
<body>
<div class="mainBlock">
    <div class="switchBlock">
<div class="CRUD_Hello">
    <span class="TextCRUD_LK">CRUD</span>
<?php if ($_SESSION['login'] === 'AdminKira') {
     if($_SESSION['name'] != '') {?><div class="TextHelloCRUD">Hello, <?php echo $_SESSION['name']?> </div> <a class="exitA" href="/exit.php"><div class="btn_exit">Выйти</div></a><?php }

     ?>
</div>

     

   

    

    <table class="table">
        <thead class="table-dart">
        <tr>
            <th style="width: 5%">№</th>
            <th>Логин</th>
            <th>Пароль</th>
            <th>Почта</th>
            <th>Имя</th>
        </tr>

        <tbody>
            <?php foreach($jsonArray as $key =>$value): ?>
                <tr>

            <th><?php echo (int)$key +1 ;?></th>
            <td bgcolor="#D3EDF6"><?php echo $value['login'] ;?></td>
            <td  bgcolor="#D3EDF6" ><?php echo $value['password'] ;?></td>
            <td  bgcolor="#D3EDF6" ><?php echo $value['email'] ;?></td>
            <td  bgcolor="#D3EDF6" > <?php echo $value['name'] ;?></td>
            <!-- Редактировать -->
            <td>
            <button   class="justEdit"> Изменить</button>  
            <div class="edit_Block" id="edit<?php echo $key;?>"> 
                
            <span class="EditCRUDText">Изменить данные</span>
                <form class="formEdit" action="" method="post">
                <input type="text" value="<?php echo $value['login'] ;?>" name = "loginNew" placeholder="Логин">
                <input type="text" value="<?php echo $value['password'] ;?>" name="passwordNew" placeholder=" Пароль">
                <input type="text" value="<?php echo $value['email'] ;?>" name="emailNew" placeholder="Email">
                <input type="text" value="<?php echo $value['name'] ;?>" name="nameNew" placeholder="Имя">
                    <input type="hidden" value="<?php echo $key;?>" name="key">
                    <button type="submit" name="save" class="saveCRUD"> Сохранить</button>
                </form>
            </div>
            <!-- удалить -->
               
                
            <div class="deleteBlock" id="delete<?php echo $key;?>">

                <form action="" method="post">
                <input type="hidden" value="<?php echo $key;?>" name="key">
                
                <button  name="del" class="deleteCRUD"> Удалить</button>
                </form>
                </div>
        </td>

       
    
            








            
            </td>
        </tr>





            <?php endforeach; ?>

            
        </tbody>
       
        </thead>
    </table>  
    
    </div> 

    <div class="add_user">
        <span class="addUserText">Добавить пользователя</span>
        <form class="formAddUserCrud" action="" method="post">
            <div class="inputCRUD">
                <input type="text" name="login" placeholder="Логин">
                <input type="text" name="password" placeholder="Пароль">
                <input type="text" name="email" placeholder="Почта">
                <input type="text" name="name" placeholder="Имя">
                <button type="submit" class="addCrud"> Добавить пользователя</button>
            </div>

        </form>
    </div>

    
    <?php } else { header('Location: /'); }?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="CRUD.js"></script>
</body>
</html>