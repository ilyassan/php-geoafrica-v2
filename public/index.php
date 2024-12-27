<?php    
    require_once __DIR__ . '/../app/Config/config.php';

    function require_all_files($directory) {
        foreach (glob($directory . '/*.php') as $filename) {
            require_once $filename;
        }
    }

    // Require all core files
    require_all_files(__DIR__ . '/../app/Core');
    $db = new Database();
    BaseClass::setDatabase($db);

    // Require all helpers files
    require_all_files(__DIR__ . '/../app/Helpers');

    // Require all the classes
    require_all_files(__DIR__ . '/../app/Classes');
    

    // Define the routes
    $router = new Router();
    $request = new Request();

    // Country routes 
    $router->add('GET', '/', 'CountriesPage@index');
    $router->add('GET', '/country/create', 'NewCountryPage@index');
    $router->add('POST', '/country/create', 'NewCountryPage@create');
    $router->add('POST', '/country/delete/{id}', 'CountryDetailsPage@delete');
    $router->add('GET', '/country/{id}', 'CountryDetailsPage@index');
    $router->add('POST', '/country/{id}', 'CountryDetailsPage@update');

    // API routes
    $router->add('POST', '/api/country/add-city', 'CountryDetailsPage@addCityToCountry');
    $router->add('POST', '/api/country/remove-city', 'CountryDetailsPage@removeCityFromCountry');
    $router->add('GET', '/api/country/cities/{id}', 'NewCountryPage@countryCities');

    // Auth routes
    $router->add('GET', '/signup', 'SignupPage@index');
    $router->add('POST', '/signup', 'SignupPage@register');
    $router->add('GET', '/login', 'LoginPage@index');
    $router->add('POST', '/login', 'LoginPage@login');
    $router->add('POST', '/logout', 'LoginPage@logout');

    $router->dispatch($request);
