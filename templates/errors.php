<?php
$title = "";

switch ($status) {
    case 404:
    $title = "Page Not Found";
    break;

    case 405:
    $title = "Page Not Allowed";
    break;
}
?>

<html>
<head>
    <title><?= $title; ?></title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/icon">
    <link rel="alternate" href="http://www.ugho-stephan.fr" hreflang="fr" />
    <link rel="stylesheet" href="css/error.css" media="screen">
</head>
<body>
    <h1 id="title"><?= $title; ?></h1>

    <div class="content">
      <div class="browser-bar">
        <span class="close button"></span>
        <span class="min button"></span>
        <span class="max button"></span>
      </div>
      <div class="text"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/error.js" charset="utf-8"></script>
</body>
</html>
