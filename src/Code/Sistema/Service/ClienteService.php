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
use Code\Sistema\Service\AbstractService;

class ClienteService extends AbstractService
{

    /**
     * @param $cliente
     * @return array
     */
    public function insert($cliente){

        $this->entity->setNome($cliente['nome']);
        $this->entity->setEmail($cliente['email']);

        return $this->mapper->insert($this->entity);
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

            return $this->mapper->update($clienteEntity);
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
            return $this->mapper->delete($cliente);
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
        return $this->mapper->fetchAll();
    }


    /**
     * @param $id
     * @return null|Cliente
     */
    public function findById($id){
        return $this->mapper->findById($id);
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