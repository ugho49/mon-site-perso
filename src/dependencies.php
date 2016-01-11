<?php
// DIC configuration
$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// view render
$container['render'] = function ($c) {
    $template_path = $c->get('settings')['renderer']['template_path'];

    $render = function ($template, $data) use ($template_path) {
        $content = file_get_contents($template_path.$template);
        return str_replace(array_keys($data), array_values($data), $content);
    };

    return $render;
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG));
    return $logger;
};

// Controleur
$container['controleur'] = function () {
    return new App\App();
};

// Mailer
$container['mailer'] = function() {
    return new PHPMailer();
};
