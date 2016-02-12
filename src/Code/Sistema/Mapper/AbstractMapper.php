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


class AbstractMapper
{
    protected $em;
    protected $entityName;

    public function __construct(EntityManager $em)
    {
        /** @var EntityManager em */
        $this->em = $em;
    }

    public function getEM(){
        return $this->em;
    }

    public function getRepository(){
        return $this->em->getRepository($this->entityName);
    }

    public function getEntity(){}

    public function getEntityName(){
        return $this->entityName;
    }
}