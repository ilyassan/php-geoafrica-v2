<?php
    require_once __DIR__ . '/../app/Config/config.php';

    // Require core files
    require_once __DIR__ . '/../app/Core/Router.php';
    require_once __DIR__ . '/../app/Core/Request.php';
    require_once __DIR__ . '/../app/Core/BasePage.php';
    require_once __DIR__ . '/../app/Core/Database.php';
    require_once __DIR__ . '/../app/helpers/url_helper.php';
    
    $router = new Router();
    $request = new Request();

    $router->add('GET', '/about', 'CountriesPage@about');
    $router->add('GET', '/signup', 'SignupPage@index');

    $router->dispatch($request);
