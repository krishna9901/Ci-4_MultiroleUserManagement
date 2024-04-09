<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->match(['get', 'post'], '/', 'UserController::login', ["filter" => "noauth"]);
$routes->match(['get', 'post'], 'login', 'UserController::login', ["filter" => "noauth"]);
// Admin routes
$routes->group("admin", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "AdminController::index");
    $routes->get('settings', 'SettingsController::index', ['as' => 'admin.dashboard.index']);
    $routes->get('settings/create', 'SettingsController::create', ['as' => 'admin.dashboard.create']);
    $routes->post('settings', 'SettingsController::store', ['as' => 'admin.dashboard.store']);
    $routes->get('settings/edit/(:num)', 'SettingsController::edit/$1', ['as' => 'admin.dashboard.edit']);
    $routes->put('settings/update/(:num)', 'SettingsController::update/$1', ['as' => 'admin.dashboard.update']);
    $routes->delete('settings/destroy/(:num)', 'SettingsController::destroy/$1', ['as' => 'admin.dashboard.destroy']);
});
// Client routes
$routes->group("client", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "QuestionnaireController::index");
    $routes->get('questionnaire', 'QuestionnaireController::index');
    $routes->post('questionnaire/store', 'QuestionnaireController::storeQuestionnaire',['as' => 'client.questionnaire.store']);
    $routes->get('questionnaire_view', 'QuestionnaireController::fetchQuestionnaire');
    //$routes->get('upload', 'Upload::index');          // Add this line.
    $routes->post('upload/upload', 'QuestionnaireController::upload');

});
$routes->get('logout', 'UserController::logout');

$routes->get('/register', 'RegisterController::index');
$routes->match(['get', 'post'], 'Register/store', 'RegisterController::store');

