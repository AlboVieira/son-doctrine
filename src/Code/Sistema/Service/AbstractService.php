<?php

/**
 * Created by PhpStorm.
 * User: albov
 * Date: 11/02/2016
 * Time: 23:10
 */
namespace Code\Sistema\Service;


use Code\Sistema\Entity\AbstractEntity;
use Code\Sistema\Mapper\AbstractMapper;
use Code\Sistema\Service\Interfaces\ServiceInterface;

class AbstractService implements ServiceInterface
{
    protected $entity;
    protected $mapper;

    /**
     * ClienteService constructor.
     * @param $cliente
     */
    public function __construct(AbstractEntity $entity, AbstractMapper $mapper)
    {
        $this->entity = $entity;
        $this->mapper = $mapper;
    }
    public function insert($cliente){}
    public function update($cliente){}
    public function delete($cliente){}
    public function findById($id){}
    public function fetchAll(){}


}