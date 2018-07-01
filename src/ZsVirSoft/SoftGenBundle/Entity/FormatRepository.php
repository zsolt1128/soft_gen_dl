<?php

namespace App\ZsVirSoft\SoftGenBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * FormatRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FormatRepository extends EntityRepository
{
	public function findFields($user)	
	{
		$em = $this->getEntityManager("soft_gen");
		$query = $em
			->createQuery('
				SELECT f.id, f.name
				FROM ZsVirSoftSoftGenBundle:Format f
			'); 
		try {
			return $query->getResult();
		} catch (\Doctrine\ORM\NoResultException $e) {
			return null;
		}
	}	
	
}
