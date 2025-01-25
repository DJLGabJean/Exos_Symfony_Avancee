<?php

namespace App\Repository;

use App\Entity\Task;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Task>
 */
class TaskRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Task::class);
    }

    public function getNewId(): int
    {
        $query = $this->createQueryBuilder('a')
            ->select('MAX(a.id)')
            ->getQuery()
            ->getSingleScalarResult();

        return $query + 1;
    }
}
