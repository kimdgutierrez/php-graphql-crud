<?php

namespace PandoraBundle\Repository;

use Doctrine\ORM\EntityRepository;
use PandoraBundle\Entity\Securityquestions;

/**
 * SecurityQuestionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SecurityQuestionRepository extends EntityRepository
{

    /**
     * @return Securityquestions[]
     */
    public function findAllOrdered()
    {
        return $this->createQueryBuilder('t')
            ->orderBy('t.datecreated', 'DESC')
            ->getQuery()
            ->getResult();
    }
    
    public function removeCompleted()
    {
        $this->createQueryBuilder('t')
             ->delete()
             ->where('t.completed = :true')
             ->setParameter('true', true)
             ->getQuery()
             ->execute();
    }
}
