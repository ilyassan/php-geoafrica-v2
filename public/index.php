<?php
    require_once __DIR__ . '/../app/Config/config.php';

    // Require core files
    require_once __DIR__ . '/../app/Core/Router.php';
    require_once __DIR__ . '/../app/Core/Request.php';
    require_once __DIR__ . '/../app/Core/BasePage.php';
    require_once __DIR__ . '/../app/Core/BaseClass.php';
    require_once __DIR__ . '/../app/Core/Database.php';
    require_once __DIR__ . '/../app/helpers/url_helper.php';
    require_once __DIR__ . '/../app/helpers/session_helper.php';
    require_once __DIR__ . '/../app/helpers/custom_functions.php';

    $db = new Database();
    BaseClass::setDatabase($db);

    // Require the classes
    require_once __DIR__ . '/../app/Classes/User.php';
    
    $router = new Router();
    $request = new Request();

    $router->add('GET', '/country/{id}', 'CountryDetails@index');
    $router->add('GET', '/about', 'CountriesPage@about');
    $router->add('GET', '/addCountry', 'CountriesPage@createCountry');

    $router->add('GET', '/signup', 'SignupPage@index');
    $router->add('POST', '/signup', 'SignupPage@register');
    $router->add('GET', '/login', 'LoginPage@index');

    $router->dispatch($request);
