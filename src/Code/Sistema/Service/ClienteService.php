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
use Symfony\Component\HttpKernel\Client;

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

    /**
     * @param $cliente
     * @return array
     */
    public function insert($cliente){

        $this->cliente->setNome($cliente['nome']);
        $this->cliente->setEmail($cliente['email']);

        return $this->clienteMapper->insert($this->cliente);
    }

    /**
     * @param $cliente
     */
    public function update($cliente){

        /** @var Cliente $clienteEntity */
        $clienteEntity = $this->findById($cliente['id']);
        if($clienteEntity){
            $clienteEntity->setNome($cliente['nome']);
            $clienteEntity->setEmail($cliente['email']);

            return $this->clienteMapper->update($clienteEntity);
        }

        return [
            'success'=> false
        ];

    }

    /**
     * @param $id
     * @return array
     */
    public function delete($id){
        /** @var Cliente $cliente */
        $cliente = $this->findById($id);
        if($cliente){
            return $this->clienteMapper->delete($cliente);
        }
        else
            return [
                'success'=> false
            ];

    }

    /**
     * @return array
     */
    public function fetchAll(){
        return $this->clienteMapper->fetchAll();
    }


    /**
     * @param $id
     * @return null|Cliente
     */
    public function findById($id){
        return $this->clienteMapper->findById($id);
    }

    /**
     * @param $id
     */
    public function entityAsArray($id){
        /** @var Cliente $cliente */
        $cliente = $this->findById($id);
        $arrClient['nome'] = $cliente->getNome();
        $arrClient['email'] = $cliente->getEmail();

        return $arrClient;
    }

    /**
     * @return array
     */
    public function entitiesAsArray(){
        $clientes = $this->fetchAll();
        $arrClientes = [];
        /** @var Cliente $cliente */
        foreach($clientes as $cliente){
            $arrClientes[$cliente->getId()]['nome'] = $cliente->getNome();
            $arrClientes[$cliente->getId()]['email'] = $cliente->getEmail();
        }

        return $arrClientes;
    }

}