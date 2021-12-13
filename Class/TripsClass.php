<?php

require_once "Database.php";
class Trip
{
  private $idTrip;
  private $itinerary;
  private $price;
  private $maxGroup;
  private $fechaInicio;
  private $fechaFin;
  private $img;
  private $destination;

  private function __construct()
  {
  }

  public function __get($key)
  {
    if (property_exists("Trip", $key)) return $this->$key;
    throw new Exception;
  }

  public static function retrieveAllTrips(): ?array
  {
    $connection = Database::createInstance();
    $executeQuery = $connection->createQuery("SELECT * FROM trips;");
    $result = $connection->getAll("Trip");
    $numRows = $connection->getTotalRows();
    return $numRows ? $result : null;
  }


  public static function addUserToTrip(int $idUser, int $idTrip)
  {
    $connection = Database::createInstance();
    $idUser = $connection->escapeString($idUser);
    $idTrip = $connection->escapeString($idTrip);
    $executeQuery = $connection->createQuery("INSERT INTO user_has_trips VALUES($idUser, $idTrip);");
  }

  public static function retrieveUsersInTrip(int $idTrip): int
  {
    $connection = Database::createInstance();
    $idTrip = $connection->escapeString($idTrip);
    $executeQuery = $connection->createQuery("SELECT * FROM user_has_trips WHERE trips_IdTrip = $idTrip;");
    return $connection->getTotalRows();
  }

  public static function isUserInTrip(int $idUser, int $idTrip): bool
  {
    $connection = Database::createInstance();
    $idUser = $connection->escapeString($idUser);
    $idTrip = $connection->escapeString($idTrip);
    $executeQuery = $connection->createQuery("SELECT * FROM user_has_trips WHERE trips_IdTrip = $idTrip AND user_idUser = $idUser;");
    return $connection->getTotalRows() ? true : false;
  }

  public static function isUserInAnyTrip(int $idUser): bool
  {
    $connection = Database::createInstance();
    $idUser = $connection->escapeString($idUser);
    $executeQuery = $connection->createQuery("SELECT * FROM user_has_trips WHERE user_idUser = $idUser;");
    return $connection->getTotalRows() ? true : false;
  }

  public static function deleteUserInTrip(int $idUser, int $idTrip): bool
  {
    $connection = Database::createInstance();
    $idUser = $connection->escapeString($idUser);
    $idTrip = $connection->escapeString($idTrip);
    $executeQuery = $connection->createQuery("DELETE FROM user_has_trips WHERE user_idUser = $idUser AND trips_idTrip = $idTrip;");
    return $connection->getTotalRows() ? true : false;
  }
}
