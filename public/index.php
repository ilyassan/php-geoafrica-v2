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
    require_once __DIR__ . '/../app/helpers/csrf_helper.php';
    require_once __DIR__ . '/../app/helpers/user_helper.php';

    $db = new Database();
    BaseClass::setDatabase($db);

    // Require the classes
    require_once __DIR__ . '/../app/Classes/User.php';
    require_once __DIR__ . '/../app/Classes/Country.php';
    require_once __DIR__ . '/../app/Classes/City.php';
    require_once __DIR__ . '/../app/Classes/Language.php';
    require_once __DIR__ . '/../app/Classes/Continent.php';
    
    $router = new Router();
    $request = new Request();

    // countries routes 
    $router->add('GET', '/', 'CountriesPage@index');
    $router->add('GET', '/country/create', 'NewCountryPage@index');
    $router->add('POST', '/country/create', 'NewCountryPage@create');
    $router->add('GET', '/country/{id}', 'CountryDetailsPage@index');
    $router->add('POST', '/country/{id}', 'CountryDetailsPage@update');
    $router->add('POST', '/delete-country/{id}', 'CountryDetailsPage@delete');
    $router->add('GET', '/country/create', 'NewCountryPage@index');

    $router->add('POST', '/api/country/add-city', 'CountryDetailsPage@addCityToCountry');
    $router->add('POST', '/api/country/remove-city', 'CountryDetailsPage@removeCityFromCountry');
    $router->add('GET', '/api/country/cities/{id}', 'NewCountryPage@countryCities');

    $router->add('GET', '/signup', 'SignupPage@index');
    $router->add('POST', '/signup', 'SignupPage@register');
    $router->add('GET', '/login', 'LoginPage@index');
    $router->add('POST', '/login', 'LoginPage@login');
    $router->add('POST', '/logout', 'LoginPage@logout');

    $router->dispatch($request);
