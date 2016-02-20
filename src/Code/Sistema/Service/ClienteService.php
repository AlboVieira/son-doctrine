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
use Code\Sistema\Repository\ClienteRepository;
use Symfony\Component\HttpKernel\Client;
use Code\Sistema\Service\AbstractService;

class ClienteService extends AbstractService
{

    protected $entityName = "\\Code\\Sistema\\Entity\\Cliente";

    /**
     * @param $cliente
     * @return array
     */
    public function insert(array $cliente){

        $clienteEntity = new Cliente();
        $clienteEntity->setNome($cliente['nome']);
        $clienteEntity->setEmail($cliente['email']);

        try{
            $this->save($clienteEntity);
            return [
                'success' => true,
                'id' => $clienteEntity->getId(),
                'nome' => $clienteEntity->getNome(),
                'email' => $clienteEntity->getEmail(),
            ];
        }
        catch(\Exception $e){
            return [
                'success' => false,
            ];
        }


    }

    /**
     * @param $cliente
     */
    public function update(array $cliente){

        /** @var Cliente $clienteEntity */
        $clienteEntity = $this->getReference($cliente['id']);
        if($clienteEntity){
            $clienteEntity->setNome($cliente['nome']);
            $clienteEntity->setEmail($cliente['email']);

            try{
                $this->save($clienteEntity);

                return [
                    'success' => true,
                    'id' => $clienteEntity->getId(),
                    'nome' => $clienteEntity->getNome(),
                    'email' => $clienteEntity->getEmail(),
                ];
            }
            catch(\Exception $e){
                return [
                    'success'=> false,
                ];
            }
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

        /** @var Cliente $clienteEntity */
        $clienteEntity = $this->getReference($id);
        if($clienteEntity){

            try{
                $this->remove($clienteEntity);
                return [
                    'success' => true
                ];
            }
            catch(\Exception $e){
                return [
                    'success'=> false
                ];
            }
        }


    }

    /**
     * @return array
     */
    public function fetchAll(){
        return $this->getRepository()->findAll();
    }

    /**
     * @param $id
     * @return null|Cliente
     */
    public function findById($id){
        return $this->getRepository()->find($id);
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

    public function getItensPaginados($params){

        $retorno = [];

        $clientes = $this->fetchAll();
        $count = count($clientes);

        $retorno['totalRecords'] = $count;

        /** @var ClienteRepository $repository */
        $repository = $this->getRepository();
        $registros = $repository->getRegistrosPaginados($params);
        $retorno['totalInPage'] = count($registros);

        /** @var Cliente $cliente */
        foreach($registros as $cliente){
            $itens[$cliente->getId()]['nome'] = $cliente->getNome();
            $itens[$cliente->getId()]['email'] = $cliente->getEmail();
        }
        $retorno['data'] = $itens;

        return $retorno;
    }

}