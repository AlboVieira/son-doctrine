<?php

/**
 * Created by PhpStorm.
 * User: albov
 * Date: 08/02/2016
 * Time: 17:30
 */
namespace Code\Sistema\Service;

use Code\Sistema\Entity\Cliente;
use Code\Sistema\Mapper\ClienteMapper;

class ClienteService
{
    private $cliente;
    private $clienteMapper;

    /**
     * ClienteService constructor.
     * @param $cliente
     */
    public function __construct(Cliente $cliente, ClienteMapper $clienteMapper)
    {
        $this->cliente = $cliente;
        $this->clienteMapper = $clienteMapper;
    }

    public function insert($cliente){

        $this->cliente->setNome($cliente['nome']);
        $this->cliente->setEmail($cliente['email']);

        return $this->clienteMapper->insert($this->cliente);
    }
    public function fetchAll(){

    }


}