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
use Doctrine\ORM\EntityManager;

class AbstractService
{
    protected $em;
    protected $entityName;

    /**
     * ClienteService constructor.
     * @param $cliente
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getEM(){
        return $this->em;
    }

    public function getRepository(){
        return $this->em->getRepository($this->entityName);
    }

    public function getReference($id){
        return $this->em->getReference($this->entityName, $id);
    }

    public function getEntityName(){
        return $this->entityName;
    }

    public function save(AbstractEntity $entity){

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }

    public function remove(AbstractEntity $entity){
        $this->em->remove($entity);
        $this->em->flush($entity);
    }

}