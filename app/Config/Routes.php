<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//para GET mostrar datos y vistas
$routes->get('/', 'Home::index');
$routes->get('/salir','Home::salir');
$routes->get('/dashboard', 'Home::dashboard');
$routes->get('/eliminar/(:any)', 'Home::eliminar/$1');
$routes->get('/dashboardUser', 'Home::dashboardUser');
$routes->get('/registrar','Home::dashboard');
$routes->post('/actualizar/(:any)', 'Home::actualizar/$1');


//para  POST recopilar informacion
$routes->post('/registrar','Home::registrar');
$routes->post('/login' , 'Home::login');
$routes->post('/dashboard', 'Home::dashboard');





/**
 * Declaración de rutas para un loggeo
 */

//$routes->get('Inicio de sesión' , 'Home::dashboard');