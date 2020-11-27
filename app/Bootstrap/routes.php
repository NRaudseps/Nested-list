<?php

return FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $namespace = '\App\Controllers\\';

    $r->addRoute('GET', '/', $namespace . 'HomeController@index');

    $r->addRoute('GET', '/login', $namespace . 'LoginController@show');
    $r->addRoute('POST', '/login', $namespace . 'LoginController@check');
    $r->addRoute('POST', '/logout', $namespace . 'LoginController@logout');

    $r->addRoute('GET', '/register', $namespace . 'RegisterController@show');
    $r->addRoute('POST', '/register', $namespace . 'RegisterController@store');

    $r->addRoute('GET', '/dashboard', $namespace . 'DashboardController@index');

    $r->addRoute('GET', '/section/create', $namespace . 'SectionController@create');
    $r->addRoute('POST', '/section/create', $namespace . 'SectionController@store');
    $r->addRoute('POST', '/section/delete', $namespace . 'SectionController@destroy');
    $r->addRoute('GET', '/section/{id}', $namespace . 'SectionController@index');
});