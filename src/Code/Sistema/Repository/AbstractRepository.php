<?php
/**
 * Created by PhpStorm.
 * User: albo-vieira
 * Date: 20/02/16
 * Time: 13:16
 */

namespace Code\Sistema\Repository;

use Doctrine\ORM\EntityRepository;

class AbstractRepository extends EntityRepository
{

    protected $alias = 'c';

    public function getQueryBuilder(){

        $qb = $this->createQueryBuilder($this->alias);
        return $qb;
    }

}