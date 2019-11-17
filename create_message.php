<?php
// Include config file
require_once "new_config.php";
 
if (!empty($_POST["message"])) {
    //Вставляем данные, подставляя их в запрос
    $sql = "INSERT INTO `messages` (`user_id`, `to_user_id`, `message`) VALUES (:user_id, :to_user_id, :message)";
    $query = $pdo->prepare($sql);
    $state = $query->execute(['user_id' => $_POST['user_id'], 'to_user_id' => $_POST['to_user_id'], 'message' => $_POST['message']]);
    
    //Если вставка прошла успешно
    if($state) {
        $errorstate =  '<p class="bg-success massage">Данные успешно добавлены в таблицу.</p>';
      } else {
        $err = $query->errorCode();
        $errorstate =  '<p class="bg-danger massage"p>Произошла ошибка: SQL ' . $err. '</p>';
      }
    }

    $users_array = $pdo->prepare("SELECT id FROM users ");
    $users_array->execute();
    $result_users_array = $users_array->fetchAll(PDO::FETCH_COLUMN);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Создать сообщение</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Новое сообщение</h2>
                    </div>
                    <p>Заполните все поля и нажмите "Отправить" для создания нового сообщения</p>
                    <form method="post" action="">
                        <div class="form-group ">
                            <label>Сообщение</label>
                            <input type="text" name="message" class="form-control">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group ">
                            <label>Отправитель</label>
                            <select name="user_id" class="form-control">
                                <?php
                                foreach($result_users_array as $v){
                                    echo '<option>' . $v . '</option>' ;
                                }
                            ?>
                            </select>
                            <br>
                            <label>Получатель</label>
                            <select name="to_user_id" class="form-control">
                                <?php
                                foreach($result_users_array as $v){
                                    echo '<option>' . $v . '</option>' ;
                                }
                            ?>
                            </select>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Отправить">
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