<?php

return FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $namespace = '\App\Controllers\\';

    $r->addRoute('GET', '/', $namespace . 'Controller@index');
    $r->addRoute('GET', '/login', $namespace . 'Controller@login');
    $r->addRoute('GET', '/register', $namespace . 'Controller@register');
});