<?php

// Include config file
require_once "new_config.php";

if (!empty($_POST["username"]) && !empty($_POST["password"])) {

    //Вставляем данные, подставляя их в запрос
    $sql = 'INSERT INTO users(username, password) VALUES (:username, :password)';
    $query = $pdo->prepare($sql);
    $state =  $query->execute(['username' => $_POST['username'], 'password' => $_POST['password']]);

    //Если вставка прошла успешно
    if ($state) {
        $errorstate =  '<p class="bg-success massage">Данные успешно добавлены в таблицу.</p>';
      } else {
        $err = $query->errorCode();
        $errorstate =  '<p class="bg-danger massage"p>Произошла ошибка: SQL' . $err. '</p>';
      }
    }

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Создать пользователя</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css" />
        
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Создать пользователя</h2>
                    </div>
                    <p>Заполните все поля и нажмите "Cоздать" для создания нового пользователя</p>
                    <form method="post" action="">
                        <div class="form-group ">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group ">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control">
                            <span class="help-block"><?php echo $password_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Создать">
                        <a href="index.php" class="btn btn-default">На главную</a>

                    </form>
                    <br>
                    <?php echo $errorstate ?>

                </div>
            </div>
        </div>
    </div>
</body>

</html>