<?php
	session_start();

  if (isset($_SESSION['username'])) {
    session_destroy();
    header('Location:http://localhost/Agenda-Joel/Version_PHP/client/');
  }
	
 ?>
