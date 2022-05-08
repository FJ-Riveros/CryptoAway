<?php

require_once "Database.php";
class Comment
{
    private $idPost;
    private $textPost;
    private $idUser;

    public function __get($key)
    {
        if (property_exists("Comment", $key)) return $this->$key;
        throw new Exception;
    }

    public function __set($key, $value)
    {
        if (property_exists("Comment", $key)) {
            $this->$key = $value;
        }
    }

    private function __construct()
    {
    }

    public static function addComment(int $idUser, string $text): bool
    {
        $connection = Database::createInstance();
        //Check if the user is in the DB
        $executeQuery = $connection->createQuery("INSERT INTO comments ('Text', user_idUser) VALUES ('$text', {$idUser});");
        //If the comment was correctly created return true.
        return $executeQuery;
    }

    public static function removeComment(int $idUser, int $commentId): bool
    {
        $connection = Database::createInstance();
        //Check if the user is in the DB
        $executeQuery = $connection->createQuery("DELETE FROM comments WHERE Post_idPost = {$commentId} AND user_idUser = {$idUser};");
        //If the comment was correctly deleted return true.
        return $executeQuery;
    }

}
