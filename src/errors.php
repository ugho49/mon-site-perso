<?php
//Override the default Not Found Handler
$container['notFoundHandler'] = function ($c) {
    return function () use ($c) {

        $res = $c['response']->withStatus(404);

        return $c['renderer']->render($res, 'errors.php', ['status' => 404]);
    };
};

//Override the default Not Allowed Handler
$container['notAllowedHandler'] = function ($c) {
    return function ($request, $response, $methods) use ($c) {

        $res = $c['response']
                ->withStatus(405)
                ->withHeader('Allow', implode(', ', $methods));

        return $c['renderer']->render($res, 'errors.php', ['status' => 405]);
    };
};
