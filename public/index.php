<?php
    require_once __DIR__ . '/../app/Config/config.php';

    // Require core files
    require_once __DIR__ . '/../app/Core/Router.php';
    require_once __DIR__ . '/../app/Core/Request.php';
    require_once __DIR__ . '/../app/Core/BasePage.php';
    require_once __DIR__ . '/../app/Core/Database.php';
    
    $router = new Router();
    $request = new Request();

    // Define Routes
    $router->add('GET', '/about', 'CountriesPage@about');

    $router->dispatch($request);
