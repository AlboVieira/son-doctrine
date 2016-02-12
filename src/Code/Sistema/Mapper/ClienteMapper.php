<?php

/**
 * Created by PhpStorm.
 * User: albov
 * Date: 08/02/2016
 * Time: 17:18
 */

namespace Code\Sistema\Mapper;

use Code\Sistema\Entity\AbstractEntity;
use Code\Sistema\Entity\Cliente;
use Code\Sistema\Mapper\Interfaces\MapperInterface;
use Doctrine\ORM\EntityManager;

class ClienteMapper extends AbstractMapper
{
    protected $entityName = 'Code\\Sistema\\Entity\\Cliente';

    /**
     * @return Cliente[]
     */
    public function fetchAll(){
        $clientes = $this->em->getRepository($this->entityName)->findAll();
        return $clientes;
    }

    /**
     * @param $id
     * @return null|Cliente
     */
    public function findById($id){
        $cliente = $this->getRepository()->find($id);
        return $cliente;
    }

    /**
     * @param Cliente $cliente
     * @return array
     */
    public function insert(Cliente $cliente)
    {
        $this->em->persist($cliente);
        $this->em->flush($cliente);

        return [
            'success' => true,
            'id' => $cliente->getId(),
            'nome' => $cliente->getNome(),
            'email' => $cliente->getEmail(),
        ];
    }

    /**
     * @param Cliente $cliente
     * @return array
     */
    public function update(Cliente $cliente)
    {
        $this->em->merge($cliente);
        $this->em->flush($cliente);

        return [
            'success' => true,
            'id' => $cliente->getId(),
            'nome' => $cliente->getNome(),
            'email' => $cliente->getEmail(),
        ];
    }

    /**
     * @param Cliente $cliente
     * @return array
     */
    public function delete(Cliente $cliente){

        $this->em->remove($cliente);
        $this->em->flush($cliente);

        return [
            'success' => true
        ];
    }
}