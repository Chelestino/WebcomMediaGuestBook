<?php

use WebcomMediaGuestBook\Controller\MessageController;
use WebcomMediaGuestBook\Controller\PaginationController;

require_once "bootstrap.php";

$message = new MessageController($entityManager);
$messageData=$message->ShowAllMessages();
$pagination = new Pagination($messageData, array('url'=>'http://localhost/index.php?page=','page'=>1));
$template = $twig->loadTemplate('messages.html.twig');
echo $template->render(array('messageData'=>$messageData, 'pagination'=>$pagination));
$template= $twig->display('form.html.twig');

if (!empty($_POST)) {
    $captcha = new Securimage();
    if ($captcha->check(filter_input(INPUT_POST, 'captcha_code', FILTER_SANITIZE_SPECIAL_CHARS)) === true) {
        $photo = $_FILES['image_field'];
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
        $message->AddNewMessage($name, $comment, $photo);
        header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        exit;
    } else {
        header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        exit;
    }
}




