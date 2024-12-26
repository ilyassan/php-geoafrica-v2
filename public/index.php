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
    require_once __DIR__ . '/../app/Classes/Country.php';
    require_once __DIR__ . '/../app/Classes/City.php';
    require_once __DIR__ . '/../app/Classes/Language.php';
    
    $router = new Router();
    $request = new Request();

    // countries routes 
    $router->add('GET', '/', 'CountriesPage@index');
    $router->add('GET', '/country/{id}', 'CountriesPage@details');
    $router->add('GET', '/addCountry', 'CountriesPage@create');

    $router->add('GET', '/signup', 'SignupPage@index');
    $router->add('POST', '/signup', 'SignupPage@register');
    $router->add('GET', '/login', 'LoginPage@index');

    $router->dispatch($request);
