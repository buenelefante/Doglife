<?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "vovaslon@mail.ru";
    $to = "volium1987@mail.ru";
    $subject = "Вопрос с сайта Doglife";
    $message = "проверка связи";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "Сообщение отправлено";
?>