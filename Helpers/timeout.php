
<?php
if (!empty($_SESSION) && (time() >= $_SESSION["timeOutMoment"])) {
  header('Location: Timeline.php?closeSession=true', true, 303);
  $_SESSION = [];
}
?>