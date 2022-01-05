<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';


$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'PHPMailer/language/');
$mail->isHTML(true);

$mail->setFrom('northwindspb@yahoo.com'); 
$mail->addAddress('northboss@gmail.com');
$mail->Subject = 'Бронирование проживания в гостинице';

$body = '<h1>Хочу забронировать проживание:</h1>';

$sex = 'Кобель';
if($_POST['sex'] == 'bitch'){
    $sex = 'Сука';
}

$scope = 'Нет';
if($_POST['scope'] == 'yes'){
    $scope = 'Да';
}

if(trim(!empty($_POST['in']))){
    $body.='<p><strong>Прибытие:</strong> '.$_POST['in'].'</p>';
}
if(trim(!empty($_POST['out']))){
    $body.='<p><strong>Убытие:</strong> '.$_POST['out'].'</p>';
}
if(trim(!empty($_POST['age']))){
    $body.='<p><strong>Возраст:</strong> '.$_POST['age'].'</p>';
}
if(trim(!empty($_POST['weight']))){
    $body.='<p><strong>Вес:</strong> '.$_POST['weight'].'</p>';
}
if(trim(!empty($_POST['sex']))){
    $body.='<p><strong>Пол:</strong> '.$sex.'</p>';
}
if(trim(!empty($_POST['scope']))){
    $body.='<p><strong>Стерилизация:</strong> '.$scope.'</p>';
}
if(trim(!empty($_POST['health']))){
    $body.='<p><strong>Особенности:</strong> '.$_POST['health'].'</p>';
}
if(trim(!empty($_POST['name']))){
    $body.='<p><strong>Имя клиента:</strong> '.$_POST['name'].'</p>';
}
if(trim(!empty($_POST['email']))){
    $body.='<p><strong>Еmail клиента:</strong> '.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['phone']))){
    $body.='<p><strong>Телефон клиента:</strong> '.$_POST['phone'].'</p>';
}


$mail->Body = $body;

if (!$mail->send()) {
    $message = 'Ошибка';
} else {
    $message = 'Письмо отправлено!';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);

?>