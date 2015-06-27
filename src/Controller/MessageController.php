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

    public function AddPhotoToMessage($photo) {
        $handle = new upload($photo);
        if ($handle->uploaded) {
            $handle->image_resize = true;
            $handle->image_convert = gif;
            $handle->image_x = 100;
            $handle->image_ratio_y = true;
            $handle->Process('web/images/');
            if ($handle->processed) {
                return $handle->file_dst_pathname;
            } else {
                echo 'error : ' . $handle->error;
            }
        }
    }

    public function AddNewMessage($user, $userMessage, $photo = null) {
        $this->message->setMessage($userMessage);
        $this->message->setUser($user);
        $this->entityManager->persist($this->message);
        $this->entityManager->flush();
    }

    public function ShowAllMessages() {
        $dql = "SELECT m.user, m.message, m.added FROM Messages m ORDER BY m.added";
        $query = $this->entityManager->createQuery($dql);
        $query->setMaxResults(300);
        $mes = $query->getArrayResult();
        foreach ($mes as $key) {
            $data[] = $key['user'] . ' написал: ' . $key['message'] . ' в ' . $key['added']->format('H:i d.m.Y');
        }
        return $data;
    }

}
