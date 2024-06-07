<?php

use App\Controller\Admin;
use App\Router;
use App\Controller\Home;

$router = new Router();

// Home page
$router->get('/', Home::class, 'index');

$router->get('/areas', Home::class, 'areas');
$router->post('/areas', Home::class, 'areas');

$router->get('/areas-level-one', Home::class, 'areasLevelOne');
$router->post('/areas-level-one', Home::class, 'areasLevelOne');

$router->get('/areas-level-two', Home::class, 'areasLevelTwo');
$router->post('/areas-level-two', Home::class, 'areasLevelTwo');

$router->get('/documents', Home::class, 'documents');
$router->post('/documents', Home::class, 'areas');

$router->get('/municipalities', Home::class, 'municipalities');
$router->post('/municipalities', Home::class, 'municipalities');

$router->get('/regions', Home::class, 'regions');
$router->post('/regions', Home::class, 'regions');

$router->get('/sof-territorial-units', Home::class, 'sofTerritorialUnits');
$router->post('/sof-territorial-units', Home::class, 'sofTerritorialUnits');

$router->get('/territorial-formations', Home::class, 'territorialFormations');
$router->post('/territorial-formations', Home::class, 'territorialFormations');

$router->get('/territorial-units', Home::class, 'territorialUnits');
$router->post('/territorial-units', Home::class, 'territorialUnits');

$router->get('/town-halls', Home::class, 'townHalls');
$router->post('/town-halls', Home::class, 'townHalls');

$router->get('/seeds', Admin::class, 'seeders');

try {
    $router->dispatch(strtok($_SERVER['REQUEST_URI'], '?'));
} catch (Exception $e) {
    echo $e->getMessage();
}