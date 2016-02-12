<?php

/**
 * Created by PhpStorm.
 * User: albov
 * Date: 11/02/2016
 * Time: 23:17
 */
namespace Code\Sistema\Service\Interfaces;

interface ServiceInterface
{
    public function insert($cliente);
    public function update($cliente);
    public function delete($cliente);
    public function findById($id);
    public function fetchAll();
}