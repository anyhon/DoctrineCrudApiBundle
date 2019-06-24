<?php
declare(strict_types=1);

namespace WernerDweight\DoctrineCrudApiBundle\Service\PropertyValueResolver\Resolver;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use WernerDweight\DoctrineCrudApiBundle\Entity\ApiEntityInterface;
use WernerDweight\DoctrineCrudApiBundle\Exception\MappingResolverException;
use WernerDweight\DoctrineCrudApiBundle\Service\Data\QueryBuilderDecorator;
use WernerDweight\RA\RA;

class CollectionValueResolver implements PropertyValueResolverInterface
{
    /** @var EntityValueResolver */
    private $entityValueResolver;

    /**
     * CollectionValueResolver constructor.
     * @param EntityValueResolver $entityValueResolver
     */
    public function __construct(EntityValueResolver $entityValueResolver)
    {
        $this->entityValueResolver = $entityValueResolver;
    }

    /**
     * @param RA $value
     * @param RA $configuration
     * @return ArrayCollection|null
     */
    public function getPropertyValue($value, RA $configuration): ?ArrayCollection
    {
        if (true !== $configuration->hasKey(QueryBuilderDecorator::DOCTRINE_TARGET_ENTITY)) {
            throw new MappingResolverException(
                MappingResolverException::EXCEPTION_MISSING_TARGET_ENTITY,
                [implode(', ', $this->getPropertyTypes())]
            );
        }
        $className = $configuration->getString(QueryBuilderDecorator::DOCTRINE_TARGET_ENTITY);

        return new ArrayCollection(
            $value
                ->map(function (RA $itemData) use ($className): ApiEntityInterface {
                    return $this->entityValueResolver->resolve($itemData, $className);
                })
                ->toArray()
        );
    }

    /**
     * @return int[]
     */
    public function getPropertyTypes(): array
    {
        return [
            ClassMetadataInfo::TO_MANY,
            ClassMetadataInfo::ONE_TO_MANY,
            ClassMetadataInfo::MANY_TO_MANY,
        ];
    }
}
