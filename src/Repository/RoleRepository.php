<?php

namespace App\Repository;

use App\Entity\Role;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Log\LoggerInterface;

/**
 * @extends ServiceEntityRepository<Role>
 */
class RoleRepository extends ServiceEntityRepository
{
    private EntityManagerInterface $manager;
    private LoggerInterface        $logger;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $entityManager, LoggerInterface $logger)
    {
        parent::__construct($registry, Role::class);
        $this->manager = $entityManager;
        $this->logger  = $logger;
    }

    public function save(Role $role): void
    {
        if (null === $role->getId()) {
            $this->insert($role);
        } else {
            $this->update($role);
        }
    }

    private function insert(Role $role): void
    {
        $sql = <<<SQL
            INSERT INTO role
                (`name`)
            VALUES
                (:name)
        SQL;

        $this->executeSql($sql, [
            'name' => $role->getName()
        ]);
    }

    private function update(Role $role): void
    {
        $sql = <<<SQL
            UPDATE role
            SET name = :name
            WHERE id = :id;
        SQL;

        $this->executeSql($sql, [
            'id'   => $role->getId(),
            'name' => $role->getName()
        ]);
    }

    private function executeSql(string $sql, array $data): void
    {
        try {
            $stmt = $this->manager->getConnection()->prepare($sql);
            $stmt->executeQuery($data);
        } catch (\Throwable $exception) {
            $this->logger->error($exception->getMessage());
        }
    }
}
