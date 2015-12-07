<?php
include '../src/App.php';
App::getSession();

if(isset($_POST['lang'])) {
  $_SESSION['lang'] = $_POST['lang'];
} else {
  $_SESSION['lang'] = "fr";
}

die(true);
?>
