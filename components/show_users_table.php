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