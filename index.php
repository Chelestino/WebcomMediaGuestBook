<?php

use JasonGrimes\Paginator;
use WebcomMediaGuestBook\Controller\MessageController;

require_once "bootstrap.php";

$message = new MessageController($entityManager);
$allMessages=$message->ShowAllMessages();
$totalItems = count($allMessages);
$itemsPerPage = 5;
$currentPage = isset($_GET['page'])?$_GET['page']:1;
$urlPattern = '/index.php?page=(:num)';
$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

$template = $twig->loadTemplate('messages.html.twig');
echo $template->render(array('messageData'=>$allMessages, 'paginator'=>$paginator));
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




