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
                    
                    ?>
                </div>
            </div>