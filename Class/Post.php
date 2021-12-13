<?php

require_once "Database.php";
class Post
{
  private $idPost;
  private $imgPost;
  private $textPost;
  private $user_idUser;


  public function getIdPost()
  {
    return $this->idPost;
  }
  public function getImgPost()
  {
    return $this->imgPost;
  }
  public function getTextPost()
  {
    return $this->textPost;
  }
  public function getPostOwner()
  {
    return $this->user_idUser;
  }

  private function __construct()
  {
  }


  //Crea un Post
  public static function addPost(int $idUser, string $imgPost, string $textPost): bool
  {
    $connection = Database::createInstance();
    $textPost = $connection->escapeString($textPost);
    if ($imgPost != "") {
      $imgPost = $connection->escapeString($imgPost);
      $executeQuery = $connection->createQuery("INSERT INTO post (imgPost,textPost,user_idUser) VALUES('$imgPost', '$textPost',$idUser);");
    } else {
      $executeQuery = $connection->createQuery("INSERT INTO post (textPost,user_idUser) VALUES('$textPost',$idUser);");
    }
    return $connection->getMySQLInfo() == true ? true : false;
  }

  //Borra un Post
  public static function deletePost(int $idPost): bool
  {
    $connection = Database::createInstance();
    $idPost = $connection->escapeString($idPost);
    $query = $connection->createQuery("DELETE FROM post WHERE idPost = $idPost;");
    return $connection->getMySQLInfo() == true ? true : false;
  }

  //Retorna el último Post de un usuario en específico
  public static function getLastPost(int $idUser): ?Object
  {
    if ($lastPost = self::getPosts($idUser)) {
      return $lastPost[0];
    } else {
      return null;
    }
  }


  //Retorna los Posts de un usuario en específico
  public static function getPosts(int $idUser): array
  {
    $connection = Database::createInstance();
    //Check if the user is in the DB
    $executeQuery = $connection->createQuery("SELECT * FROM post WHERE user_idUser = $idUser ORDER BY idPost DESC;");
    $numRows = $connection->getAll("Post");
    return $numRows;
  }

  //Retorna los likes de un Post
  public static function getLikes(int $idPost): int
  {
    $connection = Database::createInstance();
    //Check if the user is in the DB
    $idPost = $connection->escapeString($idPost);
    $executeQuery = $connection->createQuery("SELECT * FROM likes WHERE Post_idPost = $idPost;");
    return $connection->getTotalRows();
  }
}
