<?php
// Include config file
require_once "config.php";
 
if (isset($_POST["message"])) {
    //Вставляем данные, подставляя их в запрос
    $sql = mysqli_query($link, "INSERT INTO `messages` (`user_id`, `to_user_id`, `message`) VALUES ({$_POST['user_id']}, {$_POST['to_user_id']}, '{$_POST['message']}')");
    //Если вставка прошла успешно
    if ($sql) {
        $errorstate =  '<p class="bg-success massage">Данные успешно добавлены в таблицу.</p>';
      } else {
          $errorstate =  '<p class="bg-danger massage"p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    $res = mysqli_query($link, "SELECT id FROM users ");
    $users_id = Array();
  
    $i = 0;
    while($row = mysqli_fetch_array($res)){
        $users_id[$i] = $row['id'];
        $i++;
    }

    
   
  
  

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
        .massage{ 
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
                        <h2>Новое сообщение</h2>
                    </div>
                    <p>Заполните все поля и нажмите "Отправить" для создания нового сообщения</p>
                    <form method="post" action="">
                        <div class="form-group ">
                            <label>Message</label>
                            <textarea type="text" name="message" class="form-control" > </textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group ">
                        <select name="user_id" class="form-control">
                            <?php
                                foreach($users_id as $v){
                                    echo '<option>' . $v . '</option>' ;
                                }
                            ?>
                        </select>
                        <br>
                        <select name="to_user_id" class="form-control">
                        <?php
                                foreach($users_id as $v){
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