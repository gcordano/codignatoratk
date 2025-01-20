<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\News;
use App\Controllers\Pages;

/**
 * @var RouteCollection $routes
 */

// Grupo para rotas do cliente
$routes->group('cliente', function ($routes) {
    $routes->get('/', 'ClienteController::index'); // /cliente
    $routes->post('salvar', 'ClienteController::salvar'); // /cliente/salvar
    $routes->get('sucesso', 'ClienteController::sucesso'); // /cliente/sucesso
    $routes->get('controle', 'ClienteController::controle'); // /cliente/controle
    $routes->get('editar/(:num)', 'ClienteController::editar/$1'); // /cliente/editar/{id}
    $routes->post('editar/(:num)', 'ClienteController::editar/$1'); // /cliente/editar/{id}
    $routes->get('excluir/(:num)', 'ClienteController::excluir/$1'); // /cliente/excluir/{id}
});

// Grupo para rotas da calculadora
$routes->group('calculadora', function ($routes) {
    $routes->get('/', 'CalculadoraController::index'); // /calculadora
    $routes->post('calcular', 'CalculadoraController::calcular'); // /calculadora/calcular
});

// Grupo para rotas de notícias
$routes->group('news', function ($routes) {
    $routes->get('/', [News::class, 'index']); // /news
    $routes->get('new', [News::class, 'new']); // /news/new
    $routes->post('/', [News::class, 'create']); // /news
    $routes->get('(:segment)', [News::class, 'show']); // /news/{segment}
});

// Grupo para rotas de páginas
$routes->group('pages', function ($routes) {
    $routes->get('/', [Pages::class, 'index']); // /pages
    $routes->get('(:segment)', [Pages::class, 'view']); // /pages/{segment}
});

// Grupo para rotas do jogo da velha
$routes->group('jogo-da-velha', function ($routes) {
    $routes->get('/', 'JogoDaVelhaController::index'); // /jogo-da-velha
    $routes->post('jogar', 'JogoDaVelhaController::jogar'); // /jogo-da-velha/jogar
    $routes->post('reiniciar', 'JogoDaVelhaController::reiniciar'); // /jogo-da-velha/reiniciar
});
