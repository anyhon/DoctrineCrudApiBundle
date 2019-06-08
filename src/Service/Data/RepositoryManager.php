<?php
declare(strict_types=1);

namespace WernerDweight\DoctrineCrudApiBundle\Service\Data;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\ClassMetadata;
use WernerDweight\DoctrineCrudApiBundle\Service\Request\CurrentEntityResolver;
use WernerDweight\DoctrineCrudApiBundle\Service\Request\ParameterEnum;
use WernerDweight\RA\Exception\RAException;
use WernerDweight\RA\RA;
use WernerDweight\Stringy\Stringy;

class RepositoryManager
{
    /** @var string */
    private $currentEntityName;

    /** @var ServiceEntityRepository|null */
    private $currentRepository;

    /** @var ClassMetadata|null */
    private $currentMetadata;

    /** @var RA|null */
    private $currentMappings;

    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var ServiceEntityRepositoryFactory */
    private $repositoryFactory;

    /** @var CurrentEntityResolver */
    private $currentEntityResolver;

    /**
     * RepositoryManager constructor.
     * @param EntityManagerInterface $entityManager
     * @param ServiceEntityRepositoryFactory $repositoryFactory
     * @param CurrentEntityResolver $currentEntityResolver
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        ServiceEntityRepositoryFactory $repositoryFactory,
        CurrentEntityResolver $currentEntityResolver
    ) {
        $this->entityManager = $entityManager;
        $this->currentEntityResolver = $currentEntityResolver;
        $this->repositoryFactory = $repositoryFactory;
    }

    /**
     * @return string
     * @throws RAException
     */
    public function getCurrentEntityName(): string
    {
        if (null === $this->currentEntityName) {
            $this->currentEntityName = $this->currentEntityResolver->getCurrentEntity();
        }
        return $this->currentEntityName;
    }

    /**
     * @return ServiceEntityRepository
     * @throws RAException
     */
    public function getCurrentRepository(): ServiceEntityRepository
    {
        if (null === $this->currentRepository) {
            $this->currentRepository = $this->containerRepositoryFactory->getRepository(
                $this->entityManager,
                $this->getCurrentEntityName()
            );
        }
        return $this->currentRepository;
    }

    /**
     * @return ClassMetadata
     */
    public function getCurrentMetadata(): ClassMetadata
    {
        if (null === $this->currentMetadata) {
            $this->currentMetadata = $this->entityManager->getClassMetadata(ParameterEnum::ENTITY_NAME);
        }
        return $this->currentMetadata;
    }

    /**
     * @return RA
     */
    public function getCurrentMappings(): RA
    {
        if (null === $this->currentMappings) {
            $metadata = $this->getCurrentMetadata();
            $this->currentMappings = (new RA())
                ->merge(
                    $metadata->fieldMappings,
                    $metadata->associationMappings,
                    [$metadata->getIdentifier()]
                );
        }
        return $this->currentMappings;
    }

    public function getMappingForField(Stringy $field, ?RA $mappings = null): ?RA
    {
        if (null === $mappings) {
            $mappings = $this->getCurrentMappings();
        }
        // TODO:
    }
}
