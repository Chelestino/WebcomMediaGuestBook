<?php

namespace WebcomMediaGuestBook\Controller;

class MessageController {

    private $message;
    private $userMessage;
    private $user;
    private $entityManager;

    public function __construct($entityManager) {
        $this->message = new \Messages();
        $this->entityManager = $entityManager;
    }

    // записывает новое сообщение в БД
    public function AddNewMessage($user, $userMessage) {
        $this->message->setMessage($userMessage);
        $this->message->setUser($user);
        $this->entityManager->persist($this->message);
        $this->entityManager->flush();
    }

    //возвращает реверс массива сообщений 
    public function ShowAllMessages() {
        $dql = "SELECT m.user, m.message, m.added FROM Messages m ORDER BY m.added";
        $query = $this->entityManager->createQuery($dql);
        $query->setMaxResults(300);
        $mes = $query->getArrayResult();

        foreach ($mes as $key) {
            $data[] = $key['user'] . ' написал: ' . $key['message'] . ' в ' . $key['added']->format('H:i d.m.Y');
        }
        if (isset($data)) {
            return array_reverse($data);
        } else {
            return $data = ['Сообщений нет'];
        }
    }

}
