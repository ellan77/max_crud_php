<?php 

 //Если вставка прошла успешно
 if($state) {
    $errorstate =  '<p class="bg-success massage">Данные успешно добавлены в таблицу.</p>';
  } else {
    $err = $query->errorCode();
    $errorstate =  '<p class="bg-danger massage"p>Произошла ошибка: SQL ' . $err. '</p>';
  }