<?php

use JasonGrimes\Paginator;

require_once "bootstrap.php";

if (!empty($_POST['submit'])) {
// если пришли данные пробуем записать их в БД
    $captcha = new Securimage();
    if ($captcha->check(filter_input(INPUT_POST, 'captcha_code', FILTER_SANITIZE_SPECIAL_CHARS)) === true) {

        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
        $message->AddNewMessage($name, $comment);

    } else {
        echo 'неправильная каптча :(';
        exit;
    }
}

// получаем все сообщения и высчитываем их кол-во
$allMessages = $message->ShowAllMessages();
$totalItems = count($allMessages);
// здесь назначаем кол-во сообщений на странице 
$itemsPerPage = 3;
// получаем номер текущей страницы из массива $_SERVER
if (!empty($_SERVER['PATH_INFO'])) {
    $pageNumber = explode('/', $_SERVER['PATH_INFO']);
    $pageNumber[2] = 'index.php' ? $currentPage = $pageNumber[2] : $currentPage = 1;
} else {
    $currentPage = 1;
}
// паттерн для friendly URL 
$urlPattern = '/WebcomMediaGuestBook/index.php/page/(:num)';
// передаем эти параметры в конструктор класса пагинации
$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

//передаем в шаблоны сообщения , инстанс пагинатора и абсолютный путь к директории проекта для корректного отображения стилей
$template = $twig->loadTemplate('messages.html.twig');
echo $template->render(array('messageData' => $allMessages, 'paginator' => $paginator, 'absolutePath' => $absolutePath));
$template = $twig->loadTemplate('form.html.twig');
echo $template->render(array('absolutePath' => $absolutePath));




