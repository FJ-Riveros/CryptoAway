<?php

require_once "Database.php";
class Usuario
{
    private $idUser;
    private $username;
    private $password;
    private $name;
    private $surname;
    private $points;
    private $metamaskAddress;
    private $email;
    private $avatar;
    private $description;

    public function __get($key)
    {
        if (property_exists("Usuario", $key)) return $this->$key;
        throw new Exception;
    }

    public function __set($key, $value)
    {
        if (property_exists("Usuario", $key)) {
            $this->$key = $value;
        }
    }

    private function __construct()
    {
    }

    public static function checkIfCorrectCredentials(string $username, string $password): ?int
    {
        $connection = Database::createInstance();
        //Check if the user is in the DB
        $password = MD5($password);
        $executeQuery = $connection->createQuery("SELECT * FROM user WHERE username = '$username' AND passwordUser= '$password';");
        $numRows = $connection->getTotalRows();
        //If correct credentials fetch the object and pass it forward.
        return $numRows ? $connection->getFetchedData("Usuario")->idUser : null;
    }

    public function updateUser()
    {
        $connection = Database::createInstance();
        $query = $connection->createQuery("UPDATE user SET username = '{$this->username}', 
        name = '{$this->name}', surname = '{$this->surname}', metamaskAddress = '{$this->metamaskAddress}',
        avatar = '{$this->avatar}', description = '{$this->description}', email = '{$this->email}'  WHERE idUser = {$this->idUser};");
    }

    public static function getUser($idUser): ?Usuario
    {
        $connection = Database::createInstance();
        $query = $connection->createQuery("SELECT * FROM user WHERE idUser = {$idUser}");
        return $connection->getFetchedData("Usuario");
    }

    //Nos dice si un usuario existe con ese username
    public static function checkIfUserExists(string $usernameAdd, string $actualUserName): bool
    {
        if ($usernameAdd === $actualUserName) return false;
        $connection = Database::createInstance();
        $username = $connection->escapeString($usernameAdd);
        $query = $connection->createQuery("SELECT * FROM user WHERE username = '$usernameAdd';");
        return $connection->getTotalRows();
    }

    //Nos dice si un usuario es amigo de otro
    public static function checkIfAlreadyFriend(string $idUserActual, string $idUserFriend): bool
    {
        $friends = self::getUserFriends($idUserActual);
        foreach ($friends as $friend) {
            if ($friend->idUser == $idUserFriend) return true;
        }
        return false;
    }

    //Obtiene el nombre del usuario a añadir y el nombre del usuario actual para enviar una petición de amistad.
    public static function tryToAddFriend(string $usernameAdd, string $actualUserName): bool
    {
        if (!self::checkIfUserExists($usernameAdd, $actualUserName)) return false;
        if (self::checkIfAlreadyFriend(self::getUserIdFromUsername($actualUserName), self::getUserIdFromUsername($usernameAdd))) return false;
        $idUserAdd = self::getUserIdFromUsername($usernameAdd);
        $idActualUser = self::getUserIdFromUsername($actualUserName);
        $connection = Database::createInstance();
        $usernameAdd = $connection->escapeString($usernameAdd);
        $actualUserName = $connection->escapeString($actualUserName);
        $query = $connection->createQuery("INSERT INTO friends VALUES ($idActualUser, $idUserAdd, true);");
        return $connection->getFeedBackQuery();
    }
    //Devolvemos el id de un usuario por su nombre
    public static function getUserIdFromUsername(string $username): ?int
    {
        $connection = Database::createInstance();
        $username = $connection->escapeString($username);
        $query = $connection->createQuery("SELECT idUser FROM user WHERE username = '$username';");
        return $connection->getFetchedData("Usuario")->idUser;
    }
    //Devolvemos las peticiones de amistad de un usuario
    public static function getUserFriendRequests($idUser): array
    {
        $connection = Database::createInstance();
        //Obtenemos las peticiones de amistad de un usuario
        $query = $connection->createQuery("SELECT username, idUser, email, avatar, name, surname, description FROM user
        WHERE idUser IN (SELECT users_idUser FROM friends WHERE users_idUser1 = $idUser AND friendRequest = 1);   
        ");
        return $connection->getAll("Usuario");
    }
    //Obtenemos los amigos de un usuario
    public static function getUserFriends($idUser): array
    {

        $connection = Database::createInstance();
        $query = $connection->createQuery("SELECT username, idUser, email, avatar, name, surname, metamaskAddress FROM user
        WHERE idUser IN (SELECT users_idUser1 FROM friends WHERE users_idUser = $idUser AND friendRequest = 0)
        OR idUser IN (SELECT users_idUser FROM friends WHERE users_idUser1 = $idUser AND friendRequest = 0);
        ");
        return $connection->getAll("Usuario");
    }

    public static function giveLike($idUser, $idPost): bool
    {
        //Obtenemos los amigos de un usuario
        $connection = Database::createInstance();
        $idUser = $connection->escapeString($idUser);
        $idPost = $connection->escapeString($idPost);
        $query = $connection->createQuery("INSERT INTO likes VALUES('$idPost', '$idUser');");
        return $connection->getFeedBackQuery();
    }

    //Nos indica si un usuario ha dado like a un Post en concreto
    public static function userLikedActualPost($idUser, $idPost): bool
    {
        //Obtenemos los amigos de un usuario
        $connection = Database::createInstance();
        $idUser = $connection->escapeString($idUser);
        $idPost = $connection->escapeString($idPost);
        $query = $connection->createQuery("SELECT * FROM likes WHERE Post_idPost = '$idPost' AND user_idUser = '$idUser';");
        return $connection->getTotalRows();
    }

    //Quitamos el like de un usuario
    public static function removeLike($idUser, $idPost): bool
    {
        //Obtenemos los amigos de un usuario
        $connection = Database::createInstance();
        $idUser = $connection->escapeString($idUser);
        $idPost = $connection->escapeString($idPost);
        $query = $connection->createQuery("DELETE FROM likes WHERE Post_idPost = '$idPost' AND user_idUser = '$idUser';");
        return $connection->getFeedBackQuery();
    }

    //Borramos el amigo de un usuario
    public static function deleteFriend($actualUserId, $idFriend): bool
    {
        //Obtenemos los amigos de un usuario
        $connection = Database::createInstance();
        $actualUserId = $connection->escapeString($actualUserId);
        $idFriend = $connection->escapeString($idFriend);
        $query = $connection->createQuery(
            "DELETE FROM friends 
            WHERE (users_idUser = '$actualUserId' AND users_idUser1 = '$idFriend')
            OR (users_idUser = '$idFriend' AND users_idUser1 = '$actualUserId');"
        );
        return $connection->getFeedBackQuery();
    }

    //Borramos el amigo de un usuario
    public static function addNewUser($username, $password, $description, $avatar, $firstName, $secondName, $email): bool
    {
        //Obtenemos los amigos de un usuario
        $connection = Database::createInstance();
        $username = $connection->escapeString($username);
        $password = MD5($password);
        $password = $connection->escapeString($password);
        $description = $connection->escapeString($description);
        $avatar = $connection->escapeString($avatar);
        $firstName = $connection->escapeString($firstName);
        $secondName = $connection->escapeString($secondName);
        $email = $connection->escapeString($email);
        $query = $connection->createQuery(
            "INSERT INTO user (username, passwordUser, name, surname, email, avatar, description) VALUES('$username', '$password', '$secondName', '$firstName', '$email', '$avatar', '$description')"
        );
        return $connection->getFeedBackQuery();
    }

    //Recogemos 5 usuarios para añadir como amigos
    public static function suggestUsersToAdd($idUser): array
    {
        $connection = Database::createInstance();
        $idUser = $connection->escapeString($idUser);
        $query = $connection->createQuery(
            "SELECT * FROM user WHERE idUser NOT IN
            (SELECT users_IdUser FROM friends WHERE users_idUSer = $idUser OR users_idUser1 = $idUser)
            AND idUser NOT IN (SELECT users_IdUser1 FROM friends WHERE users_idUSer = $idUser OR users_idUser1 = $idUser)
            LIMIT 5;"
        );
        return $connection->getAll("Usuario");
    }
}
