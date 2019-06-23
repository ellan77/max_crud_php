<?php
// Include config file
require_once "config.php";

if(isset($_GET["id"]) && !empty($_GET["id"])){
    // Get hidden input value
    $id = $_GET["id"];

    $text_mess = mysqli_fetch_row(mysqli_query($link, "SELECT message FROM messages WHERE id = $id "));
    $from_user = mysqli_fetch_row(mysqli_query($link, "SELECT user_id FROM messages WHERE id = $id "));
    $to_user = mysqli_fetch_row(mysqli_query($link, "SELECT to_user_id FROM messages WHERE id = $id "));

 
}

echo $from_user[0];

$res = mysqli_query($link, "SELECT id FROM users ");
$users_id = Array();

$i = 0;
while($row = mysqli_fetch_array($res)){
    $users_id[$i] = $row['id'];
    $i++;
}


if(isset($_POST["message"]) && !empty($_POST["user_id"]) && !empty($_POST["to_user_id"])){
    $sql = mysqli_query($link, "UPDATE messages SET message = '{$_POST['message']}', user_id  = {$_POST['user_id']}, to_user_id  = {$_POST['to_user_id']}  WHERE ID = $id");
    //Если вставка прошла успешно
    if ($sql) {
      $errorstate =  '<p class="bg-success massage">Данные успешно добавлены в таблицу.</p>';
    } else {
        $errorstate =  '<p class="bg-danger massage"p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }

        .massage {
            padding: 10px 20px 10px 20px;
        }
    </style>
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
                                placeholder="<?php echo $text_mess[0] ?>">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group ">
                            <label>Отправитель</label>
                            <select name="user_id" class="form-control">
                                <?php
                                foreach($users_id as $v){

                                    if ($from_user[0] == $v){
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
                                foreach($users_id as $v){
                                    if ($to_user[0] == $v){
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