<?php
// Include config file
require_once "new_config.php";

if(!empty($_GET["id"])){
    
    // Get hidden input value


    $edit_message = $pdo->prepare("SELECT message, user_id, to_user_id FROM messages WHERE id = ? ");
    $edit_message->execute([$_GET["id"]]);
    $edit_message = $edit_message->fetch(PDO::FETCH_OBJ);

 
}

$user_id_array = $pdo->query('SELECT id FROM users');
$user_id_array->execute();
$user_id_array = $user_id_array->fetchAll(PDO::FETCH_COLUMN);;
// print_r($user_id_array);

if(isset($_POST["message"]) && !empty($_POST["user_id"]) && !empty($_POST["to_user_id"])){
    $sql = "UPDATE messages SET message = ?, user_id  = ?, to_user_id  = ?  WHERE ID = ?";
    $update = $pdo->prepare($sql);
    $state = $update->execute([$_POST['message'], $_POST['user_id'], $_POST['to_user_id'], $_GET["id"] ]);

    
   require_once "components/check_state.php";
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Редактирование сообщения</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Редактирование сообщения</h2>
                    </div>
                    <p>Заполните поля для обновления сообщения</p>
                    <form method="post" action="">
                        <div class="form-group ">
                            <label>Сообщение</label>
                            <input type="text" name="message" class="form-control"
                                placeholder="<?php echo $edit_message->message ?>">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group ">
                            <label>Отправитель</label>
                            <select name="user_id" class="form-control">
                                <?php
                                foreach($user_id_array as $v){

                                    if ($edit_message->user_id == $v){
                                        echo '<option selected>' . $v . '</option>' ;
                                    }else{
                                        echo '<option>' . $v . '</option>' ;
                                    }
                                    
                                }
                            ?>
                            </select>
                            <br>
                            <label>Получатель</label>
                            <select name="to_user_id" class="form-control">
                                <?php
                                foreach($user_id_array as $v){
                                    if ($edit_message->to_user_id == $v){
                                        echo '<option selected>' . $v . '</option>' ;
                                    }else{
                                        echo '<option>' . $v . '</option>' ;
                                    }
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