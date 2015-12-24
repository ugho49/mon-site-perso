<?php
/**
* Routes with middleware
*/
$app->group('', function () {

    // Sample log message
    //$this->logger->info("Slim-Skeleton '/' route");

    $this->get('/', function ($request, $response, $args) {
        $this->renderer->render($response, 'index.php', ['slim' => $this]);
    })->setName('home');

})->add(function ($request, $response, $next) {

    $this->renderer->render($response, 'header.php');
    $response = $next($request, $response);
    $this->renderer->render($response, 'footer.php');

    return $response;
});

/**
* Other routes
*/
$app->post('/form', function ($req, $res, $args) {
    $this->renderer->render($res, 'form.php', ['slim' => $this]);
})->setName('form');

$app->post('/language', function ($req, $res, $args) {
    $this->renderer->render($res, 'language.php');
})->setName('language');

$app->get('/files/{name}', function ($req, $res, $args) {
    $this->renderer->render($res, 'files.php', ['name' => $args['name']]);
})->setName('files');

$app->get('/update', function ($req, $res, $args) {
    $this->renderer->render($res, 'update.php');
})->setName('update');
