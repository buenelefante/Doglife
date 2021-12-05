<?php
// Файлы phpmailer
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

// Переменные, которые отправляет пользователь
$dateIn = $_POST['in'];
$dateOut = $_POST['out'];
$age = $_POST['age'];
$weight = $_POST['weight'];
$sex = $_POST['sex'];
$scope = $_POST['scope'];
$health = $_POST['health'];

// Формирование самого письма
$title = "Бронирование проживания";
$body = "
<h2>Заявка на бронь</h2>
<b>Дата заезда:</b> $dateIn<br>
<b>Дата выезда:</b> $dateOut<br><br>
<b>Пол собаки:</b> $sex<br>
<b>Возраст собаки:</b> $age<br>
<b>Вес собаки:</b> $weight<br>
<b>Кастрация / Стерилизация:</b> $scope<br><br>
<b>Особенности:</b><br>$health
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    $mail->Host       = 'smtp.mail.ru'; // SMTP сервера вашей почты
    $mail->Username   = 'vovaslon'; // Логин на почте
    $mail->Password   = 'jYYt57uGjxtqGCSxfe4t'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('vovaslon@mail.ru', 'Имя отправителя'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('volium1987@mail.ru');  
    $mail->addAddress('northboss@gmail.com'); 
   
// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);