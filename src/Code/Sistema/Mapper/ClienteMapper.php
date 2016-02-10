<?php

/**
 * Created by PhpStorm.
 * User: albov
 * Date: 08/02/2016
 * Time: 17:18
 */

namespace Code\Sistema\Mapper;

use Code\Sistema\Entity\Cliente;
use Doctrine\ORM\EntityManager;

class ClienteMapper
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function fetchAll(){
        $clientes = $this->em->getRepository()->findAll();
        return $clientes;
    }

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

    public function update()
    {

    }
    public function delete(){

    }
}