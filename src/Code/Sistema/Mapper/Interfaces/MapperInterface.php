<?php

/**
 * Created by PhpStorm.
 * User: albov
 * Date: 11/02/2016
 * Time: 22:31
 */
namespace Code\Sistema\Mapper\Interfaces;

use Code\Sistema\Entity\AbstractEntity;

interface MapperInterface
{
    public function insert(AbstractEntity $entity);
    public function update(AbstractEntity $entity);
    public function delete(AbstractEntity $entity);
    public function findById($id);
    public function fetchAll();
}