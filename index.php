<?php 
    // Include config file
    require_once "new_config.php";
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Админ панель</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper {
            width: 650px;
            margin: 0 auto;
        }

        .page-header h2 {
            margin-top: 0;
        }

        table tr td:last-child a {
            margin-right: 15px;
        }

        .control {
            background: #000;
            color: #fff;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">

        
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Таблица пользователей</h2>
                        <a href="create_user.php" class="btn btn-success pull-right">Создать пользователя</a>
                    </div>

                    <?php

                    $query = $pdo->query('SELECT * FROM `users`');

                    if ($query->rowCount()>0){

                    echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Username</th>";
                                        echo "<th>Passowd</th>";
                                        echo "<th>Created</th>";
                                        echo "<th class='control'>CONTROL</th>";

                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $query->fetch(PDO::FETCH_OBJ)){
                                    echo "<tr>";
                                        echo "<td>" . $row->id . "</td>";
                                        echo "<td>" . $row->username . "</td>";
                                        echo "<td>" . $row->password . "</td>";
                                        echo "<td>" . $row->create . "</td>";
                                        echo "<td>";
                                            echo "<a href='update_user.php?id=". $row->id ."' title='Обновить информацию' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete_user.php?id=". $row->id ."' title='Удалить пользователя' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                        }else{
                            echo "<p class='lead'><em>Нет записей в базе</em></p>";
                        }
                    ?>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Таблица сообщений</h2>
                        <a href="create_message.php" class="btn btn-success pull-right">Новое сообщение</a>
                    </div>
                   
                    <?php

                    // Attempt select query execution
                    $query = $pdo->query('SELECT * FROM `messages`');

                    if($query->rowCount()>0){

                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>От пользователя</th>";
                                        echo "<th>Пользователю</th>";
                                        echo "<th>Сообщение</th>";
                                        echo "<th>Дата отправки</th>";
                                        echo "<th class='control'>CONTROL</th>";

                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $query->fetch(PDO::FETCH_OBJ)){
                                    echo "<tr>";
                                        echo "<td>" . $row->id . "</td>";
                                        echo "<td>" . $row->user_id . "</td>";
                                        echo "<td>" . $row->to_user_id . "</td>";
                                        echo "<td>" . $row->message . "</td>";
                                        echo "<td>" . $row->created . "</td>";
                                        echo "<td>";
                                            echo "<a href='update_message.php?id=". $row->id ."' title='Редактировать сообщение' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete_message.php?id=". $row->id ."' title='Удалить сообщение' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                           
                        } else{
                            echo "<p class='lead'><em>Нет записей в базе</em></p>";
                        }
                    
 
                    // Close connection
                    $pdo = null;
                    ?>
                </div>
            </div>

        </div>
    </div>
</body>

</html>