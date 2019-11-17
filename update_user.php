<?php
// Include config file
require_once "new_config.php";

if(!empty($_GET["id"])){
    
    // Get hidden input value
    
    $edit_username = $pdo->prepare("SELECT username, password FROM users WHERE id = ? ");
    $edit_username->execute([$_GET["id"]]);
    $edit_username = $edit_username->fetch(PDO::FETCH_OBJ);


}


if(!empty($_POST["username"]) && !empty($_POST["password"])){

    $update = $pdo->prepare("UPDATE users SET username = ?, password  = ? WHERE ID = ?");
    $state = $update->execute([$_POST['username'], $_POST['password'],  $_GET["id"]]);

    require_once "components/check_state.php";
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Редактирование пользователя</h2>

                    </div>
                    <p>Заполните поля для обновления информации пользователя</p>
                    <form method="post" action="">
                        <div class="form-group ">
                            <label>Новое имя пользователя</label>
                            <input type="text" name="username" class="form-control"
                                placeholder="<?php echo  $edit_username->username; ?>">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group ">
                            <label>Новый пароль</label>
                            <input type="text" name="password" class="form-control"
                                placeholder="<?php echo  $edit_username->password; ?>">
                            <span class="help-block"></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Редактировать">
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