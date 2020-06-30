<?php
/**
 * Created by PhpStorm.
 * User: mcamara
 * Date: 01/07/2020
 * Time: 00:55
 */

namespace App\DataPersister;


use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;

class ProductPersister implements DataPersisterInterface
{

    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function supports($data): bool
    {
        // TODO: Implement supports() method.
        return $data instanceof Product;
    }

    public function persist($data)
    {
        // TODO: Implement persist() method.
        // 1. Mettre une date de création sur le produit
        $data->setCreatedAt(new \DateTime());

        // 2. Demander à doctrine de persister
        $this->em->persist($data);
        $this->em->flush();
    }

    public function remove($data)
    {
        // TODO: Implement remove() method.
        // Demander a Doctrine de supprimer le produit
        $this->em->remove($data);
        $this->em->flush();
    }
}