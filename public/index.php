<?php
require_once '../bootstrap.php';
use Code\Sistema\Entity\Cliente;
use Code\Sistema\Mapper\ClienteMapper;
use Code\Sistema\Service\ClienteService;
use Symfony\Component\HttpFoundation\Request;

$app['clienteService'] = function() use ($em){
    $clienteService = new ClienteService($em);
    return $clienteService;
};

/** @var ClienteService $clienteService */
$clienteService = $app['clienteService'];

//teste rota
$app->get("/", function() use ($app,$clienteService){
    $result = $clienteService->entitiesAsArray();
    return $app->json($result);
});

// Recupera todos
$app->get("/api/clientes",function(Request $request) use ($app,$clienteService){
    $result = $clienteService->entitiesAsArray();
    return $app->json($result);
});

//recupera clientes paginados
$app->get("/api/clientes/grid",function(Request $request) use ($app,$clienteService){

    $params['start'] = $request->query->get('start');
    $params['end'] = $request->query->get('end');

    $result = $clienteService->getItensPaginados($params);
    return $app->json($result);
});

//recupera registro especifico
$app->get("/api/clientes/{id}",function(Request $request, $id) use ($app,$clienteService){
    $result = $clienteService->entityAsArray($id);
    return $app->json($result);
});

// Insere um novo
$app->post('/api/clientes',function(Request $request) use ($app,$clienteService){
    $dados['nome'] = $request->get('nome');
    $dados['email'] = $request->get('email');
    $result = $clienteService->insert($dados);

    return $app->json($result);
});

// Atualiza um registro
$app->post("/api/clientes/{id}",function(Request $request, $id) use ($app,$clienteService){
    $dados['id'] = $id;
    $dados['nome'] = $request->get('nome');
    $dados['email'] = $request->get('email');

    $result = $clienteService->update($dados);
    return $app->json($result);

});

//Apaga um registro
$app->delete("/api/clientes/{id}",function(Request $request,$id) use ($app,$clienteService){
    $result = $clienteService->delete($id);
    return $app->json($result);
});

$app->run();