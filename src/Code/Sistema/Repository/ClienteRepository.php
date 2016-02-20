<?php
/**
 * Created by PhpStorm.
 * User: albo-vieira
 * Date: 20/02/16
 * Time: 12:48
 */

namespace Code\Sistema\Repository;




class ClienteRepository extends AbstractRepository
{
    protected $alias = 'c';

    public function getCount(){
        $qb = $this->getQueryBuilder();
        $qb->select('count(c.id)');
        
        //return $qb->get''
    }

    public function getRegistrosPaginados($params){

        $qb = $this->getQueryBuilder();
        $qb->setFirstResult($params['start']);
        $qb->setMaxResults($params['end']);

        return $qb->getQuery()->getResult();

    }


}