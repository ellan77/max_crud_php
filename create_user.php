<?php
// Include config file
require_once "config.php";
 
if (isset($_POST["username"])) {
    //Вставляем данные, подставляя их в запрос
    $sql = mysqli_query($link, "INSERT INTO `users` (`username`, `Password`) VALUES ('{$_POST['username']}', '{$_POST['password']}')");
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