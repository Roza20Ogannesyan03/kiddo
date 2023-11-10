<?php
//define('SITE_KEY', '1234');
//define('SECRET_KEY', '1234');

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

if ($_POST) {
    $errors = array();
    if (empty($_POST['name'])) {
        $errors['name'] = 'Введите Ваше имя';
    }

    if (empty($_POST['tel'])) {
        $errors['tel'] = 'Введите Ваш номер телефона';
    }


    if (empty($_POST['mess'])) {
        $errors['mess'] = 'Введите Ваше сообщение';
    }


    $error_output = '';

    if (!empty($errors)) {

        $error_output  .= '<ul class="errors-list">';

        foreach ($errors as $key => $value) {
            $error_output .= '<li data-error="' . $key . '"></li>';
        }


        $error_output .= '<li class="errors-list__item">Заполните обязательные поля!</li>';
        $error_output .= '</ul>';


        http_response_code(422);
        echo $error_output;
        die();
    }

    $name = $_POST['name'];
    $phone = $_POST['tel'];
    $email = $_POST['email'];
    $message_cont = $_POST['mess'];


    $message = "
		<p>Имя - $name</p>
		<p>Телефон - $phone</p>
        <p>Сообщение - $message_cont</p>
		";

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    $mail->SMTPDebug = 0;
    $mail->Host = 'ssl://smtp.gmail.com';
    $mail->Port = 465;
    $mail->Username = 'rozaogannesyan109@gmail.com';
    $mail->Password = 'vauwqichjdwptkzn';
    $mail->setFrom('rozaogannesyan109@gmail.com', 'Premier cru');
    $mail->addAddress('rozaogannesyan109@gmail.com');
    // $mail->addAddress('tp@abeta.ru');
    $mail->Subject = 'Обратный звонок с сайта ';
    $mail->isHTML(true);
    $mail->Body = $message;

    if ($mail->send()) {
        $ok = true;
    }

    if ($ok) {
        http_response_code(200);
        echo '<div class="success"><p>Ваше сообщение успешно отправлено!</p></div>';
    } else {
        http_response_code(422);
        echo '<ul class="errors-list"><li class="errors-list__item">Что-то пошло не так!</li></ul>';
    }
} else {
    //var_dump($Return);
    echo '<ul class="errors-list"><li class="errors-list__item">Попробуйте позже!</li></ul>';
}
