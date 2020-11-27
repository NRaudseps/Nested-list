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
});