<?php
if(isset($_POST['lang'])) {
  $_SESSION['lang'] = $_POST['lang'];
} else {
  $_SESSION['lang'] = "fr";
}

die(true);
?>
