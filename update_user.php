<?php
// Include config file
require_once "config.php";

if(isset($_GET["id"]) && !empty($_GET["id"])){
    // Get hidden input value
    $id = $_GET["id"];
   
   
    
    $edit_username = mysqli_fetch_row(mysqli_query($link, "SELECT username FROM users WHERE id = $id "));
    $edit_pass = mysqli_fetch_row(mysqli_query($link, "SELECT password FROM users WHERE id = $id "));

    

 
}



if(isset($_POST["username"]) && !empty($_POST["password"])){
    $sql = mysqli_query($link, "UPDATE users SET username = '{$_POST['username']}', password  = '{$_POST['password']}' WHERE ID = $id");
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
                        <h2>Редактирование пользователя</h2>

                    </div>
                    <p>Заполните поля для обновления информации пользователя</p>
                    <form method="post" action="">
                        <div class="form-group ">
                            <label>New username</label>
                            <input type="text" name="username" class="form-control"
                                placeholder="<?php echo  $edit_username[0]; ?>">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group ">
                            <label>New password</label>
                            <input type="text" name="password" class="form-control"
                                placeholder="<?php echo  $edit_pass[0]; ?>">
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