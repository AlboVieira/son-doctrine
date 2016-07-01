<?php

/**
 * Created by PhpStorm.
 * User: albov
 * Date: 08/02/2016
 * Time: 17:30
 */
namespace Code\Sistema\Service;

use Code\Sistema\Entity\Cliente;
use Code\Sistema\Entity\Interesse;
use Code\Sistema\Mapper\ClienteMapper;
use Code\Sistema\Repository\ClienteRepository;
use Symfony\Component\HttpKernel\Client;
use Code\Sistema\Service\AbstractService;

class InteresseService extends AbstractService
{

    protected $entityName = "\\Code\\Sistema\\Entity\\Interesse";

    /**
     * @param $interesse
     * @return array
     */
    public function insert(array $interesse){

        $interesseEntity = new Interesse();
        $interesseEntity->setNome($interesse['nome']);

        try{
            $this->save($interesseEntity);
            return [
                'success' => true,
                'id' => $interesseEntity->getId(),
                'nome' => $interesseEntity->getNome(),
            ];
        }
        catch(\Exception $e){
            return [
                'success' => false,
            ];
        }
    }

}