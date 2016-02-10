<?php
require_once '../bootstrap.php';
use Code\Sistema\Entity\Cliente;
use Code\Sistema\Mapper\ClienteMapper;
use Code\Sistema\Service\ClienteService;
use Symfony\Component\HttpFoundation\Request;

$app['clienteService'] = function() use ($em){
    $clienteEntity = new Cliente();
    $clienteMapper = new ClienteMapper($em);
    $clienteService = new ClienteService($clienteEntity,$clienteMapper);
    return $clienteService;
};

$app->get("/", function() use ($app){
    //$dados = $app['clienteService']->fetchAll();
    $dados = ['r'=>'t'];
    return $app->json($dados);
});

$app->get("/api/teste", function() use ($app){
    //$dados = $app['clienteService']->fetchAll();
    $dados = ['r'=>'t'];
    return $app->json($dados);
});


$app->post('/api/clientes',function(Request $request) use ($app){
    $dados['nome'] = $request->get('nome');
    $dados['email'] = $request->get('email');
    $result = $app['clienteService']->insert($dados);

    return $app->json($result);
});

$app->run();